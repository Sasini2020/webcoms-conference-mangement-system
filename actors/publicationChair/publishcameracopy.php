<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="../../css/nav_footer_styles.css">
<link rel="stylesheet" href="../../css/reg_form_style.css">



<!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/reg_form_style.css">-->

<!--<link rel="stylesheet" href="../../css/main_style.css">
<link rel="stylesheet" href="../../css/sty.css">-->

</head>
<style>
  * {
  font-family: sans-serif; /* Change your font family */
}

</style>
 
<!--<nav>
    <ul>
      <li><a href="publicationchairhomepage.php">Back</a></li>
      
    </ul>
  </nav>

  <br><br>--->

  <!-- navbar -->
<nav>
  <div class="logo">Web-COMS</div>
        <input type="checkbox" id="click">
              <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
              </label>
    <ul>
    <li><a href="publicationchairhomepage.php">Back</a></li>
    <li><a class="active" href="publishcameracopy.php">Publish guidelines</a></li>
    <li><a href="../../About.php">About</a></li>
    <li><a href="../../help.php">Help</a></li>

    </ul>
  </nav>
<h2></h2><br>

 
<br><br>
        <center>
            <h2>Publish guidelines for Camera ready copy Submission</h2>
        </center>
        <br><br>

<body>

   <div id="container">
   
       <form action="publishcameracopy.php" method ="POST">
       
        <!--<center>
            <h2 style="color:#5DADE2;">Publish guidelines for Camera ready copy Submission</h2>
        </center>-->
      <br><br>
       <center>
            <textarea rows="4" cols="50" name="comment"> Add guideline here </textarea>
            
             
             <button type="submit" class="button "id="save_btn" name="submit">Publish</button>
  
       </center> 
        </form>
    </div>
        <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
 </body>
</html>
