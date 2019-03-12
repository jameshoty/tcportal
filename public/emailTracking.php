<?php
session_start();
require_once 'includes/autoload.php';
include 'includes/header.php';
include 'includes/security.php';
use classes\util\DBUtil;
use classes\business\emailTrackingManager;
use classes\entity\emailTracking;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $today = date("d/m/y");

    $eTM = new emailTrackingManager();
    $eT = new emailTracking();
    $eT->user_id=$id;
    $eT->date_read=$today;
    $eTM->saveEmailTracking($eT);

    ?>
    <h1> You have READ the email</h1>
    <?php
} else {
?>

<h1>Error, please try again</h1>
<?php }
include 'includes/footer.php';
?>