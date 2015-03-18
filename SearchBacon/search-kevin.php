<?php
#Khoi Le, Homework 6, Section AA
#This page show results of actor's movies with Kevin Bacon
#Have forms for user to search another actor

include("common.php");

$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];

#Initialize new database from host
$db = new PDO("mysql:dbname=imdb;host=localhost", "freemoon", "vbFqvH8xFsGHU");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$first = $firstname . "%";
$first = $db->quote($first);
$last = $db->quote($lastname);

#Get the actor id with provided last name, first name, and database
#If multiple results, choose one with most movies then by smallest id
$id = getID($last, $first, $db);

#if actor exist in database
if ($id->rowCount() > 0) {
		
	$kbfirst = "'Kevin%'";
	$kblast = "'Bacon'";
	$kbid = getID($kblast, $kbfirst, $db); #Get Kevin Bacon's actor id

	$actor = $id->fetch();
	$actorid = $actor["id"];
	$kevin = $kbid->fetch();
	$kevinid = $kevin["id"];

	#Get movies name and year with the actor and Kevin Bacon together
	#Sort results by year then by name
	$movies = $db->query("SELECT name, year FROM movies 
	JOIN roles rkb ON rkb.movie_id = movies.id 
	JOIN actors akb ON akb.id = rkb.actor_id 
	JOIN roles rmatch ON rmatch.movie_id = movies.id
	JOIN actors amatch ON amatch.id = rmatch.actor_id
	WHERE akb.id = '$kevinid'
	AND amatch.id = '$actorid';");		
			
}		
		
makeHeader(); #Make top html page and top banner?>

<div id="main">
	<h1>Results for <?=$firstname?> <?=$lastname?></h1>
	
	<?php 
	#Caption of result table
	$capt = "Films with " . $firstname ." " . $lastname . " and Kevin Bacon";
	
	if (isset($movies) && $movies->rowCount() > 0) {  #if there is common films
		#Make result table with movie name, year, and sorted by year then by name
		makeTable($movies, $capt);
	} elseif ($id->rowCount() > 0) { #If actor exist but no common films?> 
		<p><?=$firstname?> <?=$lastname?> and Kevin Bacon don't have any film together</p>
	<?php } else { #If actor does not exist in database?>
		<p>Actor <?=$firstname?> <?=$lastname?> wasn't found, sorry. 
		We only compare Kevin Bacon to other actors that are in our database</p>
	
	<?php }
	#Recreate the form in the main page
	#Allow user to search for another actor or another method
	makeForm(); 
	?>
	
</div> 

<?php makeBottom(); #Make bottom html page, bottom banner, and validators?>
