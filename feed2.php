<?php 
	
				 error_reporting(E_ALL & ~E_NOTICE);
				session_start();
				include_once("inc/connect.php");

				if($_SESSION["loginUsername"]==NULL){
					header("Location: index.php");
				}

				if(isset($_POST["btnPost"])){

					$status = $_POST["inputStatus"];
					$status_owner = $_SESSION["user_id"];
					$queryInsert = "

				INSERT INTO status(status, status_owner)
				VALUES('$status', '$status_owner')

					";
					mysqli_query($con, $queryInsert);
				}
?>

<html>

<head>
	<title>
		findForums
	</title>
			<link rel="stylesheet" type="text/css" href="feed.css">
			<link rel="shortcut icon" href="logo.png">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Signika" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
			<link rel="stylesheet"
  			href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"> 

</head>

<body>
	<!-- navbar -->
	<div id="navbar">
		 
		 <form method="POST" action="#">
				<input placeholder="find a topic" type="text" name="search" id="search">
				<input type="submit" name="search-btn" id="search-btn" value="Search">
		</form>
			 
			  <p id="welcome">Welcome, </p>
			  <a id="user-name" href="#"><?php echo $_SESSION["loginUsername"];?>
			  </a>

			 <span id="logo">
					<a id="home" href="#"><b>findForums</b></a>
				</span>
			
	</div>

	<?php
		if(isset($_POST["search-btn"])){
				$inputSearch = $_POST["search"];
				$querySelectAllUsers = "SELECT * FROM status WHERE status LIKE '%$inputSearch%'
				";
			}
			else{
				$querySelectAllUsers = "SELECT * FROM status";
			}

			$exeQuerySelectAllUsers = mysqli_query($con, $querySelectAllUsers);
			
	?>

	<div id="feed-container">

			<form autocomplete="off" action="#" method="POST">
					<div id="feed-post">

							<input id="post-section" autocomplete="off" style="width: 93%" type="text" name="inputStatus" placeholder="Start a discussion!">

							<input id="post-btn" type="submit" name="btnPost" value="Post">
					</div>
			</form>
					
				<?php

		// step2

		$querySelect = "SELECT * FROM status ORDER BY status_time DESC";

		// step 3 EXECUTE

		$execQuerySelectAllUsers = mysqli_query($con, $querySelect);

		while($arrayUserDetails = mysqli_fetch_assoc($execQuerySelectAllUsers)){
			$status= $arrayUserDetails["status"];
			$status_owner = $arrayUserDetails["status_owner"];
			$status_time = $arrayUserDetails["status_time"];
			?>
						<div id="feed-status" class="animated slideInUp">
							<div id="status-container">
									<strong>
										<?php
										echo "MIK";
										?>
									</strong>
									<br>&nbsp;
									<?php
										echo $status;
									?>
<!-- 
									<a href="#">Delete</a>
									<a href="#">Edit</a> -->
							</div>

								<div id="comment-content">
									<!-- <form autocomplete="off" action="?comment=successful" method="POST"> -->
										<div id="status-comment">
											Sample Comment
										</div>
										<input type="text" name="btnComment" placeholder="Put your comment here">
										<input type="submit" name="btnSubmitComment" value="Comment">
										<!-- </form> -->
								</div>
									
						</div>
				
				<?php
				}
					?>
					
	</div>
</div>
</body>
</html>