<?php
include 'header.php';


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $qnt = 1;
}
$sql = "SELECT * FROM products WHERE p_id='$product_id'";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $pprice = $row['p_price'];
    $_SESSION['pprice'] = $pprice;
    $stock = $row['stock'];

}


if (isset($_SESSION['quantity'])) {
    $qnt = $_SESSION['quantity'];
    echo $qnt;
}
if (isset($_SESSION['total_price'])) {
    $total_price = $_SESSION['total_price'];
}

if (isset($_SESSION['p_names'])) {
    $p_names = $_SESSION['p_names'];
}

if ($stock == 0 && $stock < $qnt) {
    $_SESSION['outofstock'] = 'One of the item is of stock';
    ?>
    <script>
        window.location.href = 'product.php';
    </script>
    <?php
}

$sql = "SELECT * FROM registration WHERE user_name = '$username'";
$result = mysqli_query($con, $sql);

$sql1 = "SELECT * FROM address WHERE user_name = '$username'";
$result1 = mysqli_query($con, $sql1);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $address = $row['address'];
    }
}

function sanitize_input($data)
{
    // Remove leading and trailing whitespace
    $data = trim($data);
    // Remove backslashes (\)
    $data = stripslashes($data);
    // Convert special characters to HTML entities
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['btn'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $showAlert = false;

        $phone = sanitize_input(strtolower($_POST['phone']));
        $address1 = sanitize_input($_POST['address']);
        $state = sanitize_input($_POST['state']);
        $city = sanitize_input($_POST['city']);


        $query = "INSERT INTO address VALUES('$username','$phone','$state','$city','$address1')";

        $result = mysqli_query($con, $query);


    }
}


?>
<style>
    <?php include 'style.css' ?>
    .container {
        background: transparent;
    }
</style>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
</head>

<body>


    <div class="container p-5 my-5 bg-white text-dark shadow-lg bg-body rounded w-100  ">

        <div class="col-sm-12  text-center">
            <img src="image/download.png" alt="">
            <h3 class="text-dark text-capitalize">checkout</h3>
            <p class="text-success">Enter Address Details: </p>
        </div>

        <div class="row justify-content-center">
            
                <div class="form-control shadow-lg border-success">

                    <div class="form-check">
                        <input class=" form-check-input shadow border-success" type="radio" name="address" id="add"
                            value="<?php echo $address ?>" required>
                        <label class="form-check-label" for="add">
                            <?php echo $address ?><br>
                        </label> <br>

                        <?php
                        if ($result1) {
                            while ($row = $result1->fetch_assoc()) {
                                ?>
                                <input class=" form-check-input shadow border-success" type="radio" name="address" id="add"
                                    value="<?php echo $row['address'] ?>" required>
                                <label class="form-check-label" for="add">
                                    <?php echo $row['address'] ?><br>
                                </label> <br>

                                <?php
                            }
                        }
                        ?>


                        <?php

                        ?><br>
                        <button name="add" id="addButton"
                            class="btn btn-success shadow border-success text-white mt-3">Add
                            new address</button>

                    </div>


                </div>
                <button type="submit"
                    class="btn btn-success  shadow border-success text-white mt-3 col-sm-6 col-md-4 col-lg-2"
                    id="payment">Proceed to
                    payment</button>
                <div class="col-sm-3 col-md-6 p-3 bg-white shadow-lg bg-body rounded w-auto mt-5" id="showadd"
                    style="display:none;">
                    <form action="" method="post" id="f1">
                        <div class="row">


                            <div class="form mb-3 mt-3 col-md-6">
                                <label for="phone">Phone number</label>
                                <input type="number" class="form-control shadow border-success" id="phone" name="phone"
                                    placeholder="Enter Phone Number" min="1">

                            </div>
                            <div class="form mb-3 mt-3 col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control shadow border-success" id="address"
                                    name="address" placeholder="Enter address">
                            </div>
                            <div class="form mb-3 mt-3 col-md-6">
                                <label for="state" class="form-label">Select your State :</label>
                                <input class="form-control shadow border-success" list="states" name="state" id="state"
                                    name="state" placeholder="Enter your State Name:">
                                <datalist id="states" name="state">
                                    <option value="Bihar">
                                    <option value="Uttar Pradesh(UP)">
                                    <option value="Rajasthan">
                                    <option value="Gujarat">
                                    <option value="Madhya Pradesh(MP)">
                                </datalist>
                            </div>
                            <div class="form mb-3 mt-3 col-md-6">
                                <label for="city" class="form-label">City :</label>
                                <input class="form-control shadow border-success" list="cities" name="city" id="city"
                                    autocomplete="off" placeholder="Enter your City Name:">

                                <datalist id="cities" name="city">
                                    <option value="New Delhi">
                                    <option value="Rajkot">
                                    <option value="Hyderabad">
                                    <option value="Jaipur">
                                    <option value="Gorakhpur">
                                    <option value="Darbhanga">
                                </datalist>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-12 d-flex justify-content-center gap-2">
                                    <button class="btn btn-success  shadow border-success text-white" name="btn">Add
                                        Address</button>
                   

                    <button type="submit" class="btn btn-success  shadow border-success text-white" id="payment"
                        name="payment">Proceed
                        to
                        payment</button>
                </div>
            </form>
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    <?php
    include 'footer.php'
        ?>

    <?php

    if (isset($_POST['payment'])) {
        ?>
        <script>
            alert("Address");
        </script>
        <?php
    }
  

    if (isset($_SESSION['total_price'])) {
        ?>
        <script>
            var total_price = <?php echo $_SESSION['total_price']; ?>;
            // Now you can use total_price in your JavaScript code
        </script>
        <?php
    } else {
        $select = "SELECT p_price FROM products WHERE p_id='$product_id'";
        $result2 = $con->query($select);
        while ($row = $result2->fetch_assoc()) {
            ?>
            <script>
                var total_price = <?php echo $row['p_price']; ?>;
                // Now you can use total_price in your JavaScript code
            </script>
            <?php
            $_SESSION['total_price'] = $row['p_price']; // Storing total_price in session for future use
        }
    }

    ?>
</body>

</html>

<script>
    $(document).ready(function () {
        $("#addButton").click(function () {
            $("#showadd").show();
            $("#payment").hide();
        });
    });
</script>

<script src="jquery-3.7.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "rzp_test_AsAFZOKifG0yP1", // Enter the Key ID generated from the Dashboard
        "amount": total_price * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise

        "name": "Green Tea", //your business name
        "description": "Test Transaction",
        "image": "image/favi.png",

        "callback_url": "http://localhost:90/Green Coffee/addorder.php?id=<?php echo $product_id ?>",

        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('payment').onclick = function (e) {
    
        rzp1.open();
        e.preventDefault();
    }
</script>