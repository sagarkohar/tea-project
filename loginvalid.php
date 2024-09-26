<?php
// Database connection
require 'db_connect.php';
if (!$con) {
    die("Error: " . mysqli_connect_error());
}

$login = false;
$inactive = false;
$invalid = false;
$contactValue = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactValue = isset($_POST['contact']) ? $_POST['contact'] : '';
    $contact = strtolower(mysqli_real_escape_string($con, $_POST['contact'])); // Sanitize user input
    $password = mysqli_real_escape_string($con, $_POST['password']); // Sanitize user input

    // Construct SQL queries with sanitized inputs
    $sql1 = "SELECT * FROM registration WHERE (email = '$contact' OR phone_number = '$contact') AND password = '$password'";
    $result1 = mysqli_query($con, $sql1);

    // Check if user exists and status is active
    if (mysqli_num_rows($result1) == 1) {

        $row = mysqli_fetch_assoc($result1);
        
        if ($row['status'] == 'inactive') {
            $inactive = true;
        } else {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_name'] = $row['user_name'];
            header('location:index.php');
            exit();
        }   
    } else {
        $invalid = true;
    }

    $sql2 = "SELECT * FROM adminlogin WHERE (Email = '$contact' OR Phone_number = '$contact') AND password = '$password'";
    $result2 = mysqli_query($con, $sql2);
    if (mysqli_num_rows($result2) == 1) {
        $login = true;
        session_start();
      
        $_SESSION['loggedin'] = true;
        header('location:Admin/index.php');
        exit();
    }
}

// Close database connection
mysqli_close($con);
?>