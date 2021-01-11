<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '4'){
    header('location:../../login.php');
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conference Chair Home</title>
  
  
   <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
	    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
      <link rel="stylesheet" href="../../css/DropDownListToNav.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
 <style>
.dot {
  height: 8px;
  width: 8px;
  background-color: #86B0DD;
  border-radius: 50%;
  margin-bottom:2px;
  margin-left:28px;
  margin-right:5px;
  display: inline-block;
}
</style>

</head>
<body>

<nav>
  <div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    <ul>
	  <li><a class="active" href="conferencechairhomepage.php">Home</a></li>
      <li><a href="create_conference.php">Request Conference</a></li>
      <!--<li><a href="viewConferencesForCC.php">View Conf</a></li>
      <li><a href="addnotemplates.php">Add notification templates</a></li>
      <li><a href="upudetauls.php">Upload User Details</a></li>-->
	    <li><a href="registerUsers.php">User Registration</a></li>
	    <!--<li><a href="updateprofile.php">Update Profile</a></li>
      <li><a href="con_change_password.php">Change Password</a></li>-->
      <li class="dropdown">				
					<a href="#" class="dropdown">Profile <i class="fa fa-caret-down"></i></a>
					
					<div class="dropdown-content">
						<a href="updateprofile.php">Update profile</a>
						<a href="con_change_password.php">Change Password</a>
						<a href="../logout.php">Log Out</a>
					</div>
			</li>

    </ul>
  </nav>



  <div id="main-wrapper">
		
		   
	</div>

  <?php
        include "viewConferencesForCC.php";
	?>

  <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>


</body>
</html>
