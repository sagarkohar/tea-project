<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../db_connect.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
if (isset($_GET['uname'])) {
    $uname=$_GET['uname'];
}
$sql1 = "SELECT * FROM registration WHERE email='$email'";
$result1 = $con->query($sql1);
$row = $result1->fetch_assoc();

$sql2 = "SELECT * FROM otp WHERE email='$email'";
$result2 = $con->query($sql2);
$row2 = $result2->fetch_assoc();
$otp = $row2['otp'];
// echo $row['uemail'] . " " . $row['uname'] . " " . $uid . " " . $otp;

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
    $mail->Password = ''; // SMTP password // sender mail id password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, ssl also accepted
    $mail->Port = 465; // TCP port to connect to

    // Recipients
    $mail->setFrom('noreplygreencoffee@gmail.com', 'Sumit Chaudhary'); // Sender's email address and name
    $mail->addAddress($email); // Recipient's email address and name

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Veification Green Coffee';
    $mail->Body = 'Dear,' . $uname . '<br>your otp is :' . $otp."Do not share this with others";

    // Send the email
    $mail->send();
} catch (Exception $e) {
    echo "Email sending failed. Error: {$mail->ErrorInfo}";
}
$_SESSION['email'] = $email;
echo "<script>window.location.href = '../login_otp.php?email=$email';</script>";

?>
