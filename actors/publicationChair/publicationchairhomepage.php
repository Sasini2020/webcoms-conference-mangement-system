<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
<!--<link rel="stylesheet" href="../../css/main_style.css">-->
</head>

	
<body>

<nav>
    <ul>
      <li><a href="publishcameracopy.php">Publish Camera ready copy guideline</a></li>
      <li><a href="uploadcoversub.php">Upload Cover Pages and sub page</a></li>
      <li><a href="viewcamerareadycopies.php">View Camera-ready copy</a></li>
      <li><a href="autoproceeding.php">Auto generate proceeding</a></li>
	  <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>

  <br><br>


	
	<div id="main-wrapper">
		<center>
			<h2>Publication Chair Home Page</h2>
			<h3> Welcome </h3>
			<img src="../../imgs/webc.png" class="avatar"/>
		</center>
	   
	</div>
  <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
			 
</body>
</html>
