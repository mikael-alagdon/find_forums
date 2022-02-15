<?php
	
	error_reporting(E_ALL & ~E_NOTICE);

	include("inc/connect.php");

	if(isset($_POST["btnLogin"])){

		// step 1
		$inputUsername = $_POST["loginUsername"];
		$inputPassword = $_POST["loginPassword"];

		//step2
		$querySelect = "SELECT * FROM tbl_users 
						WHERE username = '$loginUsername' 
						AND password = '$loginPassword'";
		//step3
		$execQuerySelect = mysqli_query($con,$querySelect);

		if($execQuerySelect){
			echo "<h1>" . mysqli_error($con) . "</h1>";
		}

		//step4
		$arrayUserDetails = mysqli_fetch_assoc($execQuerySelect);
		
		$loginUserId = $arrayUserDetails["id"];
		$loginUsername = $arrayUserDetails["username"];
		$loginPassword = $arrayUserDetails["password"];
		$loginEmail = $arrayUserDetails["email"];
		$loginContact_no = $arrayUserDetails["contact_no"];
		$loginUserType = $arrayUserDetails["user_type"];

		if($loginUserId > 0){
		 	if($loginUserType == "1"){
		 		header("Location: admin_dashboard.php");
		 	}
		 	elseif($loginUserType == "2"){
		 		header("Location: feed.php");
		 	}
		 
		 	else{
		 header("Location:index.php?error=1");
		 }
		 }		
	}
?>