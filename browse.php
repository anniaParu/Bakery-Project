<?php
session_start();  
  if(isset($_SESSION['login'])){
     include 'includes/header2.php';
  }else{
     include 'includes/header.php';
  }
?>

<?php
include ('crud.php');
  $crud = new Crud();
  if(isset($_GET['browse'])){
   $results = $crud->browse($_GET['browse']);
  }
?>

<div class="container-fluid browse-main">
	<div class="container browse">
      <div class="browse-h1">Search Results:</div><br>
		<?php
          if(isset($_GET['browse'])){
          if(is_null($results)){
             echo "No products found";
          }else{
	         foreach ($results as $result) {?>
		     <div class="row browse-row">
			 <div class="col-sm-6 browse-pic">
				<img src = "<?php echo $result['image'];?>" class="browse-picfull"> 
			 </div>
			 <div class="col-sm-6 browse-info">
				<h1 class = "browse-info-head"> <a  href = 'view.php?id=<?php echo $result['id']?>' > <?php echo $result['name'];?> </a></h1>
				<h6>Category:   <?php echo $result['category'];?></h6>
				<hr>
				<h6 class="browse-h6">Rs:</h6>  <?php echo $result['price'];?> <br>	
			</div>
		</div>
		<br>
		<?php
			}
		}
	}
		?>
		
	</div>
</div>

<?php
include ("includes/footer.php");
?>
</body>
</html>