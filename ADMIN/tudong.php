<?php
require 'vendor/autoload.php';  // Đường dẫn đến autoload.php của PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendWeeklyEmail() {
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vuonghuythuan1@gmail.com'; // Thay đổi địa chỉ email người gửi
        $mail->Password = 'ymxea rvjt gqqt zmtd'; // Thay đổi mật khẩu email người gửi
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('vuonghuythuan1@gmail.com', 'Your Name'); // Thay đổi địa chỉ email người gửi

        // Thêm địa chỉ email người nhận
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

sendWeeklyEmail();
?>
