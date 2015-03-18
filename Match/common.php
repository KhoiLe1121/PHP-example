<?php 
#Homework 4 Khoi Le Section AA
#This page stores common functions

#Create the header
function makeHead() { ?>
	<head>
		<title>NerdLuv</title>
		
		<meta charset="utf-8" />
		
		<link href="https://webster.cs.washington.edu/images/nerdluv/heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="https://webster.cs.washington.edu/css/nerdluv.css" type="text/css" rel="stylesheet" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>
		<script src="https://webster.cs.washington.edu/js/nerdluv/provided.js" type="text/javascript"></script>
	</head>
<?php }

#Create top Banner
function makeBanner() { ?>
	<div id="bannerarea">
		<img src="https://webster.cs.washington.edu/images/nerdluv/nerdluv.png" alt="banner logo" /> <br />
		where meek geeks meet
	</div>
<?php }

#Create footer note and homepage link
function makeFooter() { ?>
	<div>
		<p>
			This page is for single nerds to meet and date each other!  Type in your personal information and wait for the nerdly luv to begin!  Thank you for using our site.
		</p>
		
		<p>
			Results and page (C) Copyright NerdLuv Inc.
		</p>
		
		<ul>
			<li>
				<a href="index.php">
					<img src="https://webster.cs.washington.edu/images/nerdluv/back.gif" alt="icon" />
					Back to front page
				</a>
			</li>
		</ul>
	</div>
<?php } 

#Create Html and CSS Validators
function makeValidator() {?>
	<div id="w3c">
		<a href="https://webster.cs.washington.edu/validate-html.php"><img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML" /></a>
		<a href="https://webster.cs.washington.edu/validate-css.php"><img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
	</div>
<?php } 

#Create Error Message
function makeError() { ?>
	<h1>Error! Invalid Data.</h1>
	<p>We're sorry. You submitted invalid information. Please go back and try again.</p>
<?php } ?>