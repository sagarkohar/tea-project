<?php
include 'header.php';
include 'profileget.php';

unset($_SESSION['total_price']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        <?php include 'style.css' ?>

        .bd {
            border-right: 1px solid #4bb543;
        }

        #profile-img {
            display: block;
            width: 150px;
            /* Set desired width */
            height: 150px;
            /* Set desired height */
            object-fit: cover;
            border-radius: 50%;
        }

        .password-container {
            position: relative;
        }

        .password-icon {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 1;
        }

        @media only screen and (max-width: 992px) {
            .bd {
                border: none;
                border-bottom: 1px solid #4bb543;
            }
        }
    </style>
</head>

<body>
    <?php

    ?>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 bd">
                <div class="d-flex flex-column align-items-center justify-content-center p-3 py-5 ">
                    <img id="profile-img" class="rounded-circle mt-5" width="150px"
                        src="<?php echo "image/" . $image ?>">
                    </img>

                    <span class="font-weight-bold">
                        <?php echo $username ?>
                    </span><span class="text-black-50">
                        <?php echo $email ?>
                    </span> <span class="text-success">Role:
                        <?php echo $role ?>
                    </span> <span></span>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-success">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label><input type="text"
                                class="form-control" name="first_name" value="<?php echo $first_name ?>" disabled></div>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text"
                                class="form-control" name="last_name" value="<?php echo $last_name ?>" disabled></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Gender</label><input type="text"
                                class="form-control" name="gender" placeholder="" value="<?php echo $gender ?> "
                                disabled>
                        </div>
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                class="form-control" name="phone" placeholder="" value="<?php echo $phone ?>  "
                                disabled>
                        </div>
                        <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text"
                                class="form-control" name="address" placeholder="" value="<?php echo $address ?> "
                                disabled>
                        </div>


                        <div class="col-md-12"><label class="labels">Email ID</label><input type="email"
                                class="form-control" placeholder="" name="email" value="<?php echo $email ?> " disabled>
                        </div>

                      
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">State</label><input type="text"
                                    class="form-control" name="state" placeholder="" value="<?php echo $state ?>"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">City</label><input type="text" class="form-control" name="city"
                                    value="<?php echo $city ?>" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="button"><a
                                    href="profileupdate.php" class="text-decoration-none text-white">Edit
                                    Profile</a></button></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>
<script>
    function showOption() {
        document.getElementById('image-input').style.display = 'block';
    }

    function hideOption() {
        document.getElementById('image-input').style.display = 'none';
    }

    function changeImage(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profile-img').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("togglePassword");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>