<!DOCTYPE html>

<!--Homework 4 Khoi Le Section AA
This is the signup page. Prompt the user to enter data into the form.
Extra feature 1: Robust page with form validation
Extra feature 3: Gay/lesbian/bisexual matches
-->

<html>

	<?php include("common.php");
	makeHead(); ?>	
	
	<body>
		<?php makeBanner(); #make top Banner ?>
		
		<!--Create a form for user to enter data and submit using POST method-->
		<form action="signup-submit.php" method="post" >	
			<fieldset>
				<legend>New User Signup:</legend>
				
				<strong>Name:</strong> 
				<input type="text" name="name" size="16" /><br />
				
				<strong>Gender:</strong> 
				<label><input type="radio" name="gender" value="M" /> Male </label>
				<label><input type="radio" name="gender" value="F" checked="checked" /> Female </label><br />
				
				<strong>Age:</strong> 
				<input type="text" name="age" size="6" maxlength="2" /><br />
				
				<strong>Personality type:</strong> 
				<label><input type="text" name="type" size="6" maxlength="4" />
				(<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>)</label><br />
				
				<strong>Favorite OS:</strong> <select name="fos">
					<option value="Windows" selected="selected">Windows</option>
					<option value="Mac OS X">Mac OS X</option>
					<option value="Linux">Linux</option>
				</select> <br />
				
				<strong>Seeking age:</strong>
				<input type="text" name="seekmin" placeholder="min" size="6" maxlength="2" />
				to <input type="text" name="seekmax" placeholder="max" size="6" maxlength="2" /><br />
				
				<strong>Seek Gender(s):</strong>
				<label><input type="checkbox" name="seekg[]" value="M" checked="checked" /> Male </label>
				<label><input type="checkbox" name="seekg[]" value="F" /> Female </label><br />
				
				<input type="submit" value="Sign Up" />
			</fieldset>
		</form>
		
		<?php 
		makeFooter(); #Make a footer note and link to homepage
		makeValidator(); #Create Html and CSS Validators
		?>

		
	</body>
</html>