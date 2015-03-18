<?php
#Khoi Le, Homework 6, Section AA
#This is the main page, show a picture of Kevin Bacon
#and allow user to search an actor's movies
#or movies that are played together with Kevin Bacon

include("common.php");
makeHeader(); #Make top html page and top banner
?>

<div id="main">
	<h1>The One Degree of Kevin Bacon</h1>
	<p>Type in an actor's name to see if he/she was ever in a movie with Kevin Bacon!</p>
	<p><img src="https://webster.cs.washington.edu/images/kevinbacon/kevin_bacon.jpg" alt="Kevin Bacon" /></p>

	<?php 
	#Make forms that allow user to search an actor's movies
	#or actor's movies with Kevin Bacon
	makeForm(); 
	?> 
</div> 

<?php makeBottom(); #Make bottom html page, bottom banner, and validators?>