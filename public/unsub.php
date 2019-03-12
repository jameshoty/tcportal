<?php
session_start();
include 'includes/security.php';
use classes\business\UserManager;
include 'includes/header.php';
require_once 'includes/autoload.php';

if (isset($_GET['id'])) {
    UserManager::updateUnsub($_GET['id']);
    ?>
    <h1> You have unsubscribed</h1>
    <?php
} else {
?>

<h1>Error, please try again</h1>
<?php }
include 'includes/footer.php';
?>