<?php
session_start();
if(isset($_SESSION['login'])){
	include ('includes/header2.php');
}else{
	include ('includes/header.php');
}
?>

<div class="container-fluid contact-cont">
	<div id="contact" class="contact">
	<div class="container">
		<h3>Contact Us</h3>
		
		<div class="contact-us1-bottom w3layouts-agile">
        <form method="post" action = "mailaction.php"  id="myForm">
  		<div class="form-group">
           <input type="email" class="form-control contact-input" id="email" placeholder="Your Email" name ="email"  required>
    
        </div>
        <div class="form-group">
            <input type="text" class="form-control contact-input" id="subject" placeholder="Subject" name = "subject" required>
        </div>
           <textarea class="form-control contact-input" rows="5" id="message" placeholder="Message" name = "msg"  required></textarea>
           <br>
           <button class="btn btn-default" type="submit">Send</button>
        </form>
			<div class="home-radio-clock">
				<ul>
					<li><i class="glyphicon glyphicon-home" aria-hidden="true"></i>Our Home</li>
					<li><i class="glyphicon glyphicon-bullhorn" aria-hidden="true"></i>Call Us</li>
					<li><i class="glyphicon glyphicon-time" aria-hidden="true"></i>Opening Time</li>
				</ul>
			</div>
			<div class="home-radio-clock-right">
				<ul>
					<li>35 Diamond Road
						<span>Koteshwor,Kathmandu, Nepal</span></li>
					<li class="lst">(+977) 9860667703 or (+977) 9813136242</li>
					<li>(+977) 9860667703 or (+977) 9813136242 <span>Mon-Fri:</span><span>09h-17h</span></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
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