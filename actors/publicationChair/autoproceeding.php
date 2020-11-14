<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<style>
    

.button {
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.gen {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.gen:hover {
  background-color: #008CBA;
  color: white;
}
.down {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.down:hover {
  background-color: #008CBA;
  color: white;
}

</style>

<!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/reg_form_style.css">-->

<link rel="stylesheet" href="../../css/main_style.css">
<link rel="stylesheet" href="../../css/sty.css">
<link rel="stylesheet" href="../../css/nav_footer_styles.css">
</head>

<nav>
    <ul>
      <li><a href="publicationchairhomepage.php">Back</a></li>
      
    </ul>
  </nav>

  <br><br>


<center>
  <h1>Auto-genarate procceding</h1>

</center>

<br><br>

<body>
    <div id="container">
    <center>
       <a href="generate.php"><button class="button gen"  > Generate<buttton></a>
      
       <a href="download.php"><button class="button gen">Download<buttton></a>
    </center>
    </div> 
  

    <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>


    
 </body>
</html>
