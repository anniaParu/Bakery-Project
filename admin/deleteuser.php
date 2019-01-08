<?php
require('admin_con.php');
$userid = $_GET['id'];
mysqli_query($con, "Delete from user where user_id = '$userid'");
header("location:user.php");
exit;
?>