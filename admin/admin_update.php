<?php
session_start();
 require('admin_con.php');
   $id = $_POST['id'];
   $name = $_POST['name'];
   $uname = $_POST['uname'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];

   mysqli_query ($con, "update admin SET full_name = '$name', username = '$uname', email = '$email', password = '$pass' where id = '$id'");
 
      $_SESSION['admin_log'] = $uname;

      header("Location: admin_edit.php");

?>