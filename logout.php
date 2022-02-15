<?php
	
	session_start(); // enables all the session variables

	
	session_unset($_SESSION['loginUsername']);
	
	header("Location: index.php");
?>