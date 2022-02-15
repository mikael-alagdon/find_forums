
<?php

	// include_once("inc/connect.php");

	// session_start();
	


	// $user = $_SESSION["loginUsername"];

	// $querySelect = "SELECT * FROM tbl_users WHERE user_id ='$user'";

	// $execQuerySelect = mysqli_query($con, $querySelect);

	// while($arrayUserDetails = mysqli_fetch_assoc($execQuerySelect)){

	// $curUserId = $arrayUserDetails["user_id"];
	// $curUsername = $arrayUserDetails["username"];
	// $curPassword = $arrayUserDetails["password"];
	// $curEmail = $arrayUserDetails["email"];
	// $curContact_no = $arrayUserDetails["contact_no"];
	// $curUserType = $arrayUserDetails["user_type"];


	// };



include_once("inc/connect.php");

	$urlUserId = $_GET["id"];

	$getCurrentDetails = "SELECT * FROM tbl_users WHERE user_id='$urlUserId'";

	$exeGetCurrentDetails = mysqli_query($con, $getCurrentDetails);
	
	$arrayGetCurrentDetails = mysqli_fetch_assoc($exeGetCurrentDetails);

	$curUserId = $arrayGetCurrentDetails["user_id"];
	$curUsername = $arrayGetCurrentDetails["username"];
	$curPassword = $arrayGetCurrentDetails["password"];
	$curEmail = $arrayGetCurrentDetails["email"];
	$curContact_no = $arrayGetCurrentDetails["contact_no"];
	$curUserType = $arrayGetCurrentDetails["user_type"];

	if(isset($_POST["btnSubmit"])){

	$updatedPassword = $_POST["inputPassword"];
	$updatedEmail = $_POST["inputEmail"];
	$updatedContact = $_POST["inputContact"];

	$queryUpdate = "

	UPDATE tbl_users
	SET password = '$updatedPassword', email = '$updatedEmail', contact_no = '$updatedContact'
	WHERE user_id = '$urlUserId';
	";

	$exeQueryUpdate = mysqli_query($con, $queryUpdate);

	header("location: admin_dashboard.php");

	echo mysqli_error($con);

	}

?>
			
	

<!DOCTYPE html>
<html>
<head>
	<title>Profile: 
		<?php
			echo $curUserId;
		?>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet"
  		href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
</head>

<body>

	<div id="header">
		PROFILE SETTINGS
	</div>
	<div id="wrapper">
		<p align="center">Username:
			<?php
				echo $curUsername;
			?>
		</p>

		<p align="center">Password:
			<?php
				echo $curPassword;
			?>
		</p>

		<p align="center">E-Mail:
			<?php
				echo $curEmail;
			?>			
		</p>

		<p align="center">Contact Number:
			<?php
				echo $curContact_no;
			?>			
		</p>
	</div>
</body>
</html>	