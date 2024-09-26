<?php
require '../db_connect.php';


if (isset($_GET['uname'])) {
    # code...
    $uname=$_GET['uname'];
}
$delete="DELETE FROM registration WHERE user_name= '$uname'";
$result=$con->query($delete);
if($result){
    echo "<script>alert('User Deleted Successfully')</script>";
}
?>
<script>
    window.location.href='Accounts.php';
</script>