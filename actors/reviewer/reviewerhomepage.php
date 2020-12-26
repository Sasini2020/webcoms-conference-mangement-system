<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<?php 
//include 'filesLogic.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Reviewer Home</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/table_style.css">

</head>
    
<body>

  <nav>
  <div class="logo">Web-COMS</div>
  <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    
    <ul>
      
		 <li><a class="active" href="reviewerhomepage.php">Home</a></li>
      <li><a href="ConferenceListForR.php">Conference List</a></li>
			<li><a href="paperlist.php">Review papers</a></li>
      <!--<li><a href="rev_change_password.php">Change Password</a></li>-->
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		
    </ul>
  </nav>

  <br>
	<div id="main-wrapper">

      <!-- <h2 style="color:#283747 ;margin-left:20px;">Assigned Research Papers</h2> -->

	   
	</div>
   <!-- Footer section -->
	 <div class="footer">
      <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
   </div>
 
</body>   
</html>
