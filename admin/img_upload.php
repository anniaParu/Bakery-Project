<?php
require('admin_con.php');
  if (isset($_POST['submit'])) {
	$name = $_FILES['file']['name'];
	$file_dir = "car_image/";
	$target_file = $file_dir . basename($_FILES["file"]["name"]);
	$image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$extension = array("jpg", "jpeg", "png");

	if (in_array($image_type, $extension)) {
	   mysqli_query($con, "insert into car_detail (picture) value ('".$name."')");
	   move_uploaded_file($_FILES['file']['tmp_name'],$file_dir.$name);
	}else{
	   echo "Unsupported extension";
	}
  }

?>