<?php
include 'header.php';

$con = mysqli_connect("localhost", "root", "", "green coffee");

$sql = "SELECT * FROM registration";
$result = mysqli_query($con, $sql);

if ($result = mysqli_query($con, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="html2pdf.bundle.min.js"></script>

    <style>
        .table {
            width: 100%;
            table-layout: auto;
            /* border: 1px solid black; */
        }

        th,
        td {

            white-space: nowrap;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="bg-white shadow-lg mt-3 p-3">
            <h1 class="text-center text-success mb-4">Registered Users</h1>

            <div class="order-list table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-success">First Name</th>
                            <th scope="col" class="text-success">Last Name</th>
                            <th scope="col" class="text-success">User Name</th>
                            <th scope="col" class="text-success">Email</th>
                            <th scope="col" class="text-success">Phone Number</th>
                            <th scope="col" class="text-success">State</th>
                            <th scope="col" class="text-success">City</th>
                            <th scope="col" class="text-success">Address</th>
                            <th scope="col" class="text-success">Gender</th>
                             <th scope="col" class="text-success">User Status</th>
                              <th scope="col" class="text-success">Delete User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($rowcount > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['first_name'] . "</td>";
                                echo "<td>" . $row['last_name'] . "</td>";
                                echo "<td>" . $row['user_name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone_number'] . "</td>";
                                echo "<td>" . $row['state'] . "</td>";
                                echo "<td>" . $row['city'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['gender'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo '<td><a href="deleteuser.php?uname=' . $row['user_name'] . '">' . ' delete user</a></td>';


                                echo "</tr>";
                            }
                        } else {
                            ?>
                            <p>No any registered users</p>

                            <?php
                            // Free result set
                            mysqli_free_result($result);
                        }
                        ?>
                    </tbody>
                </table>

                <a href="index.php">Go Back</a>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
</body>

</html>