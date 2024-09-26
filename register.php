<?php

include 'header.php';
require 'registerget.php';

echo "<script> var usernames = [";
for ($i = 0; $i < $rowcount; $i++) {
    echo "'" . $usernames[$i] . "', ";
}

echo "]; </script>";
echo "<script> var email = [";
for ($i = 0; $i < $rowcount; $i++) {
    echo "'" . $email[$i] . "', ";
}
echo "]; </script>";

?>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.js"></script>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registartion</title>
    <link rel="stylesheet" href="bootstrap.min.css">

    <style>
        .error {
            color: red;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
            /* Optional */
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["btn"]) && isset($_FILES["image"])) {

        if ($showAlert) {

            echo '<div class="alert alert-success alert-dismissable fade show" role="alert">
        <strong>Success</strong>Your account is created and you can login
        <button type="button"class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
        }

    }
    ?>

    <div class="container p-5 my-5 bg-white text-dark shadow-lg bg-body rounded w-100  ">
        <div class="col-sm-12  text-center">
            <img src="image/download.png" alt="">
            <h3 class="text-dark text-capitalize">Register Here</h3>
            <p class="text-success">Register your account to become the part of our family</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-3 col-md-6 p-3 bg-white shadow-lg bg-body rounded w-auto">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="f1"
                    autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="fname" class="text-dark">First Name</label>
                            <input type="text" class="form-control shadow border-success" id="fname" placeholder=""
                                name="first_name">
                            <span id="fn1_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="lname" class="text-dark">Last Name</label>
                            <input type="text" class="form-control shadow border-success" id="lname" placeholder=""
                                name="last_name">
                            <span id="ln1_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="un" class="text-dark">User Name</label>
                            <input type="text" class="form-control shadow border-success" id="un" placeholder=""
                                name="uname">
                            <small id="emailHelp" class="form-text text-muted">Note:Username once sent cannot be
                                changed</small> <br>
                            <span id="uname_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="email1" class="text-dark">Email</label>
                            <input type="email" class="form-control shadow border-success" id="email1" placeholder=""
                                name="email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small><br>
                            <span id="email_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="mobile1" class="text-dark">Phone Number</label>
                            <input type="number" class="form-control shadow border-success" id="mobile1" placeholder=""
                                name="phone">
                            <span id="mobile_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="inputState" class="text-dark" name="state">Select Your State:</label>

                            <select class="form-control shadow border-success bottom-select" id="inputState"
                                name="state" onchange="updateCities()">
                                <option value="SelectState">Select State</option>
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
                                <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Pondicherry">Pondicherry</option>
                            </select>
                            <span id="state_error"></span>
                        </div>

                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="inputDistrict" class="text-dark">Select Your City:</label>

                            <select class="form-control shadow border-success" id="inputDistrict" name="city">
                                <option value="">-- select one -- </option>
                            </select>
                            <span id="state_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="address1" class="text-dark">Address</label><br>
                            <textarea name="address" id="address1" cols="70" rows="2"
                                class="form-control shadow border-success"></textarea>
                            <span id="address_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="pwd1" class="text-dark">Password</label>
                            <input type="password" class="form-control shadow border-success" id="pwd1" placeholder=""
                                name="password">
                            <span id="pwd_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-md-6">
                            <label for="repwd1" class="text-dark">Confirm Password</label>
                            <input type="password" class="form-control shadow border-success" id="repwd1" placeholder=""
                                name="cpassword">
                            <span id="repwd_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-12 col-md-12  text-dark">
                            <div class="form-control shadow-lg border-success">
                                Gender <br>
                                <div class="form-check form-check-inline  ">
                                    <input class="form-check-input shadow border-success" type="radio" name="gender"
                                        id="Male" value="Male">
                                    <label class="form-check-label" for="Male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow border-success" type="radio" name="gender"
                                        id="Female" value="Female">
                                    <label class="form-check-label" for="Female">Female</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow border-success" type="radio" name="gender"
                                        id="no" value="Prefer not to say">
                                    <label class="form-check-label" for="no">Prefer not to say</label>
                                </div>

                            </div>
                            <span id="gender_error"></span>
                            <div class="form mb-3 mt-3 col-md-12">
                                <label class="form-check-label" for="no">Select Your Profile Picture:</label><br>
                                <input type="file" class="form-control shadow border-success" id="image" placeholder=""
                                    name="image">
                            </div>

                        </div>
                    </div>
                    <div class="reg d-flex justify-content-center my-5">
                        <br>
                        <button type="submit" class="btn btn-success w-25 shadow border-success text-white"
                            name="registerBtn">Register</button>
                    </div>
                    <div class="reg text-center my-3">
                        <p class="text-success">Already have an account?<a href="login.php">Login</a></p>
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
<script>
    $(document).ready(function () {

        $.validator.addMethod("fnregx", function (value, element) {
            var regex = /^[a-z A-Z]+$/;
            return regex.test(value);
        }),


            $.validator.addMethod('fnphone', function (value, element) {
                var reg = /^[0-9]{10}$/;
                return reg.test(value);
            }, "Number must contain at least 10 digit and cannot have more than 10 digits"),

            $.validator.addMethod('email1', function (value, element) {
                                 var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


                 return pattern.test(value);
            }, "Please enter a valid email address"),

            $.validator.addMethod('password', function (value, element) {
                var reg1 = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?!.*[/s]).{8,20}$/;
                return reg1.test(value);
            },),

            $.validator.addMethod("equalTo", function (value, element) {
                value = value.toLowerCase(); // Convert entered email to lowercase for case-insensitive comparison
                for (var i = 0; i < usernames.length; i++) {
                    if (value === usernames[i]) {
                        return false; // Return true if entered email matches any email in the array
                    }
                }
                return true; // Return false if entered email does not match any email in the array

            }, "Username already exists");
        $.validator.addMethod("equalToEmail", function (value, element) {
            value = value.toLowerCase(); // Convert entered email to lowercase for case-insensitive comparison
            for (var i = 0; i < email.length; i++) {
                if (value === email[i].toLowerCase()) {
                    return false; // Return true if entered email matches any email in the array
                }
            }
            return true; // Return false if entered email does not match any email in the array
        }, "Email addresses do not match");

        $('#f1').validate({
            rules: {

                first_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    fnregx: true
                },
                last_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    fnregx: true
                },
                uname: {
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                    equalTo: true,

                },
                email: {
                    required: true,
                    email: true,
                    equalToEmail: true,
                    email1: true,

                },
                address: {
                    required: true,
                    minlength: 7,
                    maxlength: 100,

                },
                phone: {
                    required: true,
                    fnphone: true
                },

                password: {
                    required: true,
                    password: true
                },
                cpassword: {
                    required: true,
                    password: true,
                    equalTo: "#pwd1"
                },
                gender: {
                    required: true,
                },
            },
            messages: {
                first_name: {
                    required: "First name is required field",
                    minlength: "First name must contain atleast 2 letter ",
                    maxlength: "First name contain max 30 letters",
                    fnregx: "First name contains only letter"
                },
                last_name: {
                    required: "Last name is required field",
                    minlength: "Last name must contain atleast 2 letter ",
                    maxlength: "Last name contain max 30 letters",
                    fnregx: "Last name contains only letter"
                },
                uname: {
                    required: "Username is required field",
                    minlength: "Username must contain atleast 2 letter ",
                    maxlength: "Username contain max 30 letters",
                    fnregx: "Username contains only letter",
                    equalTo: "username already exists",
                },
                email: {
                    required: "Email is required field",
                    email: "Please Enter a valid email address",
                    equalToEmail: "Account already exists with this email",
                    email1: "Please enter a valid email address",
                },
                address: {
                    required: "Address is required field",
                    minlength: "Please enter a valid address ",
                    maxlength: "Adress length cannot be greater than 100"
                },
                phone: {
                    required: "Mobile number is required field",
                    number: "Please Enter a valid Mobile number"
                },

                password: {
                    required: "Password is required field",
                    password: "Password must contain at least one uppercase letter, one lowercase letter, one digit and one special symbol and length must be  between 8 to 20 characters."
                },
                cpassword: {
                    required: "Password is required field",
                    password: "Please enter the same password as above",
                    equalTo: "Please enter the same password as above"
                },
                gender: {
                    required: "Select your gender: ",
                },


            },
            errorPlacement: function (error, element) {
                if (element.attr('name') == "first_name") {
                    $('#fn1_error').html(error);
                }
                if (element.attr('name') == "last_name") {
                    $('#ln1_error').html(error);
                }
                if (element.attr('name') == "uname") {
                    $('#uname_error').html(error);
                }
                if (element.attr('name') == "email") {
                    $('#email_error').html(error);
                }
                if (element.attr('name') == "address") {
                    $('#address_error').html(error);
                }
                if (element.attr('name') == "phone") {
                    $('#mobile_error').html(error);
                }


                if (element.attr('name') == "password") {
                    $('#pwd_error').html(error);
                }
                if (element.attr('name') == "cpassword") {
                    $('#repwd_error').html(error);
                }
                if (element.attr('name') == "gender") {
                    $('#gender_error').html(error);
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
        // Add conditions for other states here if needed
    }
</script>
