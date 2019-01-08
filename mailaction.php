<?php

    $admin_email = "admin@gmail.com"; //your email
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
    $header = "From:" . $email;
	
    $exe =  mail($admin_email, "$subject", $msg, $header);

    if($exe){
	  echo "<script>alert('Your Messege Has Been Sent.');
               window.location.href = 'contact.php';
	        </script>";

    }
?>