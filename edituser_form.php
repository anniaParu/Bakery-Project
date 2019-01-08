<?php
session_start();  
  if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
    include 'includes/header2.php';
  }else{
      include 'includes/header.php'; 
 }
  include('crud.php');

   if(isset($_GET['msg'])){
      $msg = $_GET['msg'];
    }

     $crud  = new Crud();

     $query = "select * from user where email = '$email'";

     $result = $crud->execute_single($query);

    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
       $id = $row['user_id'];
       $name = $row['name'];
       $email = $row['email'];
       $password = $row['password'];
       $address = $row['address'];
       $phone = $row['phone'];

    }
}

?>


<div class="container user-edit">

<h2 id="user-edit-head">EDIT YOUR PROFILE</h2>
<span id = "msg"><?php 
 if(isset($_GET['msg'])){
$msg = $_GET['msg'];
echo $msg;
};?></span>
	<form action="edituser.php" method = "post" class="sign-frm">

    <div class="form-group">

    <input type="hidden" class="form-control" id="idtxt" name="idtxt" value = '<?php echo $id;?>'>
  </div>
     <div class="form-group">
                <div class="form-group">

                  <label>Name:</label>
    <input type="text" class="form-control" id="nametxt" name="nametxt"  value = '<?php echo $name;?>'>
  </div>
     <div class="form-group">

                  <label>Email:</label>
    <input type="text" class="form-control" id="emailtxt" name="emailtxt" value = '<?php echo $email;?>'>
  </div>


  <div class="form-group">
    <label>Password:</label>
    <input type="text" class="form-control" id="passwordtxt" name="passwordtxt"  
    value = '<?php echo $password;?>'>
  </div>

  <div class="form-group">
    <label>Address:</label>
    <input type="text" class="form-control" id="addresstxt" name="addresstxt"
    value = '<?php echo $address;?>'>
  </div>

  <div class="form-group">
    <label>Phone Number:</label>
    <input type="number" class="form-control" id="phonetxt" name="phonetxt" 
    value = '<?php echo $phone;?>'>
  </div>

  
  <button type="submit" class="btn btn-default user-update-btn">UPDATE</button>
</form>

</div>
</div>
<?php
include ("includes/footer.php");

?>
</body>
</html>