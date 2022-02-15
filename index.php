<!-- LOGIN AREA -->

<?php
	include_once("inc/connect.php");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		findForums
	</title>
			<link rel="stylesheet" type="text/css" href="styles.css">
			<link rel="shortcut icon" href="logo.png">
		  	<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Signika" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Satisfy" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<link rel="stylesheet"
  			href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"> 
</head>

<body>

<!-- ===================== header ===================================== -->
			<div class="header" id="myHeader"><!-- 
					<img src="logo.png" title="Logo" id="icon"> -->
				<span id="logo">
					<b>findForums</b>	
				</span>
			</div>

<!-- ========================== sign up/register =================== -->

				<?php
						

						if(isset($_POST["btnRegister"])){

							$regUsername = $_POST["regUsername"];
							$regPassword = $_POST["regPassword"];
							$regEmail = $_POST["regEmail"];
							$regContact = $_POST["regContact"];
							?>
								<div class="animated wobble" id="reg-validation">
									<center>
									<h1 class="validation">Account created!</h1>
									</center>
								</div>

				<?php

							$queryInsert = "

						INSERT INTO tbl_users(username, password, email, contact_no, user_type)
						VALUES('$regUsername', '$regPassword', '$regEmail', '$regContact', '2')
							
							";

							mysqli_query($con, $queryInsert);
						}
				?>
				<div class="container-Sign-Up">
				  <!-- Trigger the modal with a button -->
				 	 <button id="sign-up" type="button"  class="btn btn-info btn-lg animated bounceIn"  data-toggle="modal" data-target="#myModalReg">
				 	 		Register
				 	 </button>

				  <!-- Modal -->
				   <div class="modal fade" id="myModalReg" role="dialog">
				    <div class="modal-dialog"> 
				    
				      
				      <!-- Modal content-->
				      <form id="regTable" action="?promt=successful" method="post">
				    	 <div class="modal-content">

					        <div class="modal-header">

						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">SIGN UP</h4>

					        </div>

					        <div id="modal-body">

								
					        <ul>
					        	<li>
					        		<input autocomplete="off" type="text" name="regUsername" placeholder="Username" required />
					        	</li>
					        	<li>
					        		<input autocomplete="off" type="password" name="regPassword" placeholder="Password" required />
					        	</li>
					        	<li>
					        		<input autocomplete="off" type="email" name="regEmail" placeholder="E-mail" required/>
					        	</li>
					        	<li>
					        		<input autocomplete="off" type="text" name="regContact" placeholder="Contact No." required/>
					        	</li>
					        	<li>
					        		<input class="btnSubmit" type="submit" name="btnRegister" value="Sign Up"/>
					        	</li>
					        </ul>

							</div> 
						  </div>
						</form>	
				    	</div>
				      
				    </div>
				  </div>

				  
<!-- =============================== sign in/login ============================= -->

	<?php
	

	if(isset($_POST["btnLogin"])){

		// step 1
		$inputUsername = $_POST["loginUsername"];
		$inputPassword = $_POST["loginPassword"];

		//step2
		$querySelect = "SELECT * FROM tbl_users 
						WHERE username = '$inputUsername' 
						AND password = '$inputPassword'";
		//step3
		$execQuerySelect = mysqli_query($con,$querySelect);

		if($execQuerySelect){
			echo "<h1>" . mysqli_error($con) . "</h1>";
		}

		//step4
		$arrayUserDetails = mysqli_fetch_assoc($execQuerySelect);
		
		$loginUserId = $arrayUserDetails["user_id"];
		$loginUsername = $arrayUserDetails["username"];
		$loginPassword = $arrayUserDetails["password"];
		$loginEmail = $arrayUserDetails["email"];
		$loginContact_no = $arrayUserDetails["contact_no"];
		$loginUserType = $arrayUserDetails["user_type"];

		if($loginUserId > 0){
		 	if($loginUserType == "1"){
		 		header("Location: admin_dashboard.php");
		 	}
		 	if($loginUserType == "2"){
		 		header("Location: feed.php");
		 		$_SESSION["loginUsername"] = $loginUsername;
		 		$_SESSION["user_id"] = $loginUserId;
		 	}	
		} 
		 	else{
		 header("Location:index.php?error=1");
		 }
		 		
	}
?>

				<div class="container-Sign-Up">
				  <!-- Trigger the modal with a button -->
				 	 <button id="sign-in" type="button" class="btn btn-info btn-lg animated bounceIn" data-toggle="modal" data-target="#myModalLogin">Login</button>

				  <!-- Modal -->
				  <div class="modal fade" id="myModalLogin" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				    	<div class="modal-content">
					        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">SIGN IN</h4>
					        </div>

					        <div id="modal-body">
									<form id="loginTable" action="?promt=successful" method="POST">
										<ul>
								            <li><input autocomplete="off" type="text" name="loginUsername" placeholder="Username" required /></li>
								            <li><input autocomplete="off" type="password" name="loginPassword" placeholder="Password" required /></li>
								            <li><input autocomplete="off" class="btnSubmit" type="submit" name="btnLogin" value="Login"/></li>
							       		 </ul>
									</form>
							</div>
				    	</div>
				    </div>
				  </div>
				  
				</div>

				
				
			<span class="animated bounceInLeft" id="quote">
				<h1 class="quote-text">Create,</h1>
				<h1 class="quote-text">Discuss,</h1>
				<h1 class="quote-text">Improve Lives.</h1>
			</span>

			<?php
				error_reporting(E_ALL & ~E_NOTICE);
					if($_GET["error"]==1)
					{
			?>
				<div class="animated wobble" id="login-validation">
					<center>
						<h1 class="validation">Incorrect login details!</h1>
					</center>
				</div>
			<?php
					}
			?>
</body>
</html>