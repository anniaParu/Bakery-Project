<?php
session_start();
if(isset($_SESSION['admin_log'])){
$username = $_SESSION['admin_log']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User</title>
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
$result= mysqli_query($con, "select * from user");
$check = mysqli_num_rows($result);

?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">Best Bakery</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php">HOME</a></li>
      <li class="active"><a href="user.php">USERS</a></li>
      <li><a href="goods.php">GOODS </a></li>
      <li><a href="admin.php">ADMIN</a></li>
      <li><a href="order.php">ORDERS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin_edit.php"><?php  echo $username;?></a></li>
            <li><a href="admin_logout.php">LOGOUT</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <h2>User Table</h2>
  <table class="table table-hover">
    
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>      
        <th>Address</th>
         <th>Mobile no.</th>      
      </tr>
    </thead>
    <tbody>
    <?php 
    if($check > 0 ){
      while($row = mysqli_fetch_assoc($result)){
        echo 
      "<tr>
          <td>{$row['user_id']}</td>
          <td>{$row['name']}</td>
          <td>{$row['email']}</td>
          <td>{$row['password']}</td>
          <td>{$row['address']}</td>
          <td>{$row['phone']}</td>
          <td>{$row['type']}</td>
        "
        ?>
        <td>
        <button id='edit_btn' onclick="deleteuser('<?php echo $row['user_id']; ?>')"><span class='glyphicon glyphicon-trash'></span></td>
          <?php
          echo "</tr>";
         }
  }
  ?>
    </tbody> 
  </table>
</div>  
</body>
</html>
<script type="text/javascript">
  function deleteuser(ID){
    if (confirm('Are you sure you want to delete?')){
      window.location.href = "deleteuser.php?id="+ID;
    } else {
      // nothing!
    }
  }
</script>

<?php
}else{
  header('location:index.php');
}
?>