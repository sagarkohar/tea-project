<?php

include 'header.php';
// Database connection
$con = mysqli_connect("localhost", "root", "", "green coffee");
if (!$con) {
    echo ("Error" . mysqli_connect_error());
}

// $username = $_SESSION['user_name'];

$sql = "SELECT * FROM adminlogin ";
$result = mysqli_query($con, $sql);

while ($row = $result->fetch_assoc()) {
    $password = $row['password'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success = false;
    $error = false;
    $opassword = $_POST['password'];
    $new_password = $_POST["new_password"];
    $cnew_password = $_POST['confirm_new_password'];

    if ($opassword != $password) {
        $error = true;
    } elseif ($new_password == $password) {
        $error = true;
        $error1 = true;
    } else {
        $update = "UPDATE adminlogin SET 
 password='$new_password'";


        $result = mysqli_query($con, $update);

        if ($result) {
            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        Password changed successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        } else {
            echo "error" . $con->error;
        }
    }
}
?>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Change</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
  
    ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Reset Password</h3>
                        <form action="#" method="post" id="f1" class="login-form">
                            <div class="mb-3">
                                <label for="password" class="text-dark">Old Password</label>
                                <input type="password" class="form-control shadow-lg border-success" id="pwd1"
                                    placeholder="" name="password" onchange="validateOldPassword()">
                                <span id="opwd_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="labels">New Password</label>
                                <div class="password-container">
                                    <input type="password" class="form-control shadow-lg border-success" placeholder=""
                                        name="new_password" id="new_password" onchange="validateNewPassword()">
                                    <span id="pwd_error"></span>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="labels">Confirm New Password</label>
                                <div class="password-container">
                                    <input type="password" class="form-control shadow-lg border-success" placeholder=""
                                        name="confirm_new_password" id="confirm_new_password"
                                        onchange="validateConfirmPassword()">
                                    <span id="repwd_error"></span>
                                </div>

                                <div class="reg d-flex justify-content-center my-2">
                                    <button type="submit" class="btn btn-success shadow border-success text-white"
                                        name="btn" id="btn">Reset Password</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
<script>
    function validateOldPassword() {
        var oldPassword = $('#pwd1').val();
        if (oldPassword !== '<?php echo $password; ?>') {
            $('#opwd_error').html('<span style="color:red">Old password not matched</span>');
        } else {
            $('#opwd_error').html('');
        }
    }

    function validateNewPassword() {
        var newPassword = $('#new_password').val();
        if (newPassword === '<?php echo $password; ?>') {
            $('#pwd_error').html('<span style="color:red">New password cannot be same as old password</span>');
        } else {
            $('#pwd_error').html('');
        }
    }

    function validateConfirmPassword() {
        var newPassword = $('#new_password').val();
        var confirmPassword = $('#confirm_new_password').val();
        if (newPassword !== confirmPassword) {
            $('#repwd_error').html('<span style="color:red">Passwords do not match</span>');
        } else {
            $('#repwd_error').html('');
        }
    }
</script>

<script>



    $.validator.addMethod('password', function (value, element) {
        var reg1 = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?!.*[/s]).{8,20}$/;
        return reg1.test(value);
    });

    // Add custom method for notEqual
    $.validator.addMethod('notEqual', function (value, element, param) {
        return value !== param;
    });
    $(document).ready(function () {
        $('#f1').validate({
            rules: {
                password: {
                    required: true,

                },
                new_password: {
                    required: true,
                    password: true,

                },
                confirm_new_password: {
                    required: true,
                    equalTo: "#new_password"
                },
            },
            messages: {
                password: {
                    required: "Password is a required field",
                     password: "Old Password doesn't match"

                },
                new_password: {
                    required: "Password is required field",
                    password: "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special symbol, and length must be between 8 to 20 characters.",

                },
                confirm_new_password: {
                    required: "Confirm Password is a required field",
                    password: "Please enter the same password as above",
                    equalTo: "Please enter the same password as above"
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr('name') == "password") {
                    $('#opwd_error').html(error);
                }
                if (element.attr('name') == "new_password") {
                    $('#pwd_error').html(error);
                }
                if (element.attr('name') == "confirm_new_password") {
                    $('#repwd_error').html(error);
                }
            }
        });
    });



</script>