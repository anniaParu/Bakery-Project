
<?php
session_start();  
if(isset($_SESSION['login'])){
include 'includes/header2.php';

?>
<?php 
 include('crud.php');
   $crud = new Crud();

   if(isset($_SESSION['login'])){
     $email = $_SESSION['login'];
    }

?>
<div class="container-fluid finalorder-main">
	<div class="container finalorder">
		<div class="table-responsive-lg cart-tbl-main">
			
<?php

   if(!empty($_SESSION['cart'])){
   $total = 0;
?>
  <h1 class="finalorder-head">Your Order List</h1>
  <h5 class="finalorder-date">Ordered on: </h5><?php echo date("Y/m/d");?>

  <table class=" table finalorder-tbl ">
	<tr>
		<th >PRODUCT NAME</th>
		<th >QUANTITY</th>
		<th >PRICE</th>
		<th >Total Quantity</th>
		

	</tr>
	
	<?php
       foreach($_SESSION['cart'] as $keys => $values){

        $goods_name = $values['item_name'];

	?>
<tr>
	<td class="td1"><?php echo $goods_name;?></td>
	<td class="td2"><?php echo $values['item_quantity'];?></td>
	<td class="td3"><?php echo $values['item_price'];?></td>
	<td class="td4"><?php echo number_format($values['item_quantity']);?></td>




</tr>
	
	<?php
	$total = $total +($values['item_quantity'] * $values['item_price']);


//queries
	$query_user_id = "select user_id,address from user where email = '$email'";
	$query_goods_id = "select id from goods where name = '$goods_name' ";

	$quant = $values['item_quantity'];
	$prod_price = $values['item_price'];

    $result_user = $crud->getData($query_user_id);
    $result_goods = $crud->getData($query_goods_id);

    foreach ($result_user  as $val) {
	   $user_id = $val['user_id']; 
	   $address = $val['address'];
    }

    foreach ($result_goods as $val2) {
	   $goods_id = $val2['id'];
    }
    $total_price = $quant * $prod_price;
    $insert = "INSERT INTO `order_tbl` ( `user_id`, `goods_id`, `quantity`, `price`, `address`, `total`) VALUES ( '$user_id', '$goods_id', '$quant', '$prod_price', '$address', '$total_price');";

    $execute = $crud->execute($insert);	
 }
 ?>
   <tr>
	<strong><td colspan="4" class="finalorder-ttl">Total:  <?php echo number_format($total,2);?></td></strong>
   </tr>
   </table>
   <?php
       if($execute){
         echo "<h2 class= order-success>Your order has been successfully processed<h2>";
         echo "<h2 class= order-success>Thank You for purchasing!!<h2>";

       }

 }
?>
<a href = 'emptyCart.php'><button class="goback-btn">Go Back</button></a>
		</div>
	</div>
</div>

<?php
  include ("includes/footer.php");

?>
</body>
</html>
<?php
  }else{
   echo "<script>alert('You must be logged in!!');</script>";
    echo "<script>window.location.href = 'index.php' </script>";
}
?>

