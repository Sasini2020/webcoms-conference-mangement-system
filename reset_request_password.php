<?php
	session_start();
	require 'dbconfig/config.php';
?>


<?php

if(isset($_POST['reset_btn'])){

  
   
    $selector= bin2hex(random_bytes(8));
    $token=random_bytes(32);
  
    $url="http://localhost/rmclone17/webcoms/create_new_password.php?selector=".$selector."&validator=".bin2hex($token);
    $expires=date("U")+1800;

    require 'dbconfig/config.php';
    

  $userEmail=$_POST['email'];
  $usertype=$_POST['user_type'];
    
    $sql="DELETE FROM pwdreset WHERE resetEmail=? AND user_type=?; ";
    $stmt=mysqli_stmt_init($con);
              if(!mysqli_stmt_prepare($stmt,$sql)){
        
                     echo "There was an error";
                    exit();
              }else{

                       mysqli_stmt_bind_param($stmt,"ss",$userEmail,$usertype);
                        mysqli_stmt_execute($stmt);

                     }
    $sql="INSERT INTO pwdreset(resetEmail,user_type,resetSelector,resetToken,resetExpires) VALUES(?,?,?,?,?);";
    $stmt=mysqli_stmt_init($con);
           if(!mysqli_stmt_prepare($stmt,$sql)){
                                   echo "There was an error!";
                                   exit();
              }else{
                            $hashedToken=password_hash($token,PASSWORD_DEFAULT);
                             mysqli_stmt_bind_param($stmt,"sssss",$userEmail,$usertype,$selector,$hashedToken,$expires);
                             mysqli_stmt_execute($stmt);

                    }

    mysqli_stmt_close($stmt);
    mysqli_close();

   $to=$userEmail;

   $subject='Reset your password for ';

   $message ='<p>we recieved a password reset request.the link to reset your password make this request,
   you can ignore this email</p>';
   $message .='<p>'.$usertype.'   Here is your password reset link:</br>';
   $message .='<a href="'.$url.'">'.$url.'</a></p>';


  

 

   $headers="From: webcoms <webcoms2020@gmail.com>\r\n";
   
 $headers .="Reply-To: webcoms2020@gmail.com \r\n";
 $headers .="Content-type:text/html \r\n";
 
   mail($to,$subject,$message,$headers);

   header('Location: forgetpassword.php?reset=success');




}
else{

    header('Location: index.php');


}




?>
