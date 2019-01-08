<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="includes/css/customstyle.css">
	  <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
    <script src="./assets/js/jquery.min.js"></script>

    <link rel="stylesheet" href="includes/css/etalage.css" type="text/css" media="all" />

    <script src="./assets/js/jquery.etalage.min.js"></script>
    <link type="text/css" rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
          
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="includes/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
</head>

<script>
  $(document).ready(function(){
    $('#submit').click(function(){
       var name = $('#nametxt').val();
       var email = $('#emailtxt').val();
       var password = $('#passwordtxt').val();
       var cpassword = $('#cpasswordtxt').val();
       var address = $('#addresstxt').val();
       var phone = $('#phonetxt').val();
       var type= $('#type').val();
	   
       var data = "name="+name+"&email="+email+"&password="+password+"&cpassword="+cpassword+"&address="+address+"&phone="+phone+"&type="+type;

       $.ajax({
          method: 'POST',
          url: 'signinaction.php',

          data: data,
          success: function(data){
          if(data == 'Registered Successfully'){
             $('#msg').css("color","green");
          }else{
             $('#msg').css('color','red');
          }

          $('#msg').html(data);
    }
});

});

  $('#loginbtn').click(function(){
      var email = $('#email').val();
      var password = $('#pwd').val();
      var remember = $('#remember').val();
      if (grecaptcha.getResponse() == ""){
          alert("You can't proceed!");
      } else {

      var data = 'email='+email+'&password='+password+"&remembercheck="+remember;
	  
      $.ajax({
      method: 'POST',
      url: 'login.php',

      data: data,
      success: function(data){
      if(data=='Login Successful'){
        $('#messege').css("color","green");
           window.location.href = "index.php";
        }else{
          $('#messege').css("color","red");
     }

    $('#messege').html(data);
 }
});
}

 });

if(location.pathname.split('/').slice(-1)[0] == 'index.php'
  ||location.pathname.split('/').slice(-1)[0] == ''){

    $('#index-nav').addClass('acti');
    $('#about-nav').removeClass('acti');
    $('#contact-nav').removeClass('acti');
}
else if(location.pathname.split('/').slice(-1)[0] == 'contact.php'){

    $('#index-nav').removeClass('acti');
    $('#about-nav').removeClass('acti');
    $('#contact-nav').addClass('acti');

    }else if(location.pathname.split('/').slice(-1)[0] == 'about.php'){
        $('#index-nav').removeClass('acti');
        $('#contact-nav').removeClass('acti');
        $('#about-nav').addClass('acti');
    }else{
        $('#index-nav').removeClass('acti');
        $('#contact-nav').removeClass('acti');
        $('#about-nav').removeClass('acti');
    }


});

</script>


<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top navlinks">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><h2>BEST BAKERY</h2></a>

      <form class="form-inline search-bar" method = "GET" action = "browse.php">
        <div class="input-group search-group">
          <input class="form-control mr-sm-2 search-text" type="text" name = "browse" placeholder="Search">
            <button class="btn btn-success search-btn" type="submit">Search</button>
        </div>
      </form>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse" aria-controls="navbarsExample04" aria-expanded="false"  aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapse">
        <ul class="navbar-nav ml-auto" id = "navigation">
          <li class="nav-item">
            <a class="nav-link nav-a acti" id = "index-nav" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-a" id = "contact-nav" href="contact.php">CONTACT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-a" id = "about-nav" href="about.php">ABOUT US</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link nav-a" id = "about-nav" href="help.php">HELP</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link nav-a" id = "about-nav" href="./admin/index.php">ADMIN LOGIN</a>
          </li>

           <li class="nav-item">
            <a class="nav-link nav-a log" data-toggle="modal" data-target="#myModal">LOGIN/<br>REGISTER</a>
          </li>
        </ul>
      </div>
    </div>
    </nav>

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">LOGIN / REGISTER</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
          <h4>ALREADY A MEMBER?</h4>
          <br>
          <span id = "messege"></span>
		  
<!-- LOGIN FORM -->
          <form action="/action_page.php" class="sign-frm">        
             <div class="form-group">
               <label for="email">Email address:</label>
               <input type="email" class="form-control" id="email">
             </div>
             <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd">
             </div>
            <div class="checkbox">
               <label><input type="checkbox"> Remember me</label>
            </div>
            <div data-type="image" class="g-recaptcha" data-sitekey="6Lfe6VAUAAAAAItEf4G3K2nwCZnR24SlGWjFtxmV"></div>
               <button type="button" id = "loginbtn" class="btn btn-default">Submit</button>
  
          </form>
          </div>
          <div class="col-sm-6 sign">
            <h4>SIGN UP TO BECOME A MEMBER TODAY!!</h4>
            <br>
            <span id = "msg"></span>
			
<!-- SIGNUP FORM -->
            <form action="/action_page.php" class="sign-frm">
                <div class="form-group">
                  <label>Name:</label>
                  <input type="text" class="form-control" id="nametxt" placeholder="Enter your name">
                </div>
                <div class="form-group">
                   <label>Email:</label>
                   <input type="email" class="form-control" id="emailtxt" placeholder="Enter your email" >
                </div>

                <div class="form-group">
                   <label>Password:</label>
                   <input type="password" class="form-control" id="passwordtxt" placeholder="Enter your password">
                </div>

                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input type="password" class="form-control" id="cpasswordtxt" placeholder="Retype your password">
                </div>

                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" id="addresstxt" placeholder="Enter your address">
                </div>

                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="number" class="form-control" id="phonetxt" placeholder="Enter your phone number">
                </div>

                <div class="form-group">
                   <select class="form-control" id="type" style = "display:none;">
                       <option>User</option>
                       <option>Admin</option>
                   </select>
                </div>
                <button type="button" id = "submit" class="btn btn-default">Register</button>
            </form>
          </div> 
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


