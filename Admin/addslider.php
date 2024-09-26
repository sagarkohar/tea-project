<?php
include 'header.php';

if (isset($_POST['btn'])) {
    $showAlert = false;
    $caption1 = mysqli_real_escape_string($con, $_POST['caption1']);
    $caption2 = mysqli_real_escape_string($con, $_POST['caption2']);
    

    if ($_FILES['image']['name'] == "") {
        echo "Please select a file to upload";
    } else {
        // File information
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'webp');

        $filename = $_FILES['image']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

        // Convert the file extension to lowercase
        $file_extension_lowercase = strtolower($file_extension);

        if (!in_array($file_extension_lowercase, $allowed_types)) {
            echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed to upload.');</script>";
        } else {
            // Generate new filename with lowercase extension
            $filename_without_extension = pathinfo($filename, PATHINFO_FILENAME);
            $new_filename = $filename_without_extension . '.' . $file_extension_lowercase;
            $file_path = "../image/" . $new_filename;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $file_path)) {

            } else {
                echo "Error moving uploaded file.";
            }
        }
    }
    $insert = "INSERT INTO slider (image, caption1, caption2)
           VALUES ('$new_filename','$caption1','$caption2')";

    $result = mysqli_query($con, $insert);

    if ($result) {
        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        slider added successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
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
    <title>Add Slider</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js"></script>
</head>

<body>
    <?php
 
    ?>
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-sm-12 col-md-12 text-dark">
                <div class="card ">
                    <img class="card-img-top w-100" src="../image/p3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <h2 class="card-title text-dark text-uppercase">Add Slider</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-3 p-3">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-white text-dark">
                    <p class="text-success">Dashboard <span class="text-dark text-uppercase">|Add Slider</span></p>
                </div>
            </div>
        </div>

        <h3 class="text-uppercase text-center my-5">Add Slider</h3>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="form mb-3 mt-3 col-md-12">
                            <label for="image" class="text-success">Slider Image</label><br>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="form mb-3 mt-3 col-md-12">
                            <label for="message" class="text-success">Caption1</label>
                            <textarea id="message" class="md-textarea form-control border-success" name="caption1"
                                placeholder="Write caption" rows="2" required></textarea>
                        </div>

                        <div class="form mb-3 mt-3 col-md-12">
                            <label for="message" class="text-success">Caption2</label>
                            <textarea id="message" class="md-textarea form-control border-success" name="caption2"
                                placeholder="Write caption" rows="2" required></textarea>
                        </div>
                        <div class="buttons d-flex justify-content-center w-100" style="gap:1.5rem">
                            <div class="log d-flex ">
                                <button type="submit" class="btn btn-success w-auto shadow border-success text-white"
                                    name="btn">
                                    Add Slider</button>
                            </div>
                            <div class="log d-flex">
                                <button type="submit" class="btn btn-success w-auto shadow border-success text-white">
                                    Save draft</button>
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