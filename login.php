<?php  
include('crud.php');

   $crud = new Crud();
   $error = '';
   $msg = '';

   session_start();
    if(isset($_COOKIE['login'])){

    }

    if(isset($_POST['remembercheck'])){
	     $remember  = $_POST['remembercheck'];
    }
       $email = $_POST['email'];
       $password = sha1($_POST['password']);

    if(empty($email)){
     echo "Please input your email";

    }elseif (empty($password)){
       echo"Please input your password ";

    }elseif(empty($email)||empty($password)){
       echo "Please input your email and password";

    }else{
	     $query = "Select * From user where email = '$email' and password  = '$password' ";
	     $exe = $crud->getData($query);

	  if(count($exe) ==1){
		  echo 'Login Successful';

      $_SESSION['login'] = $email;
	
    }else{
	   echo "Incorrct email or password";

    }
    if($remember){
      setcookie('login',true, time() + 3600 *12);
    }

}
	
?>