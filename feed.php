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


		// step2

		$querySelect = "SELECT * FROM tbl_users";

		// step 3 EXECUTE

		$execQuerySelectAllUsers = mysqli_query($con, $querySelect);

		$userId = $_GET["user_id"];
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
  			<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body> 
	<span id="open-sidenav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

	<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a class="snav-list" href="#">Profile</a>	
		  <a class="snav-list" href="about.php">About Us</a>
		  <a class="snav-list" href="logout.php">Logout</a>
		  <div id="footer">
		  	all rights resereved 2018-2020 findForums.
		  </div>

	</div>


	<div id="navbar">


		 <form method="POST" action="#">
				<input placeholder=" find a topic" type="text" name="search" id="search">
				<input type="submit" name="search-btn" id="search-btn" value="Search">
		</form>
			 
			  <p id="welcome">Welcome, </p>
			  <a id="user-name" href="#"><?php echo $_SESSION["loginUsername"];?>
			  </a>

			 <span id="logo">
					<a id="home" href="#"><b>findForums</b></a>
				</span>


	</div>

	<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>



	<div id="feed-container">

			<form autocomplete="off" action="#" method="POST">
					<div id="feed-post">

							<input id="post-section" autocomplete="off" style="width: 93%" type="text" name="inputStatus" placeholder="Start a discussion!">

							<input id="post-btn" type="submit" name="btnPost" value="Post">
					</div>
			</form>
					
				<?php

		if(isset($_POST["search-btn"])){
				$inputSearch = $_POST["search"];
				$querySelectAllUsers = "SELECT * FROM status WHERE status LIKE '%$inputSearch%' ORDER BY status_time DESC
				";
			}
			else{
				$querySelectAllUsers = "SELECT * FROM status ORDER BY status_time DESC";
			}

			$execQuerySelectAllUsers = mysqli_query($con, $querySelectAllUsers);

		while($arrayUserDetails = mysqli_fetch_assoc($execQuerySelectAllUsers)){
			$status = $arrayUserDetails["status"];
			$status_owner = $arrayUserDetails["status_owner"];
			$status_time = $arrayUserDetails["status_time"];
			$status_id = $arrayUserDetails["status_id"];
			?>
						<div id="feed-status" class="animated slideInUp">
							<div id="status-container">
<!-- ////////////////////////////////////////////////USERNAME//////////////////////////////////////////////////////////////////// -->
									<strong>
										<?php

										$queryShowUname = "SELECT * FROM tbl_users WHERE user_id = '$status_owner'";

										$execQueryShowUname = mysqli_query($con, $queryShowUname);

										$resUname = mysqli_fetch_assoc($execQueryShowUname);

										$uname = $resUname["username"];

										echo $uname;
										?>
									</strong>
									<i>
										<?php
										echo $status_time;
										?>
									</i>
<!-- /////////////////////////////////////////////////POST/////////////////////////////////////////////////////////////////// -->	
									<br>&nbsp;
									<?php
										echo $status;
									?>
<!-- 
									<a href="#">Delete</a>
									<a href="#">Edit</a> -->								

							</div>
<!-- ////////////////////////////////////////////COMMENt//////////////////////////////////////////////////////////////////////// -->
									
									<!-- <iframe src="comment-reply.php"></iframe> -->
									<div id="comment-content">

									<!-- <form autocomplete="off" action="#" method="POST"> --> 
											

											<?php
												if(isset($_POST["btnSubmitComment"])){

													$comment = $_POST["inputComment"];
													$comment_owner = $_SESSION["user_id"];
													$status_comment_owner = $_SESSION["status_id"];


													$queryInsertComment = "
												INSERT INTO comments(comment, comment_owner, status_comment_owner)
												VALUES('$comment', '$comment_owner', '$status_comment_owner')";

													mysqli_query($con, $queryInsert);
												}
											?>

										<div id="status-comment">
													
						<?php

							$queryShowComment = "SELECT * FROM comments WHERE status_comment_owner = '$status_comment_owner'";

							$execQueryShowComment = mysqli_query($con, $queryShowComment);

							$resComment = mysqli_fetch_assoc($execQueryShowComment);

							$comment1 = $resComment["inputComment"];

							echo "Comment: This is a comment". $comment1 . $comment_time;

														// var_dump($comment1);
						?> 
													<i>
										<?php
										echo $comment_time;
										?>
									</i>
										</div>
										<?php
												 // }
											?>	
										
										<input type="text" name="inputComment" placeholder="Put your comment here">
										<input type="submit" name="btnSubmitComment" value="Comment">

										 
									<!-- </form>  -->

									
								</div>
						</div>
				 <?php
												  }
											?>	 
					
		</div>
</body>
</html>