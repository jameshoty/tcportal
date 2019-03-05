<?php
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
require_once '../phpmailer/PHPMailerAutoload.php';
include 'includes/header.php';
$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();

if(isset($_POST["submitted"])){
    $email=$_POST["email"];
	$UM=new UserManager();
	$existuser=$UM->getUserByEmail($email);
	if(isset($existuser)){
			//generate new password
			$newpassword=$UM->randomPassword(8,1,"lower_case,upper_case,numbers");
			//update database with new password
			$UM->updatePassword($email,md5($newpassword[0]));  
			//To do: coding for sending email
			$mail = new PHPMailer();
			$mail->setFrom('lithanm6@gmail.com', 'Admin');
			$mail->addAddress($email);
			$mail->Subject = 'Password Reset Request';
			$mail->isHTML(TRUE);
			$mail->Body = 'The new password : ' . $newpassword[0] . ' is sent to the registered email address.';
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->SMTPSecure = 'ssl';
			$mail->SMTPAuth = TRUE;
			$mail->Username = 'lithanlithan8@gmail.com';
			$mail->Password = 'H245hyt12';
			if (!$mail->send())
			{
			    echo "Error: " . $mail->ErrorInfo;
			}
			else
			{
			    $formerror="New password have been sent to ".$email;
			    ?>
			    Continue <a href="login.php">Login</a> with your new password now!
			    <?php
			}
	}else{
			$formerror="Invalid email user";
	}
}

?>
<html>
<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<body>

<h1>Forget Password</h1>
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<table border='0' width="100%">
  <tr>    
    <td>Email</td>
    <td><input type="email" name="email" value="<?=$email?>" pattern=".{1,}"   required title="Cannot be empty field" size="30"></td>
	<td><?php echo $error_name?>
  </tr> 
  <tr>
    <td></td>
    <td><br><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    </td>
  </tr>
  <tr><p style="color:red;"> <?php echo $formerror?></p></tr>
</table>
</form>
<?php
include 'includes/footer.php';
?>