
<?php
session_start();
if(isset($_SESSION['admin_log'])){
$username = $_SESSION['admin_log']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your Profile</title>
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

if(isset($_SESSION['admin_log'])){
$uname = $_SESSION['admin_log'];
}
$result = mysqli_query($con, "select * from admin where username = '$uname' ");

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">Best Bakery</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php">HOME</a></li>
      <li><a href="user.php">USERS</a></li>
      <li><a href="phone.php">PHONE </a></li>
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
  <div class="panel panel-default">
    <div class="panel-heading"><h3>EDIT YOUR PROFILE</h3></div>

    <?php
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name = $row['fullname'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
          }
        ?>

    <div class="panel-body">
      <form id="adminedit" name="admin_edit" method="post" action="admin_update.php" >
        <div class="form-group">
          <input type="hidden" name="id" class="form-control" value="<?php echo "$id" ?>" required>
          <label for="name">Full Name:</label>
          <input type="text" name="name" class="form-control" id="name" value="<?php echo "$name" ?>" required>
        </div>
        <div class="form-group">
          <label for="name">Username:</label>
          <input type="text" name="uname" class="form-control" id="name" value="<?php echo "$username" ?>" required>
        </div>
        <div class="form-group">
        <div class="form-group">
           <label for="email">Email address:</label>
           <input type="email" name="email" class="form-control" id="email" value="<?php echo "$email" ?>" required>
        </div>
        <div class="form-group">
           <label for="pwd">Password:</label>
           <input type="text" name="pass" class="form-control" id="pwd" value="<?php echo "$password" ?>" required>
        </div>
     
        <div class="form-group">
          <input type="submit" name="adminsignup" class="btn btn-default" id="addadmin">
        </div>
  
      </form>

     </div>
       <button id='edit_btn' onclick="deleteadmin('<?php echo $id; ?>')"><span class='glyphicon glyphicon-trash'></span>&nbsp; Delete Account ??</button>
     </div>
 </div>
</body>
<script>
  function deleteadmin(ID){
    if (confirm('Are you sure you want to delete?')){
      window.location.href = "deleteadmin.php?id="+ID;
    } else {
      //abc
    }
  }
  </script>
</html>
<?php
}else{
  header('location:index.php');
}
?>
