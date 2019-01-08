<?php
session_start();
if(isset($_SESSION['login'])){
	include ('includes/header2.php');
}else{
	include ('includes/header.php');
}
?>
<div class="container-fluid about">
	<div id="services" class="services">
		<div class="container">
			<h3 class="ser">THE SECRET OF BERRY BEST BAKERY</h3>
		<p class="ever">We Make it Happens,Something Amazing For You Everyday.</p>
			<div class="services-top row">
				<div class="col-md-6 services-top-left">
					<div class="services-top-main row">
						<div class="col-md-6 services-left service-img">
							<a href="images/55.jpg" class=" mask b-link-stripe b-animate-go   swipebox"  title="">
								<img src="includes/images/55.jpg" alt="" class="img-responsive" />
							</a>
						</div>
						<div class="col-md-6 services-left">
							<h4>Awesome Flavours</h4>
							<p>The flavours of our Berry Best Bakery are awesome.</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="services-top-main row">
						<div class="col-md-6 services-left service-img">
							<a href="images/66.jpg" class=" mask b-link-stripe b-animate-go   swipebox"  title="">
								<img src="includes/images/66.jpg" alt="" class="img-responsive" />
							</a>
						</div>
						<div class="col-md-6 services-left">
							<h4>Freshly Made</h4>
							<p>Everything is freshly made with best quality products.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 services-top-left ">
					<div class="services-top-main row">
						<div class="col-md-6 services-left service-img">
							<a href="images/77.jpg" class=" mask b-link-stripe b-animate-go   swipebox"  title="">
								<img src="includes/images/77.jpg" alt="" class="img-responsive" />
							</a>
						</div>
						<div class="col-md-6 services-left">
							<h4>Best Quality</h4>
							<p>All the ingredients are of the best quality.</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="services-top-main row">
						<div class="col-md-6 services-left service-img">
							<a href="images/88.jpg" class=" mask b-link-stripe b-animate-go   swipebox"  title="">
								<img src="includes/images/88.jpg" alt="" class="img-responsive" />
							</a>
						</div>
						<div class="col-md-6 services-left">
							<h4>Great Services</h4>
							<p>We provide the best services in the Town.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
					
				<link rel="stylesheet" href="css/swipebox.css">
					<script src="js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
				
		</div>
	</div>
	<div class="services1">
		<div class="container">
			<h3>Our Master Chef's</h3>
			<p class="ever">We Make it Happens,Something Amazing For You Everyday.</p>
			<div class="services-grids wthree-agile row">
				<div class="col-md-4 services-grid">
					<div class="para">
						<span><img src="includes/images/chef1.jpg" alt="" class="img-responsive" /></span>
						<p>Directer Chef of BERRY BEST BAKERY</p>
					</div>
				</div>
				<div class="col-md-4 services-grid">
					<div class="para">
						<span><img src="includes/images/chef2.jpg" alt="" class="img-responsive" /></span>
						<p>Co-odinator chef of BERRY BEST BAKERY</p>
					</div>
				</div>
				<div class="col-md-4 services-grid">
					<div class="para">
					<span><img src="includes/images/chef3.jpg" alt="" class="img-responsive" /></span>
						<p>Chef of BERRY BEST BAKERY</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<div class="main_page">
	    <div id="about" class="advantages">
		<div class="container">
			<h3>Our Services</h3>
			<div class="our-advantages-grids w3layouts-agile row">
				<div class="col-md-4 our-advantages-grid">
					<div class="col-xs-3 our-advantages-grd-left">
						<p>1.</p>
					</div>
					<div class="col-xs-9 our-advantages-grd-right">
						<h4>Great Services</h4>
						<p>We have a great service Once you contact us 
						   and visit us you will be satisfied of the great service</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 our-advantages-grid">
					<div class="col-xs-3 our-advantages-grd-left">
						<p>2.</p>
					</div>
					<div class="col-xs-9 our-advantages-grd-right">
						<h4>Online Booking</h4>
						<p>You have the privilage to book and order
						   as you Wish to get your products.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 our-advantages-grid">
					<div class="col-xs-3 our-advantages-grd-left">
						<p>3.</p>
					</div>
					<div class="col-xs-9 our-advantages-grd-right">
						<h4>Best Quality</h4>
						<p>Best Quality Product of the Town
						   You can visit our site and find out for yourself.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="our-advantages-grids row">
				<div class="col-md-4 our-advantages-grid ">
					<div class="col-xs-3 our-advantages-grd-left">
						<p>4.</p>
					</div>
					<div class="col-xs-9 our-advantages-grd-right">
						<h4>Freshly Made</h4>
						<p>The Products such as Cakes, Pastries, Cupcakes, Cookies ect.
						   Are Freshly Made as per your requirements.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 our-advantages-grid">
					<div class="col-xs-3 our-advantages-grd-left">
						<p>5.</p>
					</div>
					<div class="col-xs-9 our-advantages-grd-right">
						<h4>Healthy Ingredients</h4>
						<p>You dont need to worry about the Indredients
						   All the Ingredients are very Healthy.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 our-advantages-grid">
					<div class="col-xs-3 our-advantages-grd-left">
						<p>6.</p>
					</div>
					<div class="col-xs-9 our-advantages-grd-right">
						<h4>Awesome Flavours</h4>
						<p>The flavours of our berry best bakery are awesome.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
</div>

<?php
include ("includes/footer.php");

?>
</body>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>