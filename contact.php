<?php
include 'header.php';
unset($_SESSION['total_price']);
if (isset($_POST['btn'])) {
    $showAlert = false;
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $insert = "INSERT INTO contact (c_name,c_email,c_phone,c_message) VALUES ('$name','$email','$phone','$message')";
    $res = $con->query($insert);
    if ($res) {
     $showAlert=true;
    }
}
?>
<style>
    <?php include 'style.css' ?>
    .error {
        color: red;
    }

    input[type="number"]::-webkit-inner-spin-button,type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        appearance: none;
        margin: 0;
        /* Optional */
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.js"></script>
    <title>Contact</title>
</head>

<body>

    <div class="contactsent alert alert-success alert-dismissible fade show d-none" role="alert">
        <strong>Message sent!</strong>Our team will shortly get in touch with you
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    if (isset($_POST["btn"])) {

        if ($showAlert) {



            echo "<script>$('.contactsent').removeClass('d-none');</script>";
        }

    }

    ?>
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-sm-12 col-md-12 text-dark">
                <div class="card ">
                    <img class="card-img-top w-100" src="image/p3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <h2 class="card-title text-dark text-capatilize">Contact us</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-5">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-white text-dark">
                    <p class="text-success">Home <span class="text-dark text-uppercase">|Contact us</span></p>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm-12  text-center">
                <img src="image/download.png" alt="">
                <h3 class="text-dark">Leave a Message</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 p-3 bg-white shadow-lg bg-body rounded w-auto">
                <form action="#" method="post" id="f1">
                    <div class="row">
                        <div class="form mb-3 mt-3 col-12 col-md-12">
                            <label for="name" class="text-dark">Your Name</label>
                            <input type="text" class="form-control shadow-lg border-success" id="name" placeholder=""
                                name="fname">
                            <span id="fn1_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-12 col-md-12">
                            <label for="email1" class="text-dark">Your Email</label>
                            <input type="email" class="form-control shadow-lg border-success" id="email1" placeholder=""
                                name="email">
                            <span id="email_error"></span>
                        </div>

                        <div class="form mb-3 mt-3 col-12 col-md-12">
                            <label for="mobile" class="text-dark">Your Number</label>
                            <input type="number" class="form-control shadow-lg border-success" id="mobile"
                                placeholder="" name="phone">
                            <span id="mobile_error"></span>
                        </div>
                        <div class="form mb-3 mt-3 col-12 col-md-12">
                            <label for="message" class="text-dark">Your Message</label> <br>
                            <textarea name="message" id="message" cols="150" rows="6" class="border-success"
                                name="message"></textarea>
                        </div>
                        <div class="form mb-3 mt-3 col-12 col-md-12 ">

                            <button type="submit" class="btn btn-success w-100 shadow border-success text-white"
                                name="btn">Send
                                Message</button>

                        </div>
                    </div>
                    </form>
            </div>
        </div>

        
        <div class="container p-5 my-5 bg-white text-black bg-body w-100 ">
            <div class="col-sm-12 text-center">
                <img src="image/download.png" alt="">
                <h3 class="text-dark text-capitalize">Contact Detail</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, reiciendis.</p>
            </div>
            <div class="container p-5 my-5 bg-white shadow-lg text-black bg-body w-100 ">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-center">
                        <ul class="list-unstyled mb-0 ">
                            <li><i class="fas fa-map-marker-alt fa-2x"></i> <br>
                                <a href="https://maps.app.goo.gl/T4jodxMH8es8N3UH7" target="_newtab"
                                    class="text-decoration-none text-dark">Vrindavan Society Main Rd, Ambedkar Nagar,
                                    Nana Mava, Rajkot, Gujarat 360005</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-center">
                        <ul class="list-unstyled mb-0 ">
                            <li><i class="fas fa-phone  fa-2x "></i> <br>
                                <a href="https://wa.me/+917781827741" target="_newtab"
                                    class="text-decoration-none text-dark">Chat me with on whatsapp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-center">
                        <ul class="list-unstyled mb-0 ">
                            <li><i class="fas fa-envelope fa-2x"></i> <br>
                                <a href="mailto:jaiswalsumit1010@gmail.com?cc=xinghsurendra2@gmail.com" target="_newtab"
                                    class="text-decoration-none text-dark">jaiswalsumit1010@gmail.com</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
<script>
    $(document).ready(function () {
        $.validator.addMethod("fnregx", function (value, element) {
            var regex = /^[a-zA-Z]+$/;
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



            $('#f1').validate({
                rules: {
                    fname: {
                        required: true,
                        minlength: 2,
                        maxlength: 30,
                        fnregx: true
                    },
                    email: {
                        required: true,
                        email: true,
                        email1: true,
                    },
                    phone: {
                        required: true,
                        fnphone: true
                    }


                },
                messages: {
                    fname: {
                        required: "Full name is required field",
                        minlength: "Full name must contain atleast 2 letter ",
                        maxlength: "Full name contain max 30 letters",
                        fnregx: "Full name contains only letter"
                    },

                    email: {
                        required: "Email is required field",
                        email: "Please enter a valid email address",
                        email1: "Please enter a valid email address"
                    },
                    phone: {
                        required: "Mobile number is required field",
                        number: "Please Enter a valid Mobile number"
                    }



                },
                errorPlacement: function (error, element) {
                    if (element.attr('name') == "fname") {
                        $('#fn1_error').html(error);
                    }

                    if (element.attr('name') == "email") {
                        $('#email_error').html(error);
                    }
                    if (element.attr('name') == "phone") {
                        $('#mobile_error').html(error);
                    }


                }
            });
    });
</script>