 <?php

	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("inc/connect.php");

	if(isset($_POST["btnSubmit"])){

		$inputUsername = $_POST["inputUsername"];
		$inputPassword = $_POST["inputPassword"];
		$inputEmail = $_POST["inputEmail"];
		$inputContact = $_POST["inputContact"];

		$queryInsert = "

	INSERT INTO tbl_users(username, password, email, contact_no, user_type )
	VALUES('$inputUsername', '$inputPassword', '$inputEmail', '$inputContact', '2')
		
		";

		mysqli_query($con, $queryInsert);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>findFriends</title>

			<link rel="stylesheet" type="text/css" href="styles.css">
			<link rel="stylesheet"
		  		href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
		  	<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
			<link rel="shortcut icon" href="spada.ico">
			<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Signika" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Lekton|Libre+Barcode+128+Text|Monoton|Muli" rel="stylesheet">

</head>

<body>
	<div class="bg1">
		<div class="header">
	      <span class="logo">
	        findFriends
	      </span>
		</div>

	<div class="wrapper">
	<form id="regTable" action="?promt=successful" method="post">
			
			<div>
				<b><h2 id="regTitle">JOIN US NOW!</h2></b>
			</div>	
    		<div>
				<input type="text" name="regUsername" placeholder="Username" required />
		    </div>
		    <div>
				<input type="password" name="regPassword" placeholder="Password" required />
		    </div>
		    <div>
				<input type="email" name="regEmail" placeholder="E-mail" required/>
		    </div>  
		    <div>
				<input type="text" name="regContact" placeholder="Contact No." required/>
		    </div>
		    <div>
		    	<input id="btnReg" type="submit" name="btnRegister" value="Sign Up"/>
		    </div>	
	

		</form>
	</div>
				<?php
			if($_GET["promt"]==successful){
				echo 'pasok!';
			}
				?>	
	</div>			
</body>
</html>