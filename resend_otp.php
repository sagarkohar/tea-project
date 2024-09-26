<?php
include 'db_connect.php';
$email = $_REQUEST['email'];

$sql_email = "SELECT * FROM registration WHERE email='$email'";
$result_email = mysqli_query($con, $sql_email);


if ($result_email->num_rows == 1) {
    $email_row = mysqli_fetch_assoc($result_email);
    $uname = $email_row['user_name'];


    $otp = rand(1000, 9999);

    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date("Y-m-d H:i:s");

    $otp_delete = "DELETE FROM otp WHERE email='$email'";
    $result_delete = $con->query($otp_delete);
    if ($result_delete) {
        $otp_sql = "INSERT INTO otp(otp, email, otp_create_time) VALUES ('$otp','$email','$currentDateTime')";

        // echo $otp." ".$email." ".$currentDateTime;
        $result_otp = $con->query($otp_sql);
        if ($result_otp) {

            echo "<script>window.location.href = 'PHP Mail/send_email.php?email=" . $email . "&uname=" . $uname . "';</script>";



        } else {
            echo "Error" . $con->error;
        }
    } else {

        echo "Error" . $con->error;
    }


} else {

    echo "<script>$('.email_error').removeClass('d-none');</script>";
}

?>