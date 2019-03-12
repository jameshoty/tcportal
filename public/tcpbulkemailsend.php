<?php
session_start();

include 'includes/header.php';
require '../vendor/autoload.php';
require 'includes/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use classes\business\UserManager;
use classes\entity\User;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $mail = new PHPMailer(true);              // Passing `true` enables exceptions
    try {

        $UM=new UserManager();
        $users=$UM->getAllUsers();          

            foreach ($users as $user) {

                if ($user && $user->unsub != '1'): 
                    // moved here for testing
                    $mail = new PHPMailer(true);
                    
                    // Server settings
                    // $mail->SMTPDebug = 1;                    // Enable verbose debug output
                    $mail->isSMTP();                            // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                     // Enable SMTP authentication
                    $mail->Username = 'jameshoty18@gmail.com';  // SMTP username lithanlithan8@gmail.com
                    $mail->Password = 'Google18jameshoty';      // SMTP password H245hyt12
                    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                          // TCP port to connect to
        
                    //Recipients
                    $mail->setFrom('jameshoty@me.com', 'James');
                    // Add each email into the $mail object      
                    // $email_recipients = explode(',',$emails);

                    $mail->addAddress($user->email);
                    $mail->addReplyTo('jameshoty@me.com', 'Support');

                    //Content
                    $mail->isHTML(true);                        // Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $message . ". To unsubscribe, click 
                    <a href='http://localhost/phpcrudsample/public/unsub.php?id=$user->id'>here</a>
                    <img src='http://localhost/phpcrudsample/public/emailTracking.php?id=$user->id'  style='width: 1px; height: 1px;' >
                    "
                    ;
                    
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    
                    $mail->send();
                endif;
            }
        
            
        
            echo "<br>";
            echo 'Message has been sent';

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}


include 'includes/footer.php';
?>