<?php
include 'header.php';

$sql = "SELECT * FROM slider";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="html2pdf.bundle.min.js"></script>

    <style>
        .table {
            width: 100%;
            table-layout: auto;
        }

        .order-list table td {
            white-space: nowrap;
        }

        .order-list table th {
            white-space: nowrap;
        }

        .order-list table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .shop {
            aspect-ratio: 1/1;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="bg-white shadow-lg mt-3 p-3">
            <h1 class="text-center text-success mb-4">ALL SLIDERS</h1>

            <div class="order-list table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-success">Slider Image</th>
                            <th scope="col" class="text-success">Slider Caption1</th>
                            <th scope="col" class="text-success">Slider Caption2</th>
                            <th scope="col" class="text-success">Slider Status:</th>
                            <th scope="col" class="text-success">Edit Slider</th>
                            <th scope="col" class="text-success">Delete Slider</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><img src="<?php echo "../image/" . $row['image']; ?>" class=" image-fluid" alt=""></td>
                                <td>
                                    <?php echo $row['caption1']; ?>
                                </td>
                                <td>
                                    <?php echo $row['caption2']; ?>
                                </td>

                                <?php
                                if ($row['status'] == 'Active') {
                                    ?>
                                    <td><span class="badge bg-success">
                                            <?php echo $row['status']; ?>
                                        </span></td>
                                    <?php
                                } else {
                                    ?>
                                    <td><span class="badge bg-danger">
                                            <?php echo $row['status']; ?>
                                        </span></td>
                                    <?php
                                }
                                ?>
                                <td><a href="editslider.php ?id=<?= $row['slider_id'] ?>">Edit Slider</a></td>

                                <td><a href="delete.php ?slider_id=<?= $row['slider_id'] ?>"
                                        onclick="alert('Are you sure,you want to delete this slider?')">Delete Slider</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="addslider.php">Add Slider</a>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

</body>

</html>