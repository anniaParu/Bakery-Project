<?php  
include('crud.php');

  $crud = new Crud();
  $error = '';
  $msg = '';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);
  $confpass = sha1($_POST['cpassword']);
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $type = $_POST['type'];

  $check_email = $crud->checkemail($email);

   if(empty($name)||empty($email)||empty($password)||empty($confpass)||empty($address)||empty($phone)){
     echo "All field must be filled";
	 
    }else{
		
    if($check_email>0){
       echo "Email already exists";
	   
    }else{
		
    if($password != $confpass){
      echo 'Password doesnt match!!! ';
    }else{
	 $query = "insert into user (name,email,password,address,phone,type)values ('$name','$email','$password','$address','$phone','$type')";
	 $sql = $crud->execute($query);
	   echo 'Registered Successfully';
   }
 }

 }

?>