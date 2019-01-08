<?php
session_start();
  if(isset($_SESSION['login'])){
    include('includes/header2.php');
  }else{
	include('includes/header.php');
  }
   include('crud.php');

    $crud = new Crud();

    if(isset($_GET['id'])){
      $id = $_GET['id'];
    }
      $query = "select * from goods where id = '$id' ";

      $result = $crud->getData($query);

    foreach ($result as $key => $value) {
	   $name = $value['name'];
	   $category = $value['category'];
	   $price = $value['price'];
	   $image=  $value['image'];
}

?>
    <script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 500,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });

        });
    </script>
<div class="container-fluid cake-view">
	<div class="row">
		<div class="col-sm-6 view-pic">
			<div class="single_grid">
            <div class="grid images_3_of_2">
			<ul id = "etalage">
				<li>
			      <img src = "<?php echo $image;?>" class="etalage_thumb_image"> 
				  <img src = "<?php echo $image;?>" class="etalage_source_image"> 
		        </li>
		        <li>
			       <img src = "<?php echo $image;?>" class="etalage_thumb_image"> 
				   <img src = "<?php echo $image;?>" class="etalage_source_image"> 
		        </li>
		        <li>
			       <img src = "<?php echo $image;?>" class="etalage_thumb_image"> 
				   <img src = "<?php echo $image;?>" class="etalage_source_image"> 
		        </li>
		    </ul>
	     </div>
	    </div>
		</div>
		<div class="col-sm-6 view-info">
			<h3><?php echo $name;?></h3> 
		      Category:  <?php echo $category ;?> 
		      <hr class="view-hr">

		      <h5 class="view-topic">Rs.  <?php echo $price;?> <br> </h5> <br>

		      Quantity to buy:
		      <form  method = 'post' action = "cart.php?action=add&id=<?php echo $id?>">
                <div class="input-group input-group-view ">
	               <button type="button" value = "-" name = "minus" id = "min" onclick="sub()" class="view-form-btn">-</button>			
	               <input type  = "text" name = "quantity" class = "form-control phone-quantity" id="ph-quantity" value= 1>
	               <button type="button" name = "add" onclick= 'addition()' class="view-form-btn">+</button>
                </div>

	              <input type = "hidden" name = "hidden_name" value = "<?php echo $name?>">

		          <input type = "hidden" name = "hidden_price" value = "<?php echo $price?>"><br>
		          <button value = "Add to cart" name = "add_to_cart" type = "submit" class="add-cart-btn">Add to Cart  </button>
	          </form>

		</div>
	</div>
	
</div> 

<?php
include ("includes/footer.php");
?>
</body>
</html>

<script type="text/javascript">
var num = 1;
function addition(){
     num++;
     document.getElementById('ph-quantity').innerHTML = num;
     document.getElementById('ph-quantity').value = num;
     if(num>=10){
num=0;
     }
     if(num>0){
document.getElementById('min').disabled = false;
     }

}

function sub(){
     num--;
     document.getElementById('ph-quantity').innerHTML = num;
     document.getElementById('ph-quantity').value = num;
  if(num==0){
document.getElementById('min').disabled = true;
     }
}

</script>