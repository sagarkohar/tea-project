<?php
require '../db_connect.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sent = false;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require ('PHPMailer\PHPMailer.php');
require ('PHPMailer\SMTP.php');
require ('PHPMailer\Exception.php');
$mail = new PHPMailer();
try {
    // Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'noreplygreencoffee@gmail.com'; // SMTP username//sender mail id
    $mail->Password = 'mnzl xagq sztx sixc'; // SMTP password // sender mail id password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, ssl also accepted
    $mail->Port = 465; // TCP port to connect to

    // Recipients
    $mail->setFrom('noreplygreencoffee@gmail.com', 'Sumit Chaudhary'); // Sender's email address and name
    $mail->addAddress($email); // Recipient's email address and name

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Veification Green Coffee';
    $mail->Body = $body = 'Click <a href="http://localhost:90/Green Coffee/updatestatus.php?email=' . $email . '">here</a> to activate your account';

    // Send the email
    $result=$mail->send();
} catch (Exception $e) {
    echo "Email sending failed. Error: {$mail->ErrorInfo}";
}
if (!$result) {
    setcookie("failed", "Failed to send", time() + 2, "/");

}
else{
setcookie("success", "Password reset link has been sent to your registered email. Please check the spam also", time() + 2, "/");
}
?>
<script>
    window.location.href = "../login.php";
</script>