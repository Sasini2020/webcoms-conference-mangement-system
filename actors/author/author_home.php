<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Author Home</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <!--<link rel="stylesheet" href="../../css/main_style.css">-->
</head>
<body>
<nav>
    <ul>
      <li><a href="ConferenceListForA.php">Conference List</a></li>
      <li ><a style="float:right; margin-right:40px" href="../logout.php">Log Out</a></li>
    </ul>
  </nav>

  <br><br>

    <div id="main-wrapper">
		<center>
			<h2>Author Home Page</h2>
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
