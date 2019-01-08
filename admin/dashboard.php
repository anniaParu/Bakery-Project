
<?php
session_start();
if(isset($_SESSION['admin_log'])){
$username = $_SESSION['admin_log']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dash Board</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/adminstyle.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">Best Bakery</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard.php">HOME</a></li>
      <li><a href="user.php">USERS</a></li>
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
  <div class="panel panel-default">
    <div class="panel-heading"><h3>Website Overview</h3></div>
    <div class="panel-body">
      <div class="col-md-3">
        <a href="user.php"><div class="well" id="wo1"><h2><span class="glyphicon glyphicon-user"></span> &nbsp;&nbsp;&nbsp;USERS</h2></div></a>
        
      </div>
      <div class="col-md-3">
        <a href="goods.php"><div class="well"  id="wo2"><h2><span class="glyphicon glyphicon-folder-open"></span> &nbsp;&nbsp;&nbsp;GOODS</h2></div></a>
        
      </div>
      <div class="col-md-3">
        <a href="admin.php"><div class="well" id="wo3"><h2><span class="glyphicon glyphicon-briefcase"></span> &nbsp;&nbsp;&nbsp;ADMIN</h2></div></a>
      </div>
      <div class="col-md-3">
        <a href="order.php"><div class="well" id="wo4"><h2><span class="glyphicon glyphicon-cog"></span> &nbsp;&nbsp;&nbsp;ORDERS</h2>
      </div></a>

    </div>
  </div>
</div>
</div>  
</body>
</html>
<?php
}else{
  header('location:index.php');
}
?>