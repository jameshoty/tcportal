<!-- Navigation Bar -->
<!-- Different user type have different view  -->
<?php 
if(isset($_SESSION["email"])) {   
?>
	<!-- the following code is shown before login -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<div class="w3-bar w3-black w3-large">
	<img src="http://localhost/phpcrudsample/public/images/logo.png" align="left" style="width:55px; height:35px">
	<!--  Menu : Home -->
	<a href="/phpcrudsample/public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
	
	<!-- Menu : Update Profile -->
	<a href="/phpcrudsample/public/modules/user/updateprofile.php" class="w3-bar-item w3-button w3-mobile">Update Profile</a>
<?php 
	if($_SESSION["role"]=="admin") {
?>		
	
	<!-- Menu : Bulk Email -->
	<a href="/phpcrudsample/public/tcpbulkemail.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Bulk Emailing</a>

		<!-- Menu : View User (only if Admin login) -->
		<a href="/phpcrudsample/public/modules/user/userlist.php" class="w3-bar-item w3-button w3-mobile">View Users</a>
		<!-- Menu : View Feedback (only if Admin login) -->
		<a href="/phpcrudsample/public/modules/feedback/feedbacklist.php" class="w3-bar-item w3-button w3-mobile">View Feedbacks</a>
<?php
	}
?>
	<!-- Menu : Contact -->
	<a href="/phpcrudsample/public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
	<!--  Menu : Logout -->
	<a href="/phpcrudsample/public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
	</div>
<?php 
} else {
?>
	<!-- the following code is shown before login -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<div class="w3-bar w3-black w3-large">
	<img src="http://localhost/phpcrudsample/public/images/logo.png" align="left" style="width:55px; height:35px">
	<!-- Menu : Home -->
	<a href="/phpcrudsample/public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
	<!-- Menu : About Us -->
	<a href="/phpcrudsample/public/aboutus.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>About Us</a>
	
	<!-- Menu : Contact -->
	<a href="/phpcrudsample/public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
	<!-- Menu : Login (may not be necessary) -->
	<a href="/phpcrudsample/public/login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Login</a>
	</div>
<?php 
}
?>
