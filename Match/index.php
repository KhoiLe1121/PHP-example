<!DOCTYPE html>

<!--
	CSE 154, Homework 4 (NerdLuv)
	Khoi Le, Section AA
	This is the modified provided file of an index page. Provide option to
	either sign up or check for matches if already signed up.
	I am doing:
	Extra feature 1: Robust page with form validation
	Extra feature 3: Gay/lesbian/bisexual matches
	-->
	
<html>

	<?php include("common.php");
	makeHead(); ?>

	<body>
		<?php makeBanner(); #make a top Banner ?>

		<div>
			<h1>Welcome!</h1>

			<ul>
				<li>
					<a href="signup.php">
						<img src="https://webster.cs.washington.edu/images/nerdluv/signup.gif" alt="icon" />
						Sign up for a new account
					</a>
				</li>

				<li>
					<a href="matches.php">
						<img src="https://webster.cs.washington.edu/images/nerdluv/heartbig.gif" alt="icon" />
						Check your matches
					</a>
				</li>
			</ul>
		</div>

		<?php 
		makeFooter(); #Make a footer note and link to homepage
		makeValidator(); #Create Html and CSS Validators
		?>

		
	</body>
</html>