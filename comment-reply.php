<!DOCTYPE html>
<html>
<head>
	<title> Comment Section</title>
			<link rel="stylesheet" type="text/css" href="feed.css">
			<link rel="shortcut icon" href="logo.png">
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Signika" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
			<link rel="stylesheet"
  			href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"> 
</head>
<body>
							<div id="comment-content">
									<form autocomplete="off" action="#" method="POST"> 

											<?php 

													if(isset($_POST["btnSubmitComment"])){

													$comment = $_POST["inputComment"];
													$comment_owner = $_SESSION["user_id"];
													$queryCommentInsert = "

													INSERT INTO comments(comment, comment_owner)
													VALUES('$comment', '$comment_owner')

													";
													$execQueryCommentInsert = mysqli_query($con, $queryCommentInsert);
													}

													while($arrayComment = mysqli_fetch_assoc($execQueryCommentInsert)){
													$comment= $arrayComment["status"];
													$comment_time = $arrayComment["status_time"];
											?>

										<div id="status-comment">
													
													<?php
														echo $comment;
													?>
										</div>
										

										<input type="text" name="inputComment" placeholder="Put your comment here">
										<input type="submit" name="btnSubmitComment" value="Comment">
									</form> 
									<?php
											}
										?>
								</div>
</body>
</html>





