<?php
require('admin_con.php');
$order_id = $_GET['id'];
mysqli_query($con, "Delete from order_tbl where order_id = '$order_id'");
header("location:order.php?msg=deletesuccess");
exit;
?>