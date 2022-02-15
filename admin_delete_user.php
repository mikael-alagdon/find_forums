<?php
	
	include_once("inc/connect.php");

	$urlUserId = $_GET["id"];
	

	$getCurrentDetails = "SELECT * FROM tbl_users WHERE user_id ='$urlUserId'";

	$exeGetCurrentDetails = mysqli_query($con, $getCurrentDetails);
	
	$arrayGetCurrentDetails = mysqli_fetch_assoc($exeGetCurrentDetails);
	
	$curUserId = $arrayGetCurrentDetails["user_id"];
	$curUsername = $arrayGetCurrentDetails["username"];
	$curPassword = $arrayGetCurrentDetails["password"];
	$curEmail = $arrayGetCurrentDetails["email"];
	$curContact_no = $arrayGetCurrentDetails["contact_no"];
	$curUserType = $arrayGetCurrentDetails["user_type"];

	if(isset($_POST["btnSubmit"])){

		$confirmation = $_POST["btnSubmit"];

		if($confirmation == "Yes, please."){

		$queryDeleteUser = "

			DELETE FROM tbl_users
			WHERE user_id = '$urlUserId'	

			";

		$exeQueryDeleteUser = mysqli_query($con, $queryDeleteUser);
		}

		header("Location: admin_dashboard.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete User?</title>
			<link rel="stylesheet" type="text/css" href="admin.css">
			<link rel="shortcut icon" href="logo.png">
		  	<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Signika" rel="stylesheet">
			<link rel="stylesheet"
  			href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"> 

</head>

<body>
	<div class="header" id="myHeader">	
				<span id="logo">
					<b>findForums</b> 
				</span>
				<span id="dashboard">
					<b>admin dashboard></b>
					<b>admin:delete user</b>
				</span>
				
			</div>
	<br>
	<br>

	<form action="#" method="post">
		<table border="0" width="30%" style="border-collapse: collapse; margin:auto;" cellpadding=20
		class="animated shake">

			<tr>
				<th class="confirmDelete" colspan="2">You are about to delete the following user:
				</th>
			</tr>
			<tr>
				<th colspan="2" id="delete">
						<?php echo $curUsername ?>	
					</th>
			</tr>
			<tr>
				<th class="confirmDelete" colspan="2">Proceed?</th>
			</tr>
			<tr>
				<th>
					<input id="yes" type="submit" name="btnSubmit" value="Yes, please.">
				</th>
				<th>
					<input id="no" type="submit" name="btnSubmit" value="No.">
				</th>
			</tr>
		</table>
	</form>
</body>
</html>