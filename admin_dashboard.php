<?php 
include_once("inc/connect.php");

?>
<html>

<head>
	<title>
		findForums: Admin
	</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Signika" rel="stylesheet">	
	<link rel="shortcut icon" href="logo.png">
	<link rel="stylesheet"
  			href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
</head>

<body>
		<div class="header" id="myHeader">	
				<span class="animated fadeInLeft" id="logo">
					<b>findForums</b> 
				</span>
				<span class="animated fadeInLeft" id="dashboard">
					<b>admin dashboard</b>
				</span>
				
			</div>
	
		<span id="logout" class = "animated fadeInRight">
			<a  href="logout.php"> Logout </a>
		</span>
		<!-- <span id="go-to-feed" class = "animated fadeInRight">
			<a  href="feed.php"> Visit Feed </a>
		</span> -->

			<div>
				
			</div>
		

	<table id="admin-dashboard" class="animated fadeInLeft" border="0" width="60%" style="border-collapse: collapse; margin:auto;" cellpadding="20"
		>
			<tr id="tableHeader">
				<th>ID</th>
				<th>Username</th>
				<th>Password</th>
				<th>E-mail</th>
				<th>Contact</th>
				<th>User type</th>
				<th></th>
			</tr>
		
		<?php

		// step2

		$querySelect = "SELECT * FROM tbl_users";

		// step 3 EXECUTE

		$execQuerySelectAllUsers = mysqli_query($con, $querySelect);

		while($arrayUserDetails = mysqli_fetch_assoc($execQuerySelectAllUsers)){
			$userId = $arrayUserDetails["user_id"];
			$UserName = $arrayUserDetails["username"];
			$UserPassword = $arrayUserDetails["password"];
			$UserEmail = $arrayUserDetails["email"];
			$UserContact_no = $arrayUserDetails["contact_no"];
			$UserType = $arrayUserDetails["user_type"];
		
			?>
			<tr>
				<td><?php echo $userId ?></td>
				<td><?php echo $UserName ?></td>
				<td><?php echo $UserPassword ?></td>
				<td><?php echo $UserEmail ?></td>
				<td><?php echo $UserContact_no ?></td>
				<td><?php echo $UserType ?></td>
				<td>
					<a href="admin_edit_user.php?id=<?php echo $userId; ?>">Edit</a>
					<br>
					<a href="admin_delete_user.php?id=<?php echo $userId; ?>">Delete</a>
				</td>
			</tr>
		<?php
	}
		?>

	</table>
</body>
</html>