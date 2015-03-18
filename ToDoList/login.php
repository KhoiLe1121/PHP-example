<?php 
#Khoi Le, Section AA, Homework 5
#This page log the user in if name and password is valid
#Return to start.php page and start over otherwise


include("common.php");
checkLogin(); #check if already logged in. Redirect to manage page if true.


if (!isset($_POST["name"]) || !isset($_POST["password"])) {
	goHomeYouAreDrunk(); #No input, start over or go to sleep
}else {

	#import parameters from the submited form
	$name = $_POST["name"];
	$password = $_POST["password"];
	
	#Vertify name and password in creating new account.
	#Log in if valid.
	if (preg_match("/^[a-z]([a-z]|\d){2,7}$/", $name) && 
	preg_match("/^\d\S{4,10}[^a-zA-Z0-9\s]$/", $password)) {

		#write the new user's info into file as a new line then log in
		$tofile = $name.":"."$password\n";
		file_put_contents("users.txt", $tofile, FILE_APPEND);
		loginUser($name);
		
	} else { #Invalid username or password. Start over.
		goHomeYouAreDrunk(); 
	}
	
	$users = file("users.txt");

	#Vertify username and password. Log in if correct.
	#Start over if incorrect or username already used.
	foreach ($users as $client) {
		list($nof, $pwof) = explode(":", $client);
		$pwof = trim($pwof);
	
		if ($nof == $name && ($pwof) != $password) {
			goHomeYouAreDrunk();

		} else if ($nof == $name && $pwof == $password) {
			loginUser($name);
		}
	}
}

#helper function. Create new session variable, cookie and redirect to manage page.
function loginUser($name) { 

	$_SESSION["name"] = $name;
	$date = date("D y M d, g:i:s a");
	$expireTime = time() + 60*60*24*7;
	setcookie("date", $date, $expireTime);
	header("Location: todolist.php");
	die();
}
?>