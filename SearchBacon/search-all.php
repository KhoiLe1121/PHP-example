<?php
#Khoi Le, Homework 6, Section AA
#This page show results of actor's movies
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
	
	$actor = $id->fetch();
	$actorid = $actor["id"];

	#Get movies name and year from the actor with the provided actor id
	#Sort results by year then by name
	$movies = $db->query("SELECT name, year FROM movies 
	JOIN roles ON roles.movie_id = movies.id 
	JOIN actors ON actors.id = roles.actor_id 
	WHERE actors.id = '$actorid'
	ORDER BY year DESC, name ASC;");

}
		
makeHeader();	#Make top html page and top banner	
?>

<div id="main">
	<h1>Results for <?=$firstname?> <?=$lastname?></h1>

	<?php 
	#Caption of result table
	$capt = "Films in which " . $firstname ." " . $lastname . " plays a role";
	
	if ($id->rowCount() > 0) { #If actor exists in database, assume at least 1 movie
		
		#Make result table with movie name, year, and sorted by year then by name
		makeTable($movies, $capt); 
		
	} else { #If actor doesn't exist in database?>
		<p>Actor <?=$firstname?> <?=$lastname?> wasn't found, sorry. 
		Maybe you can help us improve our database.</p>
	
	<?php }
	#Recreate the form in the main page
	#Allow user to search for another actor or another method
	makeForm(); 
	?>
	
</div>

<?php makeBottom(); #Make bottom html page, bottom banner, and validators?>
		
