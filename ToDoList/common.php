<?php 
#Khoi Le, Section AA, Homework 5
#This file stores common codes

#Make the html header
function makeHeader() { ?>

	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<title>Remember the Cow</title>
		
			<link href="cow.css" type="text/css" rel="stylesheet" />
			<link href="https://webster.cs.washington.edu/images/todolist/favicon.ico" type="image/ico" rel="shortcut icon" />
			<script src="https://webster.cs.washington.edu/js/todolist/provided.js" type="text/javascript"></script>
		</head>
		<body>
			<div id="frame">
				<div id="banner">
					<a href="index.php"><img src="https://webster.cs.washington.edu/images/kevinbacon/mymdb.png" alt="banner logo" /></a>
					My Movie Database
				</div>
<?php }

#Make the top Bar
function makeTopBar() { ?>

	<div class="headfoot">
		<h1>
			<img src="https://webster.cs.washington.edu/images/todolist/logo.gif" alt="logo" />
			Remember<br />the Cow
		</h1>
	</div>
		
<?php }

#Make the bottom Bar and Validator Buttons
function makeBottomBar() { ?>

	<div class="headfoot">
		<p>
			"Remember The Cow is nice, but it's a total copy of another site." - PCWorld<br />
			All pages and content &copy; Copyright CowPie Inc.
		</p>
	</div>

	<div id="w3c">
		<a href="https://webster.cs.washington.edu/validate-html.php">
			<img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML" /></a>
		<a href="https://webster.cs.washington.edu/validate-css.php">
			<img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
	</div>

<?php }

#Check if the user is logged in. If yes, redirect to todolist.php
function checkLogin() {
	
	session_start();
	if (isset($_SESSION["name"])) {
		header("Location: todolist.php");
		die();
	}
}

#Redirect back to start.php
function goHomeYouAreDrunk() {
	header("Location: start.php");
	die();
}
?>