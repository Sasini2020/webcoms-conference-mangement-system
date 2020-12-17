<?php
	require 'dbconfig/config.php';
?>	

<?php


  if(isset($_POST["reset_submit"])){

            $selector=$_POST["selector"];
            $validator=$_POST["validator"];
            $password=$_POST["pwd"];
            $passwordRepeat=$_POST["pwd_repeat"];



            if(empty($password)||empty($passwordRepeat)){

                header("Location: ../create_new_password.php?newpwd=empty");

                exit();




            }else if($password != $passwordRepeat){

                header("Location: ../create_new_password.php?newpwd=pwdnotsame");
                exit();

            }



              $currentDate=date("U");


              require 'dbconfig/config.php';


            $sql="SELECT*FROM pwdreset WHERE resetSelector=? AND resetExpires>=?";
            $stmt=mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                
                  echo "There was an error1";
                  exit();
            }else{
        
                    mysqli_stmt_bind_param($stmt,"ss",$selector,$currentDate);
                    mysqli_stmt_execute($stmt);

                    $result=mysqli_stmt_get_result($stmt);

                    if(!$row=mysqli_fetch_assoc($result)){
                                   
                        echo "you need to re-submit your reset request.";
                        exit();

                    }else{



                           $tokenBin=hex2bin($validator);
                           $tokenCheck=password_verify($tokenBin,$row['resetToken']);

                           if($tokenCheck==false){

                            echo "you need to re-submit your reset request.";
                            exit();

                           }else if($tokenCheck==true){

                               $tokenEmail=$row['resetEmail'];


                               $sql="SELECT * FROM userinfotable WHERE email=?;";

                               $stmt=mysqli_stmt_init($con);
                               if(!mysqli_stmt_prepare($stmt,$sql)){
                                   
                                     echo "There was an error2";
                                     exit();
                               }else{

                                      mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                      mysqli_stmt_execute($stmt);
                                      $result=mysqli_stmt_get_result($stmt);

                                      if(!$row=mysqli_fetch_assoc($result) ){
                                                     
                                          echo "There was a error3!";
                                          exit();
                                      }else{
                                      

                                          $sql="UPDATE userinfotable SET password=? WHERE email=?";

                                          $stmt=mysqli_stmt_init($con);
                                          if(!mysqli_stmt_prepare($stmt,$sql)){
                                              
                                                echo "There was an error4";
                                                exit();
                                          }else{
                                                
                                                $encryptedpass = md5($password);
                                                 mysqli_stmt_bind_param($stmt,"ss", $encryptedpass,$tokenEmail);
                                                 mysqli_stmt_execute($stmt);


                                               $sql="DELETE FROM pwdreset WHERE resetEmail=?";
                                               $stmt=mysqli_stmt_init($con);
                                               if(!mysqli_stmt_prepare($stmt,$sql)){

                                                             echo "There was an error5!";
                                                             exit();

                                               }else{

                                                               mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                                               mysqli_stmt_execute($stmt);
                                                              
                                                            
                                                               header("Location:index.php?newpwd=passwordupdated");

                                               }

                                                   
                                                      




                                          }

                                      }


                               }
                                    


                           }



                    }
        
            }






  }else{




    header("Location:../inndex.php");
  }







?>