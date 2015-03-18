<!DOCTYPE html>

<!--Homework 4 Khoi Le Section AA
This is a page where the signup form is submited.
It processes the submited data and write them to file.
Extra feature 1: Robust page with form validation
Extra feature 3: Gay/lesbian/bisexual matches
-->

<html>

	<?php include("common.php");
	makeHead(); ?>
	
	<body>
		<?php #import parameters from the submited form
		$name = $_POST["name"];
		$gender = $_POST["gender"];
		$age = $_POST["age"];
		$type = $_POST["type"];
		$fos = $_POST["fos"];
		$seekmin = $_POST["seekmin"];
		$seekmax = $_POST["seekmax"];
		
		$namecheck = "";
		
		makeBanner(); #Create a top Banner 
		
		$users = file("singles2.txt");
		foreach ($users as $client) {
		$currentuser = explode(",", $client);
		$nof = $currentuser[0];
			if ($nof == $name) {
			$namecheck = $name;
			}
		}
		
		if (isset($_POST["seekg"])) {
			$seekg = implode($_POST["seekg"]);
		}
		
		if (!isset($_POST["seekg"])) {
			makeError();
			
		}elseif (!isset($_POST["seekg"]) || preg_match("/^\s*$/", $name) || !preg_match("/^\d{1,2}$/", $age) ||
		!preg_match("/^[FM]$/", $gender) || !preg_match("/^[IE][NS][FT][JP]$/", $type) ||
		!preg_match("/^(Windows)$|^(Linux)$|^(Mac OS X)$/", $fos) ||
		!preg_match("/^\d{1,2}$/", $seekmin) || !preg_match("/^\d{1,2}$/", $seekmax) ||
		$seekmin > $seekmax || !preg_match("/^[MF]{1,2}$/", $seekg) || $name == $namecheck) { 

			makeError();
		}else{
			
			#write the new user's info into file as a new line
			$tofile = $name.",".$gender.",".$age.",".$type.",".$fos.",".$seekmin.",".$seekmax.","."seekg\n";
			file_put_contents("singles2.txt", $tofile, FILE_APPEND);
			?>
			
			<h1>Thank you</h1>
			<p>Welcome to NerdLuv, <?=$name?>! </p>
			<p>Now <a href="matches.php">log in to see your matches! </a>
		
		<?php }
		makeFooter(); #Create a footer note and link to homepage 
		makeValidator(); #Create Html and CSS Validators
		?>

	</body>
</html>		