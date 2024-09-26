<?php
include 'header.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
}

if (isset($_SESSION['quantity'])) {
    $qnt = $_SESSION['quantity'];
}
if (isset($_SESSION['total_price'])) {
    $total_price = $_SESSION['total_price'];
} else {
    $select = "SELECT p_price FROM products WHERE p_id='$product_id'";
    $result2 = $con->query($select);
    while ($row = $result2->fetch_assoc()) {
        $total_price = $row['p_price'];
    }
}

?>

<?php

if (isset($_SESSION['p_names'])) {
    $p_names = $_SESSION['p_names'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap CSS -->

    <!-- Font Awesome CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .payment-option {

            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* transition: color 0.3s ease; */
            z-index: 2;
        }

        .payment-option:hover {
            background-color: #42bf85;
            /* transform: scale(1.05); */
        }



        .payment-option:hover::before {
            width: 100%;
        }

        .payment-option img {
            max-width: 40px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .payment-option span {
            vertical-align: middle;
        }

        .card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .total-amount {
            font-weight: bold;
            font-size: 24px;
            margin-top: 30px;
            margin-bottom: 20px;
            color: #333;
        }

        input[type=radio],
        label {
            cursor: pointer;
        }

        .error,
        #radioerror {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container bg-white p-5 my-5  text-dark rounded w-100  ">
        <div class="col-sm-12  text-center">
            <img src="image/download.png" alt="">
            <h3 class="text-dark text-capitalize">Payment</h3>
            <p class="text-success">Enter Address Details: </p>
        </div>

        <div class="row justify-content-center">

            <form action="addorder.php ?id=<?= $product_id ?>" method="post" id="paymentForm">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div class="payment-option" data-toggle="collapse" data-target="#creditCardDetails">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <input type="radio" name="paymentMethod" id="creditCardRadio" class="mr-3"
                                            value="creditcard">
                                        <img src="image/visa.png" alt="Credit Card Logo">
                                        <label for="creditCardRadio">Credit Card</label>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse payment-details mt-3" id="creditCardDetails">
                                <!-- Credit Card details fields -->
                                <div class="mt-3">
                                    <input type="text" class="form-control" placeholder="Card Number"
                                        id="credit-card-number" name="creditcardnumber" maxlength="20">
                                    <span id="creditnumbererror"></span>
                                </div>
                                <div class="mt-3">
                                    Expiry Date:
                                    <input type="date" class="form-control" placeholder="Expiry Date" name="expirydate">
                                    <span id="expiryerror"></span>
                                </div>
                                <div class="mt-3">
                                    <input type="text" class="form-control" placeholder="CVV" id="cvv" maxlength="3"
                                        name="cvv">
                                    <span id="cvverror"></span>
                                </div>
                            </div>

                            <!-- UPI -->
                            <div class="payment-option mt-3" data-toggle="collapse" data-target="#upiDetails">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <input type="radio" name="paymentMethod" id="upiRadio" class="mr-3" value="upi">
                                        <img src="image/bhim-upi.png" alt="UPI Logo">
                                        <label for="upiRadio">UPI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse payment-details mt-3" id="upiDetails">
                                <!-- UPI details fields -->
                                <div class="mt-3">
                                    <input type="text" class="form-control" placeholder="UPI ID" name="upiid">
                                    <span id="upierror"></span>
                                </div>
                            </div>

                            <!-- GPAY -->
                            <div class="payment-option mt-3" data-toggle="collapse" data-target="#gpayDetails">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <input type="radio" name="paymentMethod" id="gpayRadio" class="mr-3"
                                            value="gpay">
                                        <img src="image/google-pay.png" alt="GPAY Logo">
                                        <label for="gpayRadio">Google Pay</label>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse payment-details mt-3" id="gpayDetails">
                                <!-- GPAY details fields -->
                                <div class="mt-3">
                                    <input type="text" class="form-control" placeholder="GPAY ID" name="gpayid">
                                    <span id="gpayerror"></span>
                                </div>
                            </div>
                            <!-- Paytm -->
                            <div class="payment-option mt-3" data-toggle="collapse" data-target="#paytmDetails">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <input type="radio" name="paymentMethod" id="paytmRadio" class="mr-3"
                                            value="paytm">
                                        <img src="image/paytm.png" alt="Paytm Logo">
                                        <label for="paytmRadio">Paytm</label>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse payment-details mt-3" id="paytmDetails">
                                <!-- Paytm details fields -->
                                <div class="mt-3">
                                    <input type="text" class="form-control" placeholder="Paytm Number" name="paytmid">
                                    <span id="paytmerror"></span>
                                </div>
                            </div>

                            <!-- Cash on Delivery -->
                            <div class="payment-option mt-3" data-toggle="collapse"
                                data-target="#cashOnDeliveryDetails">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <input type="radio" name="paymentMethod" id="codRadio" class="mr-3"
                                            value="Cash On Delivery">
                                        <i class="fas fa-money-bill-alt mr-2"></i>
                                        <label for="codRadio">Cash on Delivery</label>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse payment-details mt-3" id="cashOnDeliveryDetails">
                                <!-- Cash on Delivery details fields (if any) -->
                                <div class="mt-3">
                                    <p>Payment will be collected upon delivery.</p>
                                </div>
                            </div>
                            <!-- Total bill amount -->
                            <div class="total-amount">
                                Total Amount: <?php echo $total_price ?>


                            </div>
                            <span id="radioerror"></span>
                            <!-- Proceed to payment button -->
                            <div class="text-center mt-4">

                                <button type="submit" class="btn btn-lg bg-success paynow-button" id="payNowBtn"
                                    name="btn">
                                    Pay ₹<?php echo $total_price ?>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>

</body>

</html>

<?php
include 'footer.php';
?>

</body>

</html>
<!-- Bootstrap JS -->
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.js"></script>
<script>

    $(document).ready(function () {
        $("#paymentForm").submit(function (event) {
            // Check if any radio button is selected
            if (!$(".payment-option input[type='radio']").is(":checked")) {
                // Prevent form submission
                event.preventDefault();
                // Display error message
                $("#radioerror").html("Please select a payment method.");
            }
        });
        $.validator.addMethod("upi", function (value, element) {
            var upi = /^\d{10}@upi$/;// UPI ID regex pattern
            return upi.test(value);
        }),

            $.validator.addMethod("date", function (value, element) {
                var datePattern = /^(?:(?:19|20)\d\d)-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/;
                return date.test(value);
            }),
            $.validator.addMethod("gpay", function (value, element) {
                var gpay = /^\d{10}@(okaxis|okhdfcbank|okicici|oksbi)$/; // Gpay ID regex pattern
                return gpay.test(value);
            }),
            $.validator.addMethod("paytm", function (value, element) {
                var paytm = /^\d{10}@paytm$/;// UPI ID regex pattern
                return paytm.test(value);
            }),
            $('#paymentForm').validate({
                // Common validation rules for all payment methods
                rules: {
                    creditcardnumber: {
                        required: true,
                        minlength: 19
                    },
                    expirydate: {
                        required: true,

                    },
                    cvv: {
                        required: true,
                        minlength: 3
                    },
                    upiid: {
                        required: true,
                        upi: true,
                    },
                    gpayid: {
                        required: true,
                        gpay: true,
                    },
                    paytmid: {
                        required: true,
                        paytm: true,
                    },

                },
                messages: {
                    creditcardnumber: {
                        required: "Credit card number is required field",
                        minlength: "Credit Card number must have 16 digits"
                    },
                    expirydate: {
                        required: "Expiry date is required field",

                    },
                    cvv: {
                        required: "CVV is required field",
                        minlength: "CVV must contain at least 3 digits"
                    },
                    upiid: {
                        required: "UPI id is required field",
                        upi: "Please enter a valid UPI ID in the format 'XXXXXXXXXX@upi",
                    },
                    gpayid: {
                        required: "Gpay id is required field",
                        gpay: "Please enter a valid GPay ID in the format 'XXXXXXXXXX@okaxis' or 'XXXXXXXXXX@okhdfcbank' or 'XXXXXXXXXX@okicici' or 'XXXXXXXXXX@oksbi'.",
                    },
                    paytmid: {
                        required: "Paytm id is required field",
                        paytm: "Please enter a valid Paytm Id in the format 'XXXXXXXXXX@upi",
                    },

                },
                errorPlacement: function (error, element) {
                    if (element.attr('name') == "creditcardnumber") {
                        $('#creditnumbererror').html(error);
                    }
                    if (element.attr('name') == "expirydate") {
                        $('#expiryerror').html(error);
                    }
                    if (element.attr('name') == "cvv") {
                        $('#cvverror').html(error);
                    }
                    if (element.attr('name') == "upiid") {
                        $('#upierror').html(error);
                    }
                    if (element.attr('name') == "gpayid") {
                        $('#gpayerror').html(error);
                    }
                    if (element.attr('name') == "paytmid") {
                        $('#paytmerror').html(error);
                    }

                }
            });

        $("#creditCardRadio").click(function () {
            $("#radioerror").html("");
            $("#creditCardDetails").show();
            $("#upiDetails").hide();
            // $("input[type='radio'][name=]:checked", '#myForm').val();
            $("#gpayDetails").hide();
            $("#paytmDetails").hide();
            $("#cashOnDeliveryDetails").hide();

        });
    });

    $("#upiRadio").click(function () {
        $("#radioerror").html("");
        $("#upiDetails").show();
        $("#gpayDetails").hide();
        $("#creditCardDetails").hide();
        $("#paytmDetails").hide();
        $("#cashOnDeliveryDetails").hide();
        $('#paymentForm').validate({
            rules: {
                upiid: {
                    required: true,
                    minlength: 13,
                },

            },
            messages: {
                upiid: {
                    required: "UPI id is required field",
                    minlength: "UPI id must contains at least 13 letters ",
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr('name') == "upiid") {
                    $('#upierror').html(error);
                }
            }
        });
    });

    $("#gpayRadio").click(function () {
        $("#radioerror").html("");
        $("#gpayDetails").show();
        $("#upiDetails").hide();
        $("#creditCardDetails").hide();
        $("#paytmDetails").hide();
        $("#cashOnDeliveryDetails").hide();
    });

    $(document).ready(function () {
        $("#paytmRadio").click(function () {
            $("#paytmDetails").show();
            $("#gpayDetails").hide();
            $("#creditCardDetails").hide();
            $("#upiDetails").hide();
            $("#cashOnDeliveryDetails").hide();
        });
    });


    $("#codRadio").click(function () {
        $("#radioerror").html("");
        $("#cashOnDeliveryDetails").show();
        $("#paytmDetails").hide();
        $("#gpayDetails").hide();
        $("#creditCardDetails").hide();
        $("#upiDetails").hide();
    });

    document.getElementById('credit-card-number').addEventListener('input', function (e) {
        var input = e.target.value.replace(/\D/g, '').substring(0, 16);
        var cardNumber = input.match(/.{1,4}/g);
        if (cardNumber) {
            e.target.value = cardNumber.join(' ');
        } else {
            e.target.value = '';
        }
    });
    document.getElementById('cvv').addEventListener('input', function (e) {
        var input = e.target.value.replace(/\D/g, '').substring(0, 16);
        var cardCvv = input.match(/.{1,4}/g);
        if (cardCvv) {
            // e.target.value = cardCvv.join(' ');
        } else {
            e.target.value = '';
        }
    });
</script>

