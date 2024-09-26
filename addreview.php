<?php
include 'header.php';
$select = "SELECT * FROM registration WHERE user_name='$username'";
$result=$con->query($select);
while ($row = $result->fetch_assoc()) {
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $image = $row['image'];
}
$fullname = $firstname . " " . $lastname;
 $added = false;
if (isset($_POST['btn'])) {

    $description = mysqli_real_escape_string($con, $_POST['reviewdescription']);
    $profession = mysqli_real_escape_string($con, $_POST['profession']);
    

    $insert = "INSERT INTO review (image, review_description, name,profession)
           VALUES ('$image','$description','$fullname','$profession')";

    $result = mysqli_query($con, $insert);

    if ($result) {
        $added = true;
    } else {
        echo "error" . $con->error;
    }
}

?>
<style>
    <?php include 'style.css' ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js"></script>
</head>

<body>

<div class="added alert alert-danger alert-dismissible fade show d-none" role="alert">
   Review added successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    if ($added) {

        echo "<script>$('.added').removeClass('d-none');</script>";

    }
    ?>
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-sm-12 col-md-12 text-dark">
                <div class="card ">
                    <img class="card-img-top w-100" src="image/p3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <h2 class="card-title text-dark text-uppercase">Add Review</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-3 p-3">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
           
        </div>

        <h3 class="text-uppercase text-center my-5">Add your Review</h3>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="form mb-3 mt-3 col-md-12">
                            <label for="message" class="text-success">Review Description</label>
                            <textarea id="message" class="md-textarea form-control border-success" name="reviewdescription"
                                placeholder="Write caption" rows="4" required></textarea>
                        </div>

                        <div class="form mb-3 mt-3 col-md-12">
                            <label for="profession" class="text-success">Your Profession</label>
                            <input type="text" name="profession" class="form-control border-success" id="profession">
                        </div>
                        <div class="buttons d-flex justify-content-center w-100">
                            <div class="log d-flex ">
                                <button type="submit" class="btn btn-success w-auto shadow border-success text-white"
                                    name="btn">
                                    Add Review</button>
                            </div>
                           
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>
    <?php
    include 'footer.php'
        ?>
</body>

</html>