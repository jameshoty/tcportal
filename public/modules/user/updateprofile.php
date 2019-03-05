<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";

if(!isset($_POST["submitted"])) {
    $UM=new UserManager();
    
    // Search for the user by email
    $existuser=$UM->getUserByEmail($_SESSION["email"]);
    
    $firstName=$existuser->firstName;
    $lastName=$existuser->lastName;
    $email=$existuser->email;
    
    // Warning: this will retrieve the hashed password, which is not very useful
    $password=$existuser->password;
} else {
    // When the user click on the submit button
    $firstName=$_POST["firstName"];
    $lastName=$_POST["lastName"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    if($firstName!='' && $lastName!='' && $email!='' && $password!='') {
        $update=true;
        $UM=new UserManager();
        
        // check that the user is trying to change the email address that is not currently in used
        if($email!=$_SESSION["email"]) {
            $existuser=$UM->getUserByEmail($email);
            if(is_null($existuser)==false) {
                $formerror="User Email already in use, unable to update email";
                $update=false;
            }
        }
        
        if($update) {
            $existuser=$UM->getUserByEmail($_SESSION["email"]);
            $existuser->firstName=$firstName;
            $existuser->lastName=$lastName;
            $existuser->email=$email;
            
            // New password is hashed
            $existuser->password=md5($password);
            
            // Save changes to database
            $UM->saveUser($existuser);
            $_SESSION["email"]=$email;
            
            // Return to Home page after saving
            header("Location:../../home.php");
        }
    } else {
        $formerror="Please complete all fields to update your profile";
    }
}

?>
<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<h1>Update Profile</h1>
<div><?=$formerror?></div>
<table width="800">
  <tr>
    <td>First Name</td>
    <td><input type="text" name="firstName" value="<?=$firstName?>" size="50"></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" name="lastName" value="<?=$lastName?>" size="50"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email" value="<?=$email?>" size="50"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" value="<?=$password?>" size="20"></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input type="password" name="cpassword" value="<?=$password?>" size="20"></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    <input type="reset" name="reset" value="Reset" class="pure-button pure-button-primary"></td>
    </td>
  </tr>
</table>
</form>


<?php
include '../../includes/footer.php';
?>