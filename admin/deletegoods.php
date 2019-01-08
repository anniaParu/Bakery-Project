<?php
session_start();
require('admin_con.php');
$goods_id = $_GET['id'];
mysqli_query($con, "Delete from goods where id = '$goods_id'");
header("location:goods.php");
exit;
?>