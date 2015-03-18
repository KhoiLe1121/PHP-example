<!DOCTYPE html>

<!--Homework 4 Khoi Le Section AA
This page prompts the user to enter his/her name to look for matches.
Extra feature 1: Robust page with form validation
Extra feature 3: Gay/lesbian/bisexual matches
-->

<html>

	<?php include("common.php");
	makeHead(); ?>
	
	<body>
		<?php makeBanner(); #Create a top Banner ?>
		
		<!--Create a form for user to enter data and submit using GET method-->
		<form action="matches-submit.php" method="get" >
			<fieldset>
				<legend>Returning User:</legend>
				<strong>Name:</strong> <input type="text" name="name" size="16" />  <br />
				<input type="submit" value="View My Matches" />
			</fieldset>
		</form>
		
		<?php 
		makeFooter(); #Create a footer note and link to homepage 
		makeValidator(); #Create Html and CSS Validators
		?>

		
	</body>
</html>