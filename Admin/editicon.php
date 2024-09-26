<?php
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM brand_icon WHERE brand_id = $id";
    $result = mysqli_query($con, $sql);
    while ($row = $result->fetch_assoc()) {
        $image = $row['brand'];
        $status = $row['status'];
    }
}
if (isset($_POST['btn'])) {
    $showAlert = false;
    $status = $_POST['status'];
 
    if ($_FILES['image']['name'] == "") {
        $new_filename = $image;
    } else {
        // File information
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'webp');

        $filename = $_FILES['image']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

        // Convert the file extension to lowercase
        $file_extension_lowercase = strtolower($file_extension);

        if (!in_array($file_extension_lowercase, $allowed_types)) {
            echo "
<script>alert('Only JPG, JPEG, PNG, webp,and GIF files are allowed to upload.');</script>";
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

    $update = "UPDATE brand_icon SET brand= '$new_filename',status='$status' WHERE brand_id = '$id'";

    $result = mysqli_query($con, $update);

    if ($result) {
        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        Icon updated successfully
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
    <title>Green Tea</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js"></script>
</head>

<body>
   
  
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-sm-12 col-md-12 text-dark">
                <div class="card ">
                    <img class="card-img-top w-100" src="../image/p3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                        <h2 class="card-title text-dark text-uppercase">Edit Brand Icon</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-3">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-white text-dark">
                    <p class="text-success">Dashboard <span class="text-dark text-uppercase">|Edit Brand Icon</span></p>
                </div>
            </div>
        </div>

        <h3 class="text-uppercase text-center my-5">Edit Brand Icon</h3>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form mb-3 mt-3 col-md-12 col-12">
                            <label for="status" class="text-dark">Slider Status</label>
                            <select class="form-select form-control shadow-lg border-success" id="status" name="status">
                                <option>Active</option>
                                <option>Disabled</option>
                            </select>
                        </div>

                    </div>
                    <div class="form mb-3 mt-3 col-md-12">
                        <label for="image" class="text-success">Brand Icon</label><br>
                        <input type="file" class="form-control shadow-lg border-success" name="image" id="image"
                            value="">
                    </div>

                 

                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 d-flex justify-content-center gap-2">
                            <button type="submit" class="btn btn-success rounded" name="btn">Update Icon</button>

                            <a href="brandicons.php" class="btn btn-success rounded  ">Go Back</a>
                         
                            <a href="delete.php?brand_id=<?php echo $id?>" class="btn btn-success rounded" name="btn"
                               >Delete</a>
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
