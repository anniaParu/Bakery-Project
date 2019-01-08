<?php
session_start();
if(isset($_SESSION['login'])){
			include ('includes/header2.php');
}else{
include ('includes/header.php');
}

	include('crud.php');

	$crud = new Crud();

	$query = "select * from goods order by id desc limit 4";

	$result = $crud->getData($query);

?>

<div class="container-fluid index-top">
	<div class="container index-top2">
		<h1>BAKED FRESH EVERY DAY</h1>
		<p>WE EXIST TO SERVE YOU</p>
		<a href="about.php"><button>LEARN MORE</button></a>
	</div>

</div>

<div class="container-fluid index-second">
	<h3>
		FRESHLY COOKED GOODS!!!
	</h3>
	<h6>Eat something fresh today.</h6>

</div>
<div class="container-fluid index-latest">
	<div class="row latest-row">
			<?php

        foreach ($result as $key => $value) {
	
?>

			<div class="col-sm-3 latest-col">
				<div class="latest-pic">
					
					<div class="pic-head">
						<a class="product-img-name" href = view.php?id=<?php echo $value['id'];?>>
						<?php echo $value['name'];?>

					</div>

					<div class="latest-img">
						<img src = "<?php echo $value['image'];?>">
					</div>
				</div>
			</div>
			
    <?php
}
?>
		</div>
	</div>
	<div class="container-fluid pdf-conversion">
       <form class="form-inline " method="post" action="pdfconversion.php">
         <button type="submit" id="pdf" name="generate_pdf" class="btn btn-secondary generate-pdf-btn"><i class="fa fa-pdf"" aria-hidden="true"></i>
            Generate PDF</button>&nbsp;
               <a href = "OOTest.php"><button type = "button" class="btn btn-secondary generate-pdf-btn"><i class="fa fa-pdf"" aria-hidden="true"></i>
            OO Testing</button></a>&nbsp;
       </form>
    </div>
    <div class="container-fluid slider">
	    <div id="demo" class="carousel slidermain" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="includes/images/1.jpg" class="slideimg">
          </div>
          <div class="carousel-item">
            <img src="includes/images/2.jpg" class="slideimg">
          </div>
          <div class="carousel-item">
            <img src="includes/images/3.jpg" class="slideimg">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>

      </div>	
</div>
</div>

<?php
include ("includes/footer.php");

?>
</body>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>