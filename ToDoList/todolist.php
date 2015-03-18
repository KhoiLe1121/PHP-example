<?php
#Khoi Le, Section AA, Homework 5
#This page allows user to manage their to do list
#Can add or delete items on list

include("common.php");
session_start();
if (!isset($_SESSION["name"])) { #Check if user is logged in
	goHomeYouAreDrunk();
} else {
	$name = $_SESSION["name"];
}

makeHeader(); #Make html header.
makeTopBar(); #Make top Bar.
?>

		<div id="main">
			<h2><?=$name?>'s To-Do List</h2>

			<ul id="todolist">
				
				<!--If have a list, list them -->
				<?php if (file_exists("todo_$name.txt")) {
					$todo = file("todo_$name.txt");
					$number = "-1";
					foreach ($todo as $item) {
						$number = $number +1;
						$item = htmlspecialchars($item);
						makeItem($item, $number);
					}
				} ?>
					
				<!--Allow to add new item to list -->
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="add" />
						<input name="item" type="text" size="25" autofocus="autofocus" />
						<input type="submit" value="Add" />
					</form>
				</li>
			</ul>

			<!--Allow user to log out, direct to the log out page -->
			<div>
				<a href="logout.php"><strong>Log Out</strong></a>
				<em>(logged in since <?=$_COOKIE["date"]?>)</em>
			</div>
		</div>

		<?php makeBottomBar(); #Make bottom Bar and Validator buttons. ?>
	</body>
</html>

<?php
#Function that helps to create the to do list
function makeItem($make, $number) { ?>
	<li>
		<form action="submit.php" method="post">
			<input type="hidden" name="action" value="delete" />
			<input type="hidden" name="index" value="<?=$number?>" />
			<input type="submit" value="Delete" />
		</form>
		<?=$make?>
	</li> 
	
<?php }