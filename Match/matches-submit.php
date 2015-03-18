<!DOCTYPE html>

<!--Homework 4 Khoi Le Section AA
This is a page where the matches form is submited.
It processes the submited name and look on file to find info with that name.
Then look on file again to find matches for the user and display them
in the order found.
Extra feature 1: Robust page with form validation
Extra feature 3: Gay/lesbian/bisexual matches
-->

<html>

	<?php include("common.php");
	makeHead(); ?>
	
	<body>
		<?php #Import parameters from the submited form
		$name = $_GET["name"];
		$age = "notage";

		#Import all data from the file
		$users = file("singles2.txt");
		
		#Search the data for the name provided.
		#When found, store info found as parameters.
		foreach ($users as $client) {
			$currentuser = explode(",", $client);
			$nof = $currentuser[0];
			if ($nof == $name) {
				list( , $gender, $age, $type, $fos, $seekmin, $seekmax, $seekg) = explode(",", $client);
				$seekg = trim($seekg);
			}
		}
		
		makeBanner(); #Create top Banner 
		
		if (preg_match("/^\s*$/", $name) || $age == "notage" ){ 
			makeError();
		} 
		
		else { ?>
		
			<h1>Matches for <?=$name?></h1>
			
			<?php
			#Search the data for matches to the name provided
			#If found, display the match and continue searching till the end of data.
			foreach ($users as $matches) {
				list($nof, $mgender, $mage, $mtype, $mfos, $mseekmin, $mseekmax, $mseekg) = explode(",", $matches);
				$mseekg = trim($mseekg);
				
				if ($name != $nof && $fos == $mfos &&  #Check for name and OS
				$age > $mseekmin && $age < $mseekmax && $mage > $seekmin && $mage < $seekmax && #Check for Age
				($seekg == $mgender || strlen($seekg) > 1) &&  #Check for gender
				($mseekg == $gender || strlen($mseekg) > 1)) { #Check for gender other direction
					
					$typecheck = "0";
					for ($i=0; $i<4; $i++) { 
						if ($type[$i] == $mtype[$i]) {
							$typecheck = $typecheck + "1" ;
						}
					}	
					
					if ($typecheck > 0) { #Check for at least one common personality type  ?>
					
						<div class="match">
							<!--Display picture of match -->
							<img src="https://webster.cs.washington.edu/images/nerdluv/user.jpg" alt="matches" />
							
							<!--Display name and info of match-->
							<?=$nof?>
							
							<ul>
								<li><strong>gender:</strong> <?=$mgender?></li>
								<li><strong>age:</strong> <?=$mage?></li>
								<li><strong>type:</strong> <?=$mtype?></li>
								<li><strong>OS:</strong> <?=$mfos?></li>
							</ul>
						</div>
					<?php }
					
				}
			}
		}
	
		makeFooter(); #Create footer not and link to homepage 
		makeValidator(); #Create Html and CSS Validators
		?>

	</body>
</html>		