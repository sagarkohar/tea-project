<?php
require '../db_connect.php';
if (!$con) {
    echo ("Error" . mysqli_connect_error());
}
// $username = $_SESSION['user_name'];
$sql = "SELECT * FROM adminlogin WHERE user_name = '$username' ";
$result = mysqli_query($con, $sql);
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

while ($row = $result->fetch_assoc()) {
    $password = $row['password'];
    $image = $row['image'];
    $state = $row['state'];
    $city = $row['city'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $showAlert = false;
    $first = sanitize_input(strtolower($_POST['fn']));
    $last = sanitize_input(strtolower($_POST['ln']));
    $em = sanitize_input(strtolower($_POST['em']));
    $ph = sanitize_input(strtolower($_POST['ph']));
    $st = sanitize_input($_POST['st']);
    $ci = sanitize_input($_POST['ci']);
    $ad = sanitize_input($_POST['ad']);
    // $newpassword = $_POST['new_password'];
// $cnewpassword = $_POST['confirm_new_password'];
    $ge = sanitize_input(strtolower($_POST['ge']));

    if ($_FILES['image']['name'] == "") {
        $new_filename = $image;
    } else {
        // File information
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'svg');

        $filename = $_FILES['image']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

        // Convert the file extension to lowercase
        $file_extension_lowercase = strtolower($file_extension);

        if (!in_array($file_extension_lowercase, $allowed_types)) {
            echo "
<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed to upload.');</script>";
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

    $update = "UPDATE adminlogin SET first_name='$first', last_name='$last', email='$em', phone_number='$ph',state='$st',
city='$ci', address='$ad', password='$password', gender='$ge', image= '$new_filename' WHERE user_name = '$username'";



    $result = mysqli_query($con, $update);

    if ($result) {
       $showAlert=true;
    } else {
        echo "error" . $con->error;
    }
}

?>