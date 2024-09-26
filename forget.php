<?php

include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .otp-box {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 1.5rem;
            border: 2px solid #ced4da;
            border-radius: 10px;
            margin-right: 10px;
            color: black
        }

        .otp-box:focus {
            outline: none;
            /* Remove outline when focused */
            border-color: #198754;
            /* Change border color when focused */
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.js"></script>
</head>

<body>
    <div class='email_error alert alert-danger alert-dismissible fade show d-none' role='alert'>
        Sorry, email is not registered! Try another email id.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Forget Password</h3>
                        <form action="#" method="post" id="forget-password-form">
                            <div class="mb-3">
                                <label for="contact" class="form-label">Email</label>
                                <input type="text" class="form-control" id="contact" name="email"
                                    placeholder="Enter your email or phone number" required>

                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success" id="get-otp-btn" name="getotp">Get
                                    OTP</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#forget_email').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Email is required"
                    }
                },
                errorPlacement: function (error, element) {
                    if (element.attr('id') == "email") {
                        $('#email_error').html(error);
                    }
                }
            });
        });
    </script>

    <?php

    if (isset($_POST['getotp'])) {
        $email = ($_POST['email']);
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

                    echo "<script>window.location.href = 'PHP Mail/send_email.php?email=" . $email . "&uname=" .$uname . "';</script>";



                } else {
                    echo "Error" . $con->error;
                }
            } else {

                echo "Error" . $con->error;
            }


        } else {
            
            echo "<script>$('.email_error').removeClass('d-none');</script>";
        }
    } else {
       
    }
    ?>