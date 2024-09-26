<?php
include 'header.php';
if (isset($_GET['email'])) {

    $email = $_GET['email'];
    $sql = "DELETE FROM otp";
    $con->query($sql); // Executing the query
    unset($_SESSION['success']);

    $sql = "SELECT * FROM registration WHERE email='$email'";
    $result = mysqli_query($con, $sql);

    while ($row = $result->fetch_assoc()) {
        $password = $row['password'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $reset = false;
        $new_password = $_POST["new_password"];
        $cnew_password = $_POST['confirm_new_password'];
        if ($new_password != $password) {
            $update = "UPDATE registration SET 
 password='$new_password' WHERE email= '$email'";


            $result = mysqli_query($con, $update);

            if ($result) {
                $reset = true;
            } else {
                $reset=false;
            }
        }
    }
    echo "<script> var password = '$password'; </script>";
}
?>
<style>
    <?php include 'style.css' ?>

    .container {
        background: transparent;
    }

    .btn a {
        text-decoration: none;
    }

    .error {
        color: red;
    }
</style>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body>
    <div class="passwordchanged alert alert-success alert-dismissible fade show d-none" role="alert">
        Password Changed<strong>Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="passwordfailed alert alert-success alert-dismissible fade show d-none" role="alert">
        Password not changed try again after sometimes
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    if (isset($_POST["btn"])) {
        if ($reset) {
            echo "<script>$('.passwordchanged').removeClass('d-none');</script>";
        }
        else{
            echo "<script>$('.passwordfailed').removeClass('d-none');</script>";
        }
    }
    ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Reset Password</h3>
                        <form action="" method="post" id="f1" class="login-form">
                            <div class="mb-3">
                                <label for="pwd1" class="text-dark">New Password</label>
                                <input type="password" class="form-control shadow-lg border-success" id="pwd1"
                                    placeholder="" name="new_password">
                                <span id="pwd_error"></span>
                            </div>
                            <div class=" mb-3">
                                <label for="repwd1" class="text-dark">Confirm Password</label>
                                <input type="password" class="form-control shadow border-success" id="new_password"
                                    placeholder="" name="confirm_new_password">
                                <span id="repwd_error"></span>
                            </div>

                            <div class="reg d-flex justify-content-center my-2">
                                <button type="submit" class="btn btn-success shadow border-success text-white"
                                    name="btn" id="btn">Reset
                                    Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php'
        ?>
</body>

</html>
<script src="bootstrap.bundle.min.js"></script>
<script>


    $(document).ready(function () {


        $.validator.addMethod('password', function (value, element) {
            var reg1 = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?!.*[/s]).{8,20}$/;
            return reg1.test(value);
        },),

            $.validator.addMethod("notEqualToOldPassword", function (value, element) {
                return value !== password; // Compare with the old password
            }, "New password must be different from the old password");

        $.validator.addMethod("notEqual", function (value, element) {
            return value == password; // Change this to the desired email
        },);
        $('#f1').validate({
            rules: {

                new_password: {
                    required: true,
                    password: true,
                    notEqualToOldPassword: true

                },
                confirm_new_password: {
                    required: true,
                    equalTo: "#pwd1",
                },
            },
            messages: {

                new_password: {
                    required: "Password is required field",
                    password: "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special symbol, and length must be between 8 to 20 characters.",
                    notEqualToOldPassword: "New password must be different from the old password",

                },
                confirm_new_password: {
                    required: "Confirm Password is a required field",
                    password: "Please enter the same password as above",
                    equalTo: "Please enter the same password as above"
                }
            },

            errorPlacement: function (error, element) {


                if (element.attr('name') == "new_password") {
                    $('#pwd_error').html(error);
                }
                if (element.attr('name') == "confirm_new_password") {
                    $('#repwd_error').html(error);
                }
            },

        });


    });
</script>