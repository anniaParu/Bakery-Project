<?php

require('admin_con.php');

if (isset($_POST['submit'])) {
   $goods_name = $_POST['goodsname'];
   $category = $_POST['category'];
   $price = $_POST['price'];
   $name = $_FILES['file']['name'];
   $file_dir = "../includes/images/";
   $target_file = $file_dir . basename($_FILES["file"]["name"]);
   $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   $extension = array("jpg", "jpeg", "png");
   $dir = "includes/images/".$name;
   
   if (in_array($image_type, $extension)) {
	   mysqli_query($con, "insert into goods(name, category, price, image) values ('$goods_name', '$category', '$price','$dir')");
	   move_uploaded_file($_FILES['file']['tmp_name'],$file_dir.$name);
	   header("location:goods.php");
   }else{
		echo "Unsupported extension";
	}
}



    