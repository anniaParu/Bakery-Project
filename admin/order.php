<?php
session_start();
if(isset($_SESSION['admin_log'])){
$username = $_SESSION['admin_log']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order</title>
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
   $result = mysqli_query($con, "select o.order_id,o.quantity,o.price,o.address,o.total,o.ordered_time,g.name,u.name from order_tbl o inner join goods g on o.goods_id = g.id  
     inner join user u on o.user_id = u.user_id");
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
      <li><a href="admin.php">ADMIN</a></li>
      <li class="active"><a href="order.php">ORDERS</a></li>
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
      <h2>MANAGE ORDERS</h2>
    </div>
    
  </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>UserName</th>
        <th>GoodsName</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Address</th>
        <th>Total</th>
        <th>Orderd Time</th>
      </tr>
    </thead>
    <tbody>
      <?php 
    if($check > 0 ){
      while($row = mysqli_fetch_assoc($result)){
        echo 
      "<tr>
          <td>{$row['order_id']}</td>
          <td>{$row['name']}</td>
          <td>{$row['name']}</td>
          <td>{$row['quantity']}</td>
          <td>{$row['price']}</td>
          <td>{$row['address']}</td>
          <td>{$row['total']}</td>
          <td>{$row['ordered_time']}</td>
          <td>";?><button id='edit_btn' onclick="deleteorder('<?php echo $row['order_id']; ?>')"><span class='glyphicon glyphicon-trash'></span></button> <?php echo "</td>
      </tr>";
      }
    }
      ?>
    </tbody>
  </table>
</div> 
</body>

<script>
    function deleteorder(ID){
    if (confirm('Are you sure you want to delete?')){
      window.location.href = "deleteorder.php?id="+ID;
    } else {
      // nothing!
    }
  }
</script>
</html>

<?php 
}else{
  header('location:index.php');
}
?>