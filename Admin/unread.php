<?php
include 'header.php';

$sql = "SELECT * FROM contact";
$result = mysqli_query($con, $sql);

if ($result = mysqli_query($con, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
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
                        <h2 class="card-title text-dark text-uppercase">Unread messages</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white text-dark shadow-lg bg-body w-100 my-3 p-3">
        <div class="container bg-white text-dark shadow-lg bg-body rounded w-100 ">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-white text-dark">
                    <p class="text-success">Dashboard <span class="text-dark">| Unread Message</span></p>
                </div>
            </div>
        </div>
        <h3 class="text-uppercase text-center my-5">unread message's</h3>
        <div class="row gap-1">
            <?php
            if ($rowcount > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="container p-3 col-12 col-sm-12 col-md-5 bg-white shadow-lg bg-body rounded text-center ">

                        <h4>
                            <?php echo $row['c_name'] ?>
                        </h4>
                        <p class="p-0 m-0">
                            <?php echo $row['c_message'] ?>
                        </p>
                        <a href="messagedelete.php ?id=<?= $row['message_id'] ?>"
                            class="btn btn-success float-left w-auto rounded my-2"
                            onclick="alert('Do you want to delete this message?')">Delete Message</a>
                            

                            <!-- here -->
                      <a href="mailto:<?php echo $row['c_email'] ?>" target="_blank"
                        class="btn btn-success float-left w-auto rounded my-2">Reply Message</a>


                    </div>
                    <?php
                }
            } else {
                ?>
                <strong>No any message yet</strong>

                <?php
                // Free result set
                mysqli_free_result($result);
            }
            ?>
        </div>
    </div>
    <?php
    include 'footer.php'
        ?>
</body>

</html>