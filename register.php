<?php

		// error_reporting(E_ALL & ~E_NOTICE);
		
		include_once("inc/connect.php");

		if(isset($_POST["btnSubmit"])){

			$regUsername = $_POST["inputUsername"];
			$regPassword = $_POST["inputPassword"];
			$regEmail = $_POST["inputEmail"];
			$regContact = $_POST["inputContact"];

			$queryInsert = "

		INSERT INTO tbl_users(username, password, email, contact_no, user_type )
		VALUES('$regUsername', '$regPassword', '$regEmail', '$regContact', '2')
			
			";

			mysqli_query($con, $queryInsert);
		}

?>