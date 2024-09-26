<?php
include 'header.php';

if (isset ($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE p_id = $product_id";
    $result = mysqli_query($con, $sql);
    while ($row = $result->fetch_assoc()) {
        $id=$row['p_id'];
        $name = $row['p_name'];
        $status = $row['p_status'];
        $price = $row['p_price'];
        $image = $row['p_image'];
        $detail = $row['p_details'];
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
    <title>Product Detaills</title>
</head>

<body>
    <div class="container bg-white text-white shadow-lg bg-body rounded w-100 my-2">
        <div class="row my-2">
            <div class="col-sm-12 col-md-12 bg-white text-white ">
                <p class="text-success my-2"> <a href="index.php" class="text-success text-uppercase"
                        style="text-decoration:none">Dashboard
                    </a><span class="text-dark">| Product deatil</span></p>
            </div>
        </div>
    </div>
    <div class="container-fluid my-1">
        <div class="container bg-white text-white shadow-lg bg-body rounded w-100">
            <div class="row">
                <div class="col-sm-12 p-3 bg-white text-dark d-flex">
                    <div class="card shadow-lg" style="width:100%">
                        <div class="content d-flex justify-content-between">
                            <a href="#" class="btn btn-success float-left w-auto rounded m-2">
                                <?php echo $status ?>
                            </a>
                            <h4 class="text-success">$
                                <?php echo $price ?>/-
                            </h4>
                        </div>
                        <div class="text-center">
                            <img class="card-img-top w-50 text-center" src="<?php echo "../image/".$image ?>" alt="Card image">
                        </div>
                        <div class="card-body ">
                            <div class="content my-5">

                                <h3 class="text-center text-success">
                                    <?php echo $name ?>
                                </h3>
                                <p>
                                    <?php echo $detail ?>
                                </p>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 d-flex justify-content-center gap-2">
                                        <a href="editproducts.php ?id=<?= $id ?>" class="btn btn-success rounded">Edit</a>
                                        <a href="view.php" onclick="alert('Are you sure you want to delete?')"
                                            class="btn btn-success rounded">Delete</a>
                                        <a href="view.php" class="btn btn-success rounded">Go Back</a>
                                    </div>
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
</body>

</html>