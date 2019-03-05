<?php
session_start();

require_once '../../includes/autoload.php';
include '../../includes/header.php'
?>
<?php
// var_dump($_SESSION);
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
?>
 
<h1>Thank You <?php echo $fname . " " . $lname?></h1>
Thank you for submitting your feedback. We are reviewing your feedback.<br /><br />

<?php
include '../../includes/footer.php';
?>