<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>




<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #6495ED;
}
</style>






<title>Login Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>


     <link rel="stylesheet" href="css/mychanged.css">

<title>Created conferences by conference chairs</title>
	<link rel="stylesheet" href="css/styleNavbar.css">

</head>
<body style="background-color:#ffff">

<div>


<ul>
  <li><a class="active" href="index.php">WebCOMS</a></li>
	<li><a href="login.php">Login</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a href="help.html">Help</a></li>
	<li><a href="contactUs.html">Contact Us</a></li>
</ul>

</br></br>

</div>


	
	
</body>
</html>
