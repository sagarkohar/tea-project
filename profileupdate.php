<?php
include 'header.php';
require 'profileget.php';
require 'updateprofileget.php';
?>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Details</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">


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



        .photo-preview {
            background-size: cover;
            background-position: center;
        }

        .img {
            position: relative;
            display: inline-block;
            /* Ensure the div fits its content */
        }

        .img:hover .middle-profilepic {
            display: flex !important;
            /* position: relative; */
            cursor: pointer;
            width: 120px;
        }

        .error {
            color: red;
        }

        a {
            text-decoration: none;
            color: white;
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
    if (isset($_POST["btn"])) {
        if ($showAlert) {
            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
       profile updated successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
    }

    ?>

    <div class="container rounded bg-white mt-5 mb-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="f1"
            enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 bd">
                    <div class="d-flex flex-column align-items-center justify-content-center p-3 py-5 ">
                        <div class="img">
                            <div class="photo-preview card-img">
                                <img id="profile-img" class="rounded-circle mt-5" width="150px"
                                    src="<?php echo "image/" . $image ?>">
                                </img>
                            </div>
                            <div
                                class="middle-profilepic text-center card-img-overlay d-none flex-column justify-content-center">

                                <input type="file" class="form-control shadow border-success" id="image" placeholder=""
                                    name="image" accept=" .jpg,.jpeg, .png">

                            </div>
                        </div>


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
                            <h4 class="text-success">Update Profile</h4>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">First Name</label>
                                <input type="text" class="form-control" name="fn" value="<?php echo $first_name ?>">
                                <span id="fn1_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Last Name</label>
                                <input type="text" class="form-control" name="ln" value="<?php echo $last_name ?>">
                                <span id="ln1_error"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Gender</label>
                                <input type="text" class="form-control" name="ge" placeholder="Enter your gender"
                                    value="<?php echo $gender ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control" name="ph" placeholder=""
                                    value="<?php echo $phone ?>">
                                <span id="mobile_error"></span>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address Line 1</label>
                                <input type="text" class="form-control" name="ad" placeholder=""
                                    value="<?php echo $address ?>">
                                <span id="address_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label class="labels">Email ID</label>
                                <input type="email" class="form-control" placeholder="enter email id" name="em"
                                    value="<?php echo $email ?>">
                                <span id="email_error"></span>
                            </div>

                            <!-- <div class="col-md-12">
                                <label class="labels">New Password</label>
                                <div class="password-container">
                                    <input type="password" class="form-control" placeholder="enter new password"
                                        name="new_password" id="new_password">
                                    <span id="pwd_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Confirm New Password</label>
                                <div class="password-container">
                                    <input type="password" class="form-control" placeholder="confirm new password"
                                        name="confirm_new_password" id="confirm_new_password">

                                    <span id="repwd_error"></span>
                                </div>
                            </div> -->

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="inputState" class="text-dark">Select Your State:</label>

                                    <select class="form-control shadow border-success" id="inputState" name="st"
                                        onchange="updateCities()">
                                        <option selected value="<?php echo $state ?>">
                                            <?php echo $state ?>
                                        </option>
                                        <option value="Andra Pradesh">Andra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madya Pradesh">Madya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories
                                        </option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Pondicherry">Pondicherry</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputDistrict" class="text-dark">Select Your City:</label>

                                    <select class="form-control shadow border-success" id="inputDistrict" name="ci">
                                        <option value="<?php echo $city ?>">
                                            <?php echo $city ?>
                                        </option>
                                    </select>
                                    <span id="city_error"></span>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-12 d-flex justify-content-center gap-2">

                                <button type="submit" class="btn btn-success w-25 shadow border-success text-white"
                                    name="btn">Update</button>
                                </a>
                                <a href="changepassword.php" class="btn btn-success rounded w-auto">Change Password</a>
                            </div>
                        </div>

        </form>

    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function () {
        $.validator.addMethod("fnregx", function (value, element) {
            var regex = /^[a-zA-Z]+$/;
            return regex.test(value);
        });

        $.validator.addMethod('fnphone', function (value, element) {
            var reg = /^[0-9]{10}$/;
            return reg.test(value);
        }, "Number must contain at least 10 digits and cannot have more than 10 digits");

        $.validator.addMethod('password', function (value, element) {
            var reg1 = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?!.*\s).{8,20}$/;
            return reg1.test(value);
        }, "Password must contain at least one uppercase letter, one lowercase letter, one digit, one special symbol, and length must be between 8 to 20 characters.");

        $.validator.addMethod('notEqual', function (value, element, param) {
            return value !== param;
        }, "New password cannot be same as old password.");

        $('#f1').validate({
            rules: {
                fn: {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    fnregx: true
                },
                ln: {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    fnregx: true
                },
                em: {
                    required: true,
                    email: true,
                },
                ad: {
                    required: true,
                    minlength: 7,
                    maxlength: 100,
                },
                ph: {
                    required: true,
                    fnphone: true
                },
                new_password: {
                    password: true,
                    password: true,
                    notEqual: function () {
                        return $("#new_password").val() !== "<?php echo $password; ?>";
                    } // Check against old password
                },
                confirm_new_password: {
                    password: true,
                    equalTo: "#new_password"
                },
            },
            messages: {
                fn: {
                    required: "First name is required field",
                    minlength: "First name must contain at least 2 letters",
                    maxlength: "First name must contain maximum 30 letters",
                    fnregx: "First name can only contain letters"
                },
                ln: {
                    required: "Last name is required field",
                    minlength: "Last name must contain at least 2 letters",
                    maxlength: "Last name must contain maximum 30 letters",
                    fnregx: "Last name can only contain letters"
                },
                em: {
                    required: "Email is required field",
                    email: "Please enter a valid email address"
                },
                ad: {
                    required: "Address is required field",
                    minlength: "Please enter a valid address",
                    maxlength: "Address length cannot be greater than 100"
                },
                ph: {
                    required: "Mobile number is required field",
                    number: "Please enter a valid mobile number"
                },
                new_password: {
                    required: "Password is required field",
                    password: "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special symbol, and length must be between 8 to 20 characters.",
                    notEqual: "New password cannot be the same as the old password."
                },
                confirm_new_password: {
                    required: "Password is required field",
                    password: "Please enter the same password as above",
                    equalTo: "Please enter the same password as above"
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr('name') == "fn") {
                    $('#fn1_error').html(error);
                }
                if (element.attr('name') == "ln") {
                    $('#ln1_error').html(error);
                }
                if (element.attr('name') == "em") {
                    $('#email_error').html(error);
                }
                if (element.attr('name') == "ad") {
                    $('#address_error').html(error);
                }
                if (element.attr('name') == "ph") {
                    $('#mobile_error').html(error);
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
<script>
    function updateCities() {
        var stateSelect = document.getElementById("inputState");
        var citySelect = document.getElementById("inputDistrict");
        var selectedState = stateSelect.value;
        // Clear existing options
        citySelect.innerHTML = "";
        if (selectedState === "Uttarakhand") {
            var cities = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Mussorie", "Nainital", "Pauri",
                "Pithoragarh", "Rishikesh", "Rudraprayag", "Tehri", "Udham Singh Nagar", "Uttarkashi"
            ];

            for (var i = 0; i < cities.length; i++) {
                var option = document.createElement("option");
                option.text = cities[i];
                option.value = cities[i];
                citySelect.appendChild(option);
            }
        }
        if (selectedState === "Odisha") {
            var cities = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Debagarh", "Dhenkanal",
                "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara",
                "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri",
                "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"
            ];

            for (var i = 0; i < cities.length; i++) {
                var option = document.createElement("option");
                option.text = cities[i];
                option.value = cities[i];
                citySelect.appendChild(option);
            }
        }
        if (selectedState === "Lakshadweep") {

            var cities = ["Lakshadweep"];

            for (var i = 0; i < cities.length; i++) {
                var option = document.createElement("option");
                option.text = cities[i];
                option.value = cities[i];
                citySelect.appendChild(option);
            }
        }
        if (selectedState === "Pondicherry") {
            var cities = ["Karaikal", "Mahe", "Puducherry", "Yanam"];

            for (var i = 0; i < cities.length; i++) {
                var option = document.createElement("option");
                option.text = cities[i];
                option.value = cities[i];
                citySelect.appendChild(option);
            }
        }
    }
</script>
<script src="statecity.js"></script>