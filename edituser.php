<?php
include('crud.php');
  $crud = new Crud();
  $id = $_POST['idtxt'];
  $name = $_POST['nametxt'];
  $email = $_POST['emailtxt'];
  $password  = sha1($_POST['passwordtxt']);
  $address = $_POST['addresstxt'];
  $phone = $_POST['phonetxt'];

  $query = "update user set name= '$name', email = '$email', password = '$password',address = '$address', phone = '$phone' where user_id = '$id'";

  $execute = $crud->execute($query);
    echo "<script> alert('Profile Updated');</script>";

    if($execute){
       $_SESSION['user'] = $email;
       header('Location:edituser_form.php?msg=Profile Updated!!');
    }else{

    }

?>