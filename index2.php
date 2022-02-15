<!DOCTYPE html>
<!-- saved from url=(0039)http://localhost/social_media/#section2 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>findFriends</title>
	<link rel="stylesheet" href="./updated.php_files/animate.min.css">
			<link rel="stylesheet" type="text/css" href="./updated.php_files/styles.css">
			<link rel="stylesheet" href="./updated.php_files/animate.min.css">
		  	<link href="./updated.php_files/css" rel="stylesheet">
			<link rel="shortcut icon" href="http://localhost/social_media/spada.ico">
			<link href="./updated.php_files/css(1)" rel="stylesheet">
			<link href="./updated.php_files/css(2)" rel="stylesheet">
			<link href="./updated.php_files/css(3)" rel="stylesheet">
			<script src="./updated.php_files/jquery.min.js.download"></script>
			<link href="./updated.php_files/css(4)" rel="stylesheet">
			
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="./updated.php_files/bootstrap.min.css">
			<script src="./updated.php_files/jquery.min.js.download"></script>
			<script src="./updated.php_files/bootstrap.min.js.download"></script>
			<script src="./updated.php_files/jquery.min.js.download"></script>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<script>
			$(document).ready(function(){
			  // Add smooth scrolling to all links
			  $("a").on('click', function(event) {

			    // Make sure this.hash has a value before overriding default behavior
			    if (this.hash !== "") {
			      // Prevent default anchor click behavior
			      event.preventDefault();

			      // Store hash
			      var hash = this.hash;

			      // Using jQuery's animate() method to add smooth page scroll
			      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			      $('html, body').animate({
			        scrollTop: $(hash).offset().top
			      }, 800, function(){
			   
			        // Add hash (#) to URL when done scrolling (default click behavior)
			        window.location.hash = hash;
			      });
			    } // End if
			  });
			});
			</script>
</head>

<body class="modal-open" style="padding-right: 17px;">
<div class="bg1" id="section1">
	<div class="header sticky" id="myHeader">	

				<span id="sign-up-container">
					<a id="sign-up" href="http://localhost/social_media/#section2">Sign Up!</a>
				</span>
				
				<div class="container-Sign-Up">
				  <!-- Trigger the modal with a button -->
				 	 <button id="sign-in" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Sign In!</button>

				  <!-- Modal -->
				  <div class="modal fade in" id="myModal" role="dialog" style="display: block; padding-right: 17px;">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				    	<div class="modal-content">
					        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">×</button>
						          <h4 class="modal-title">SIGN IN</h4>
					        </div>

					        <div id="modal-body">
								<form action="http://localhost/social_media/#" method="post">
									<ul>
							            <li>Username: <input type="text" name="inputUsername" placeholder="Username" required=""></li>
							            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
							            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							            <li>Password: <input type="password" name="inputPassword" placeholder="Password" required=""></li>
							            <li><input id="btnLogin" type="submit" name="btnSubmit" value="Login"></li>
						       		 </ul>
								</form>
							</div>

				    	</div>
				      
				    </div>
				  </div>
				  
				</div>
			
		

			<span class="logo">
				findFriends
			</span>

	</div>
			<script>
		window.onscroll = function() {myFunction()};

		var header = document.getElementById("myHeader");
		var sticky = header.offsetTop;

		function myFunction() {
		  if (window.pageYOffset > sticky) {
		    header.classList.add("sticky");
		  } else {
		    header.classList.remove("sticky");
		  }
		}
		</script>
</div>

<!-- =========================== REGISTRATION ====================================== -->


<div class="bg2" id="section2">

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<form action="http://localhost/social_media/?promt=successful" method="post">
	<div id="header">
			</div><table border="1" width="30%" style="border-collapse:  collapse; margin:auto;" cellpadding="20" class="animated fadeInRightBig">
				
				<tbody><tr>
					<td>Username:</td>
					<td>
						<input type="text" name="inputUsername" required="">
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type="password" name="inputPassword" required="">
					</td>
				</tr>
				<tr>
					<td>E-Mail:</td>
					<td>
						<input type="text" name="inputEmail" required="">
					</td>
				</tr>
				<tr>
					<td>Contact #:</td>
					<td>
						<input type="text" name="inputContact" required="">
					</td>
				</tr>
					
				<tr>
					<td colspan="2" align="center"> 
						<a href="http://localhost/social_media/index.php"> Click here to Login!</a> 
					</td>
				</tr>
				<tr>

					<th colspan="2">
						<input class="btn" type="submit" name="btnSubmit" value="Sign Up">
					</th>
				</tr>
		</tbody></table>
		</form>


</div>

</body></html>