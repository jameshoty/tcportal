<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'includes/header.php';
require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $emails = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mail = new PHPMailer(true);              // Passing `true` enables exceptions
    try {
        //Server settings
        // $mail->SMTPDebug = 1;                 // Enable verbose debug output
        $mail->isSMTP();                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;               // Enable SMTP authentication
        $mail->Username = 'jameshoty18@gmail.com';                 // SMTP username lithanlithan8@gmail.com
        $mail->Password = 'Google18jameshoty';               // SMTP password
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted tls
        $mail->Port = 587;                    // TCP port to connect to 587
        
        //Recipients
        $mail->setFrom('jameshoty@me.com', 'Admin');
        // Add each email into the $mail object      
        $email_recipients = explode(',',$emails);
        foreach ($email_recipients as $recipient) {
            $mail->addAddress($recipient);
        }
        $mail->addReplyTo('jameshoty@me.com', 'Support');

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo "<br>";
        echo 'Message has been sent (bulkemailsend.php)';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}


include 'includes/footer.php';
?>