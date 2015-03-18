<?php
#Khoi Le, Homework 6, Section AA
#This file contains common codes used in other pages.

#Make html header and the top banner
function makeHeader() { ?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>My Movie Database (MyMDb)</title>
			<meta charset="utf-8" />
			
			<link href="https://webster.cs.washington.edu/images/kevinbacon/favicon.png" type="image/png" rel="shortcut icon" />
			<script src="https://webster.cs.washington.edu/js/kevinbacon/provided.js" type="text/javascript"></script>

			<link href="bacon.css" type="text/css" rel="stylesheet" />
		</head>

		<body>
			<div id="frame">
				<div id="banner">
					<a href="mymdb.php"><img src="https://webster.cs.washington.edu/images/kevinbacon/mymdb.png" alt="banner logo" /></a>
					My Movie Database
				</div>
<?php }

#Make html user interface form to enter actor's name
#First one search for movies of that actor
#Second one search for common movies of that actor with Kevin Bacon
function makeForm() { ?>
	<form action="search-all.php" method="get">
		<fieldset>
			<legend>All movies</legend>
			<div>
				<input name="firstname" type="text" size="12" placeholder="first name" autofocus="autofocus" /> 
				<input name="lastname" type="text" size="12" placeholder="last name" /> 
				<input type="submit" value="go" />
			</div>
		</fieldset>
	</form>
	
	<form action="search-kevin.php" method="get">
		<fieldset>
			<legend>Movies with Kevin Bacon</legend>
			<div>
				<input name="firstname" type="text" size="12" placeholder="first name" /> 
				<input name="lastname" type="text" size="12" placeholder="last name" /> 
				<input type="submit" value="go" />
			</div>
		</fieldset>
	</form>
<?php }

#Make the html bottom of the page, including the validators
function makeBottom() { ?>
				<div id="w3c">
					<a href="https://webster.cs.washington.edu/validate-html.php"><img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML5" /></a>
					<a href="https://webster.cs.washington.edu/validate-css.php"><img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
				</div>
			</div> 
		</body>
	</html>
<?php } 

#Make result table
function makeTable($movies, $capt) { ?>

	<table>
		<caption><?=$capt?></caption>
		<tr><th>&#35;</th><th>Title</th><th>Year</th></tr>
		<?php
		$number = 0;
		foreach ($movies as $movie) {
			$number = $number + 1; ?>
			<tr><td><?=$number?></td><td><?=$movie["name"]?></td><td><?=$movie["year"]?></td></tr>
		<?php }	?>
	</table>
	
<?php } 

#return the actor ID given the last name, first name, and database
function getID($last, $first, $db) {
	$id = $db->query("SELECT id FROM actors 
	WHERE last_name = $last AND first_name LIKE $first 
	ORDER BY film_count DESC, id ASC
	LIMIT 1;");
	return $id;
} ?>