<?php
require('admin_con.php');
$admin_id = $_GET['id'];
mysqli_query($con, "Delete from admin where id = '$admin_id'");
header("location:admin.php?msg=deletesuccess");
exit;
?>