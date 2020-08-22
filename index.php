<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title> WebCOMS - Conference Management System </title>

    <!--<link rel="stylesheet" href="css/sty.css">
    <link rel="stylesheet" href="css/mychanged.css">
    <link rel="stylesheet" href="css/styleNavbar.css">-->

    <link rel="stylesheet" href="css/main_style.css">
  
  </head>

<body>

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

  <p> WebComs Home page </p>

</body>
</html>
