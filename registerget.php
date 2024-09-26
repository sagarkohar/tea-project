<?php
$con = mysqli_connect("localhost", "root", "", "green coffee");
require 'db_connect.php';

$sql = "SELECT * from registration";
$result = $con->query($sql);
$emails = array();
$usernames=array();
$rowcount = 0;
if ($result->num_rows > 0) {
    // Fetch each email and store in the variable
    while ($row = $result->fetch_assoc()) {
        $email[$rowcount] = $row["email"];
        $usernames[$rowcount] = $row["user_name"];
        $rowcount++;
    }
} else {
    echo "0 results";
}
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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $showAlert = false;
    $error = false;
    $first = sanitize_input(strtolower($_POST['first_name']));
    $last = sanitize_input(strtolower($_POST['last_name']));
    $username = sanitize_input(strtolower($_POST['uname']));
    $email = sanitize_input(strtolower($_POST['email']));
    $phone = sanitize_input(strtolower($_POST['phone']));
    $state = sanitize_input($_POST['state']);
    $city = sanitize_input($_POST['city']);
    $address = sanitize_input($_POST['address']);
    $password = sanitize_input($_POST['password']);
   
    $cpassword = sanitize_input($_POST['cpassword']);
    $gender = sanitize_input(strtolower($_POST['gender']));

    if ($_FILES['image']['name'] == "") {
        $new_filename= 'user-solid.svg';
    } else {
        // File information
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'svg');

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
            $file_path = "image/" . $new_filename;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $file_path)) {

            } else {
                echo "Error moving uploaded file.";
            }
        }
    }
    $query = "INSERT INTO registration (first_name, last_name, user_name, email, phone_number, state, city, address, password, gender, image,create_time) VALUES ('$first', '$last', '$username', '$email', '$phone', '$state', '$city', '$address', '$password', '$gender', '$new_filename',CURRENT_TIMESTAMP())";

    $result = mysqli_query($con, $query);

    if ($result) {
        $showAlert = true;
        ?>
        <script>
            window.location.href = 'PHP Mail/send_activation.php?email=<?php echo $email; ?>';
        </script>
        <?php
    } else {
        $error = true;

    }
}
?>