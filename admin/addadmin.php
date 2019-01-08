<?php
require('admin_con.php');
  $name = $_POST['name'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  if($name != "" || $uname != "" || $email != "" || $pass != "" ){
     mysqli_query($con, "insert into admin (full_name, username, email, password) values ('$name', '$uname', '$email', '$pass')");
     header("Location: admin.php");
    
}