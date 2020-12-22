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
  * {
  font-family: sans-serif; /* Change your font family */
}

</style>
<!--<style>
    

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

</style>-->
<style>
    /* Styles for two buttons in the form*/
    .button {
  background-color: #5DADE2; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

  </style>



<!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/reg_form_style.css">-->

<!--<link rel="stylesheet" href="../../css/main_style.css">-->

<!--<link rel="stylesheet" href="../../css/sty.css">-->
<link rel="stylesheet" href="../../css/nav_footer_styles.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/reg_form_style.css">
</head>

<!--<nav>
    <ul>
      <li><a href="publicationchairhomepage.php">Back</a></li>
      
    </ul>
  </nav>

  <br><br>-->


  <!-- navbar -->
<nav>
  <div class="logo">Web-COMS</div>
        <input type="checkbox" id="click">
              <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
              </label>
    <ul>
      <li><a href="publicationchairhomepage.php">Home</a></li>
			<li><a href="publishSubmissionGuidelines.php">Upload Guidelines For Paper Submission</a></li>
			<li><a href="uploadcoversub.php">Upload Pages</a></li>
			<li><a href="viewcamerareadycopies.php">View Camera-ready copy</a></li>
			<li><a class="active" href="autoproceeding.php">Auto generate proceeding</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>
<h2></h2><br>


<center>
      <h2>Auto-Genarate Procceding</h2>
       
       </center>




<br><br>

<body>
    <div id="container">
    <center>
      <!-- <a href="generate.php"><button class="button gen"  onclick="alert('Auto-genarate procceding Successfully')" > Generate<buttton></a>
      
       <a href="download.php"><button class="button gen" onclick="alert('Download Successfully')">Download<buttton></a>-->
    
    </div> 
  
    <form action="autoproceeding.php" method="post" enctype="multipart/form-data">
      <!--<center>
      <h2 style="color:#5DADE2;">Auto-Genarate Procceding</h2>
       
        <br><br>
       </center>-->
          
         <!-- <button type="submit" class="button "id="save_btn" name="submit">Upload</button><br><br>
          <button type="cancel" class="button" onclick="javascript:window.location='uploadcoversub.php';">Cancel</button>-->

          <a href="#"><button type="submit" class="button"  id="save_btn" name="generate" onclick="alert('Auto-genarate procceding Successfully')" > Generate<buttton></a>
      
       <a href="#"><button  type="submit" class="button" onclick="alert('Download Successfully')">Download<buttton></a>
      </form>
      </center>
    <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>


    
 </body>
</html>
