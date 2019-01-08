<?php
session_start();
if(isset($_SESSION['admin_log'])){
$username = $_SESSION['admin_log']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/adminstyle.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

  <?php

require('admin_con.php');
$result= mysqli_query($con, "select * from admin");
$check = mysqli_num_rows($result);

?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">Best Bakery</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php">HOME</a></li>
      <li><a href="user.php">USERS</a></li>
      <li><a href="goods.php">GOODS </a></li>
      <li class="active"><a href="admin.php">ADMIN</a></li>
      <li><a href="order.php">ORDERS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin_edit.php"><?php  echo $username;?></a></li>
            <li><a href="admin_logout.php">LOGOUT</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="adminhead">
    <div class="heading">
      <h2>MANAGE ADMIN</h2>
    </div>
    <div class="addbtn">
      <button type="button" class="btn btn-primary btn-sm btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Admin</button>
    </div>
  </div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Admin</h4>
        </div>
        <div class="modal-body">
          <form id="adminform" name="admin_register" method="post" action="addadmin.php" >
        <div class="form-group">
    <label for="name">Full Name:</label>
    <input type="text" name="name" class="form-control" id="name" required>
  </div>
     <div class="form-group">
    <label for="name">Username:</label>
    <input type="text" name="uname" class="form-control" id="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="pass" class="form-control" id="pwd" required>
  </div>

  <div class="form-group">
    <input type="submit" name="adminsignup" class="btn btn-default" id="addadmin">
  </div>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <?php 
    if($check > 0 ){
      while($row = mysqli_fetch_assoc($result)){
        echo 
      "<tr>
        <td>{$row['id']}</td>
        <td>{$row['fullname']}</td>
        <td>{$row['username']}</td>
        <td>{$row['email']}</td>
        <td>{$row['password']}</td>

      </tr>";
      }
    }
      ?>
    </tbody>
  </table>
</div>
  
</body>
</html>
<?php 
 }else{
  header('location:index.php');
 }
?>