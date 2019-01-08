<?php
session_start();  
  if(isset($_SESSION['login'])){
    include 'includes/header2.php';
  }else{
    include 'includes/header.php';
  }
?>
<?php
   if(isset($_POST['add_to_cart'])){
   if(isset($_SESSION['cart']))
   {
   $item_array_id = array_column($_SESSION['cart'], "item_id");

   if(!in_array($_GET['id'], $item_array_id))
   {
    $count = count($_SESSION['cart']);
	
	$item_array = array(
    'item_id' => $_GET['id'],
    'item_name' => $_POST['hidden_name'],
    'item_price' => $_POST['hidden_price'],
    'item_quantity' => $_POST['quantity']
	);
    $_SESSION['cart'][$count] = $item_array;
   }else{
      echo '<script>alert("Item Already Added");</script>';
   }
   }else
   {
	 $item_array = array(
       'item_id' => $_GET['id'],
       'item_name' => $_POST['hidden_name'],
       'item_price' => $_POST['hidden_price'],
       'item_quantity' => $_POST['quantity']
	 );
	  $_SESSION['cart'][0] = $item_array;
   }
}
  if(isset($_GET['action'])){
  if($_GET['action']=='delete'){
  foreach ($_SESSION['cart'] as $keys => $values) {
	if($values['item_id']==$_GET['id'])
	{
      unset($_SESSION['cart'][$keys]);
	}
  }
 }
}
?>	

<div class="container-fluid cart-main">
	<div class="container cart">
		<div class="cart-head">
			YOUR CART
			<a href = "index.php"><button class="continue-btn">Continue Shopping</button></a>
		</div>
		<div class="table-responsive-lg cart-tbl-main">
			
<?php
   if(isset($_SESSION['cart'])){
     $count = count($_SESSION['cart']);
   if($count>=1){
?>

<table class=" table cart-tbl ">
	<tr>
		<th >GOODS NAME</th>
		<th >QUANTITY</th>
		<th >PRICE</th>
		<th >AMOUNT</th>
		<th > </th>

	</tr>
	<?php
     if(!empty($_SESSION['cart'])){
        $total = 0;
        foreach($_SESSION['cart'] as $keys => $values){
	?>
    <tr>
	      <td class="td1"><?php echo $values['item_name'];?></td>
	      <td class="td2"><?php echo $values['item_quantity'];?></td>
	      <td class="td3"><?php echo $values['item_price'];?></td>
	      <td class="td4"><?php echo number_format($values['item_quantity']);?></td>
          <td class="td5"><a href = "cart.php?action=delete&id=<?php echo $values['item_id']?>"><span><i class="fa fa-times"></i></span></a></td>
    </tr>
	<?php
	    $total = $total +($values['item_quantity'] * $values['item_price']);	
    }
?>
  <tr >
	<td></td>
	<td colspan="5" class="td6">Total: <?php echo number_format($total,2);?></td>
  </tr>
<?php
}
?>
</table>
<a href = 'finalOrder.php'><button class="confirm-btn">Confirm Order</button></a>



<?php
}else{
	echo "No Items in cart";
}
}
?>
		</div>
	</div>
	
</div>

<?php
include ("includes/footer.php");

?>
</body>
</html>