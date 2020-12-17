<?php 
    session_start();
    require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
   <title>Forget Password</title>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link rel="stylesheet" href="css/nav_footer_styles.css">
   <link rel="stylesheet" href="css/reg_form_style.css">
</head>
<body>
  <nav>
   <div class="logo">WebComs</div>
       <input type="checkbox" id="click">
          <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
            </label>
          <ul>
               <li> <a href="index.php">Home</a></li>
               <li><a href="login.php">login</a></li>
               <li><a href="register.php">Register</a></li>
               <li><a href="help.php">help</a></li>
               <li><a href="About.php">About</a></li>  
          </ul>  

  </nav>
  <h1>Create New Password </h1>
  <br><br>
 <div id="main-wrapper"> 
   <?php
      $selector=$_GET["selector"];
      $validator=$_GET["validator"];

      if(empty($selector)||empty($validator)){
           echo "could not validate request!";
      }else{
           if(ctype_xdigit($selector)!== false && ctype_xdigit($validator)!== false){
                ?>
                        <form action="reset_password.php" method="post" class="myform">
                            <!--<h2>Create New Password </h2><br>-->
                            <fieldset>
                               <input name="selector" type="hidden" value="<?php echo $selector?>"><br>
                               <input name="validator" type="hidden" value="<?php echo $validator?>"><br>
                               <input type="password" name="pwd" placeholder="Enter a new password..">
                               <input type="password" name="pwd_repeat" placeholder="Repeat new password..">

                               <button name="reset_submit" type="submit" >Reset Password</button>
                            </fieldset>
                            
     
                          
                    
                        </form>
              <?php


         

           }


              

      }

   
    ?>

 </div>
  <div class="footer">

    <p>&copy;2020, All rights reserved by www.WebComs.lk</p>


  </div>


</body>
</html>