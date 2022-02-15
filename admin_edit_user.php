<?php

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
	<title>Edit User</title>
			<link rel="stylesheet" type="text/css" href="admin.css">
			<link rel="shortcut icon" href="logo.png">
		  	<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Signika" rel="stylesheet">
			<link rel="stylesheet"
  			href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
</head>

<body>
	<form action="#" method="post">

			<div class="header" id="myHeader">
				<span id="logo">
					<b>findForums</b>
				</span>
				<span id="dashboard">
					<b>admin dashboard></b>
					<b>admin:edit user details</b>
				</span>

			</div>
			<table class="animated fadeInLeft" id="edit-table" border="0" width="35%" style="border-collapse:  collapse; margin:auto;" cellpadding=20
		class="animated fadeInRightBig">
				<tr>
					<td>Username:</td>
					<td>
						<input type="text" name="inputUsername" required disabled value="<?php echo $curUsername ?>" />
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type="text" name="inputPassword" required value="<?php echo $curPassword ?>" />
					</td>
				</tr>
				<tr>
					<td>E-Mail:</td>
					<td>
						<input type="text" name="inputEmail" required value="<?php echo $curEmail ?>"/>
					</td>
				</tr>
				<tr>
					<td>Contact #:</td>
					<td>
						<input type="text" name="inputContact" required value="<?php echo $curContact_no ?>"/>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a  id="clickToLogin" href="admin_dashboard.php"> Back to Dashboard</a>
					</td>
				</tr>
				<tr>

					<td>
						<input class="btn" type="submit" name="btnSubmit" value="Apply"/>
					</td>
				</tr>



		</table>
		</form>
</body>
</html>
