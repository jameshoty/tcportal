<?php
ob_start();
use classes\entity\Feedback;
use classes\business\FeedbackManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
$formError = "";

$firstName = "";
$lastName = "";
$email = "";
$comments = "";
$error_firstName = "";
$error_lastName = "";
$error_passwd = "";
$error_email = "";
$error_comments = "";
$validate = new Validation();

if (isset($_POST["submitted"])) {
    $email     = strip_tags($_POST["email"]);
    $lastName  = strip_tags($_POST["lastName"]);
    $firstName = strip_tags($_POST["firstName"]);	
	$comments  = strip_tags($_POST["comments"]);	
	
	$validate->check_name($firstName, $error_firstName);
	$validate->check_name($lastName, $error_lastName);
	$validate->check_email($email, $error_email);	
	$validate->check_comments($comments, $error_comments);
	
	if(empty($error_firstname) && empty($error_lastname) && empty($error_email) && empty($error_comments)) {
	    $feedback = new Feedback();
        $feedback->firstName = $firstName;
        $feedback->lastName = $lastName;
        $feedback->email = $email;
        $feedback->comments = $comments;
		$FM = new FeedbackManager();
		$FM->insertFeedback($feedback);
        // $formerror="* Your feedback is submitted successfully!";
		$_SESSION['fname'] = $firstName;
		$_SESSION['lname'] = $lastName;
		var_dump($_SESSION);
		
		echo '<meta http-equiv="Refresh" content="1; url=./modules/user/IU09-01thankyou.php">';
	}
}
?>

<link rel = "stylesheet" href = ".\css\pure-release-1.0.0\pure-min.css">
<form name = "myForm" method = "post" class = "pure-form pure-form-stacked">
    <h1>Feedback Form</h1>
    <div><?=$formError?></div>
    <table width="800">
    	<tr>
            <td>First Name</td>
            <td><input type = "text" name = "firstName" size = "50" value = "<?=$firstName?>"></td>
        	<td><?=$error_firstName?></td>
    	</tr>
      	<tr>
        	<td>Last Name</td>
        	<td><input type = "text" name = "lastName" size = "50" value = "<?=$lastName?>"></td>
    		<td><?=$error_lastName?></td>
      	</tr>
      	<tr>
        	<td>Email</td>
        	<td><input type = "text" name = "email" size = "50" value = "<?=$email?>"></td>
    		<td><?=$error_email?>
      	</tr>
      	<tr>    
        	<td>Comments</td>
    		<td><textarea name = "comments" rows = "7" cols = "50" value = "<?=$comments?>"></textarea></td>
    		<td><?=$error_comments?>
      	</tr>   
      	<tr>
      		<td></td>
      		<td><br> 
       	    	<input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
       	    	<input type="reset" name="reset" value="Clear Form" class="pure-button pure-button-primary">
       		</td>
      	</tr>
    </table>
</form>
