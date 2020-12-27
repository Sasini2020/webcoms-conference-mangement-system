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
  <h1>Forgot Your Password  </h1>
  <br><br>
 <div id="main-wrapper"> 
    <form action="reset_request_password.php" method="post" class="myform">
      <!--<h2> Enter your Email</h2><br>-->
       <fieldset>
          <label for="actor">Select User Type:</label><br>
          <select id="actor" class="" name="usertype">
              <option value="">--Select User Type--</option>
              <option value="Conference_chair">Conference Chair</option>
              <option value="TrackChair">Track Chair</option>
              <option value="Reviewer">Reviewer</option>
              <option value="PublicationChair">Publication Chair</option>
          
          
          
          </select><br>


          <label >Enter your Email</label><br>
         <input id="uname" name="email" type="text" placeholder="E-mail"/><br>

         <button name="reset_btn" type="submit" id="submit_btn" value="Submit">Submit</button>
       </fieldset>
    </form>
       <?php
            if(isset($_GET["reset"])){
                 if($_GET["reset"]=="success"){

                      echo '<p style="color:red; text-align:center" >Check your email</p>';


                 }

            }
         



       ?>



 </div>
  <div class="footer">

    <p>&copy;2020, All rights reserved by www.WebComs.lk</p>


  </div>


</body>
</html>