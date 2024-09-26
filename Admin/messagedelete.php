<?php
require '../db_connect.php';

if (isset ($_GET['id'])) {
    $message_id = $_GET['id'];

    $result=$delete = "DELETE FROM contact WHERE message_id='$message_id'";
    $con->query($result);
   
}
?>
<script>
    window.location.href = 'unread.php';
</script>