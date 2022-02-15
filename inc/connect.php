<?php
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpassword = "";
		$dbname = "forumdb";

		$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

		if($con){
			echo "connection successful";
		}
		
		mysqli_error($con);
?>