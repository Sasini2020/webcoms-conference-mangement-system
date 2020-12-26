<?php
	session_start();
	if($_SESSION['login_s'] != '1'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>

    <title>Conference Chair Registration</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
</head>
	

<body>


	<nav>
	
	  <div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
	
		<ul>
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
			<li><a class="active" href="adminhomepage.php">Home</a></li>
			<li><a href="requested_conferences.php">Requested conferences</a></li>
			<li><a href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a href="conferenceChairRegistration.php">Conference Chair Registration</a></li>
			<li><a href="conferenceTrackDefine.php">Conference Track Defination</a></li>
			<!--<li><a href="admin_change_password.php">Change Password</a></li>-->
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		</ul>

	</nav>
	
<center>

	<?php
        include "forhomepage-conferenceL.php";
	?>
	</br></br></br></br>
	<?php
        include "forhomepage-rauthorD.php";
	?>
	</br></br></br></br></br></br></br></br>
</center>


     <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
     </div>
		
</body>
</html>
