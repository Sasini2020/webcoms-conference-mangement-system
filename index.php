<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
.p {
	color:white;
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("try.jpg");
  height: 20%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
</style>
    <title> WebCOMS - Conference Management System </title>

    <!--<link rel="stylesheet" href="css/sty.css">
    <link rel="stylesheet" href="css/mychanged.css">
    <link rel="stylesheet" href="css/styleNavbar.css">-->

    <link rel="stylesheet" href="css/main_style.css">
  
  </head>

<body>

 <div class="hero-image"> 
  <!--Navigation bar-->
  <nav>
    <ul>
      <li><a class="active" href="index.php">WebCOMS</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="help.php">Help</a></li>
      <li><a href="contactUs.php">Contact Us</a></li>
    </ul>
    <br /><br />
  </nav>
  <div class="hero-text">
    <h1 style="font-size:50px">Web-COMS</h1>
    <p>Conference management system</p>
  </div>

  </div>

 
</body>
</html>
