<?php
session_start();
  require('admin_con.php');
    $uname = $_POST['user'];
    $pword = $_POST['pass'];

    $result = mysqli_query($con, "select * from admin where username = '$uname' and password = '$pword'");
    $check = mysqli_num_rows($result);
    if($check > 0){
      $_SESSION['admin_log'] = $uname;
	    header("location:dashboard.php");
    }else{
	  echo '<script language="javascript">alert("Incorrect username or password");
             window.location.href = "index.php";
	        </script>';

}

?>