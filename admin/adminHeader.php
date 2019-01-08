<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" href="css/adminstyle.css">
		 
         <script src="js/jquery.min.js"></script>
         <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

<?php ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">E</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard.php">HOME</a></li>
      <li><a href="user.php">USERS</a></li>
      <li><a href="phone.php">PHONE </a></li>
      <li><a href="admin.php">ADMIN</a></li>
      <li><a href="order.php">ORDERS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="admin_edit.php"><?php 
          require('admin_con.php');
          $result= mysqli_query($con, "select username from admin");

          if(mysqli_num_rows($result)>0){
           while($row = mysqli_fetch_assoc($result)){
            $username = $row['username'];
           }
         }
           echo $username;?></a></li>
            <li><a href="admin_logout.php">LOGOUT</a></li>
    </ul>
  </div>
</nav>