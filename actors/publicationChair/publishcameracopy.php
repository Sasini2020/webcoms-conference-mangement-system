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

<!--<link rel="stylesheet" href="../../css/main_style.css">
<link rel="stylesheet" href="../../css/sty.css">-->

</head>

 
<nav>
    <ul>
      <li><a href="publicationchairhomepage.php">Back</a></li>
      
    </ul>
  </nav>

  <br><br>

 <center>
   <h1>Publish guidelines for Camera ready copy Submission</h1>  

  </center>
<br><br>


<body>

   <div id="container">
       <form action="" method ="POST">
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
