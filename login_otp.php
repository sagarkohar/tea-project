<?php

include 'header.php';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $('#loginotp').validate({
            rules: {
                loginOTP: { // corrected ID here
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                    digits: true // corrected option name here
                }
            },
            messages: {
                loginOTP: {
                    required: "OTP must be 4 digits",
                    minlength: "OTP must be 4 digits",
                    maxlength: "OTP must be 4 digits",
                    digits: "OTP must be digits only" // corrected option name here
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr('name') == "loginOTP") {
                    $('#loginOTP_error').html(error);
                }
            }
        });
    });
</script>
<?php

?>
<div class="expire alert alert-danger alert-dismissible fade show d-none" role="alert">
    Sorry,Otp is expired! Try to resend otp
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="incorrect alert alert-danger alert-dismissible fade show d-none" role="alert">
    Sorry,Otp is incorrect! Try to correct otp
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="technical alert alert-warning alert-dismissible fade show d-none" role="alert">
    Sorry,Some technical issues! try to some time
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8 col-12 px-4 py-3 shadow-lg border rounded bg-light">
            <form id="loginotp" action="#" method="post">
                <div class="text-center mb-3">
                    <h2 class="modal-title fs-4 text-success">OTP Verification</h2>
                    <p class="text-muted">Please enter the OTP sent to your email.</p>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="loginOTP" id="loginOTP" placeholder="Enter OTP">
                    <label for="floatingInput">OTP</label>
                    <span id="loginOTP_error" class="text-danger"></span>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="otp_submit" class="btn btn-success btn-lg">Verify OTP</button>
                </div>
                <hr class="my-3">
                <div class="text-center">
                    <p class="mb-1">Didn't receive the OTP?</p>
                    <button type="button" class="btn btn-link" name="resend" onclick="window.location.href='resend_otp.php?email=<?php echo $email ?>'">Resend OTP</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['otp_submit'])) {
    // Ensure $uid is properly defined
    $otp_enter = $_POST['loginOTP'];

    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date("Y-m-d H:i:s", strtotime("-30 seconds"));
    // echo $currentDateTime;

    $sql_otp = "SELECT * FROM otp WHERE email='$email'";
    $result_otp = $con->query($sql_otp);
    if ($result_otp) {
        $count = mysqli_num_rows($result_otp);
    }
    if ($count == 0) {
        echo "<script>$('.expire').removeClass('d-none');</script>";
    } else {
        if ($result_otp) {
            $row = $result_otp->fetch_assoc();
            $otp_time = $row['otp_create_time'];
            // echo $row['otp'];

            // echo '<br>' . $otp_time;
            // echo '<br>' . $otp;
            // echo '<br>' . $currentDateTime;
        }
        if ($otp_enter == $row['otp']) {
            if ($currentDateTime <= $otp_time) {

                echo "<script>window.location.href = 'reset.php?email=" . $email . "';</script>";
            } else {
                $otp_delete = "DELETE FROM otp WHERE email=$email;";
                $result_delete = $con->query($otp_delete);
                echo "<script>$('.expire').removeClass('d-none');</script>";
            }
        } else {
            // setcookie('incorrect', 'incorrect otp', time() + 2, "/");
            echo "<script>$('.incorrect').removeClass('d-none');</script>";
        }
    }
}
?>