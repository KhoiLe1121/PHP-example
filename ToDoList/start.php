<?php 
#Khoi Le, Section AA, Homework 5
#This page let you start. You can log in or create account here.
#If successful, it can lead you to a wonderful page that help
#you to remember what you need to do.

include("common.php");
checkLogin(); #Check if user is already logged in. Redirect to manage page if true
makeHeader(); #Make html header
makeTopBar(); #Make top Bar
?>

		<div id="main">
			<p>
				The best way to manage your tasks. <br />
				Never forget the cow (or anything else) again!
			</p>

			<p>
				Log in now to manage your to-do list. <br />
				If you do not have an account, one will be created for you.
			</p>	
			
			<p>
				Account must begin with a lowercase letter, contain only lowercase letter or number and 3 - 8 characters long. <br />
				Password must be 6 - 12 characters long, begin with a number, and end with a symbol.
			</p>

			<!--Enter name and password to log in or create account -->
			<form id="loginform" action="login.php" method="post">
				<div><input name="name" type="text" size="8" autofocus="autofocus" /> <strong>User Name</strong></div>
				<div><input name="password" type="password" size="8" /> <strong>Password</strong></div>
				<div><input type="submit" value="Log in" /></div>
			</form>
			
			<?php #If logged in on this computer in the last 7 days
			if (isset($_COOKIE["date"])) { ?> 
			
				<p>
					<em>(last login from this computer was <?=$_COOKIE["date"]?>)</em>
				</p>
			
			<?php #If not 
			} else { ?>
			
				<p>
					<em>Is this your first time on this computer? Log in or create a new account!</em>
				</p>
			
			<?php } ?>
		</div>

		<?php
		makeBottomBar(); #make Bottom Bar
		?>
		
	</body>
</html>
