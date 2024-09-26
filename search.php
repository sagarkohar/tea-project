<?php


// Create connection
require 'db_connect.php';

// Check connection

// Build the Search Query
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT p_name ,p_id FROM products WHERE p_name LIKE '%$search%'";
} else {

}

// Execute the Query
$result = $con->query($sql);

// Fetch and Display Results
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $p_id = $row["p_id"];
        $p_name = $row["p_name"];
        echo '<div><a href="productdetails.php?id=' . $p_id . '" style="text-decoration: none;">' . $p_name . '</a></div>';
    }


} else {
    echo "<div>No results found</div>";
}

// Close the database connection
$con->close();
?>