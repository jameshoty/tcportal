<?php
session_start();
// include 'includes/security.php';
include 'includes/header.php';

require_once 'includes/autoload.php';
$formError = "";

$email = "";
$subject = "";
$message = "";
$error_email = "";
$error_subject = "";
$error_message = "";

?>

<link rel = "stylesheet" href = ".\css\pure-release-1.0.0\pure-min.css">
<form name = "myForm" method = "post"  action = "tcpbulkemailsend.php">
    <h1>Bulk Email</h1>
    <div><?=$formError?></div>
    <table width="800">
      	<tr>
        	<td>Subject</td>
        	<td><input type = "text" name = "subject" size = "50" value = "<?=$subject?>"></td>
    		<td><?=$error_subject?></td>
      	</tr>
      	<tr>
        	<td>Message</td>
        	<td><input type = text name = "message" size = "50" value = "<?=$message?>"></td>
    		<td> <?=$error_message?>
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


<?php
include 'includes/footer.php';
?>
