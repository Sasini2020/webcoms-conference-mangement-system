<?php
  session_start();
  if($_SESSION['login_s'] != '4'){
    header('location:../../login.php');
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Conference Chair Home</title>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <!--<link rel="stylesheet" href="../../css/main_style.css">
  <link rel="stylesheet" href="css/sty.css">

  <style>
  body {
    margin: 0;
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
  }

  li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
  }

  li a.active {
    background-color: #6495ED;
    color: white;
  }

  li a:hover:not(.active) {
    background-color: #555;
    color: white;
  }
  </style>-->



</head>
<body>

  <nav>
    <ul>
      <!--<li><a class="active" href="conferencechairhomepage.php">WebCOMS</a></li>-->
      <li><a href="create_conference.php">Create a Conference</a></li>
      <li><a href="viewConferencesForCC.php">View Conferences</a></li>
      <li><a href="#conferences_view.php">Define notification templates</a></li>
      <li><a href="#authordetails.php">Bulk Upload User Details</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
      <!--<li><a href="#help.html">Send messages</a></li>
      <li><a href="#contactUs.html">Add Conference Guideline Details</a></li>
      <li><a href="index.php">Log Out</a></li>-->
    </ul>
  </nav>

  <br>
  <br>

  <br><br>

  <div id="main-wrapper">
		<center>
			<h2>Conference Chair Home Page</h2>
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
