<?php
require('admin_con.php');

   $id = $_POST['goods_id'];
   $goods_name = $_POST['goodsname'];
   $category = $_POST['category'];
   $price = $_POST['price'];
   $name = $_FILES['file']['name'];
   $file_dir = "./includes/images/";
   $target_file = $file_dir . basename($_FILES["file"]["name"]);
   $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   $extension = array("jpg", "jpeg", "png");
   $dir = "includes/images/".$name;
   
   mysqli_query ($con, "update goods SET name = '$goods_name', category = '$category', price = '$price', image = '$dir' where id = '$id'");
	move_uploaded_file($_FILES['file']['tmp_name'],$file_dir.$name);
      header("Location: goods.php");

?>