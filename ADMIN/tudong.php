<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendWeeklyEmail() {
    $mail = new PHPMailer(true);

    try {
        // Enable verbose debugging
        // $mail->SMTPDebug = 2;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vuonghuythuan1@gmail.com';
        $mail->Password = 'your_gmail_password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('vuonghuythuan1@gmail.com', 'Your Name');

        $recipients = ['nguyenbatung@gmail.com'];
        foreach ($recipients as $recipient) {
            $mail->addAddress($recipient);
        }

        $mail->Subject = 'Weekly Update';
        $mail->Body = 'This is the body of your weekly email.';

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

sendWeeklyEmail();
?>
