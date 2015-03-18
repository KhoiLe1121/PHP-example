<?php
#Khoi Le, Section AA, Homework 5
#This page help user to add or delete items on list
#Then redirect back to manage page

include("common.php");
session_start();
if (!isset($_SESSION["name"])) { #Check if logged on. If not, ask the user to log in
	goHomeYouAreDrunk();
} else {
	$name = $_SESSION["name"];
}

if (isset($_POST["action"])) { 

	$action = $_POST["action"];
	if ($action == "add" && isset($_POST["item"])) { #Add new item to end of list
		$item = $_POST["item"];
		file_put_contents("todo_$name.txt", $item."\n", FILE_APPEND);
	} 

	elseif ($action == "delete" && isset($_POST["index"])) { #Delete selected item
		
		$index = $_POST["index"];
		$todo = file("todo_$name.txt");

		if (count($todo) > $index) {
			unset($todo[$index]);
			
			file_put_contents("todo_$name.txt", "");
			foreach ($todo as $todo) { 
				file_put_contents("todo_$name.txt", $todo, FILE_APPEND);
			}
		}
	}
}

header("Location: todolist.php"); #Redirect back to manage page

?>