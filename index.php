<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
 <head>
 
 
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> WebCOMS - Conference Management System </title>

    <!--<link rel="stylesheet" href="css/sty.css">
    <link rel="stylesheet" href="css/mychanged.css">
    <link rel="stylesheet" href="css/styleNavbar.css">-->


    <link rel="stylesheet" href="css/table_style.css">
	  <link rel="stylesheet" href="css/about_help_styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


  </head>

<body>


  <!--Navigation bar-->
 <nav>
 <div class="logo">Web-COMS</div>
 <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
		<ul>
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="About.php">About</a></li>
		</ul>
		
	</nav>
  <br><br>
  


  </br></br></br>
  <!-- Start of the Top content -->
  <section class="content">
      <section>Web-COMS Conference Management System</section><br>
        <p>Web-coms can cater to your multiple requirements proficiently.
          Web-coms is a solution that aids in the organization of 
          conferences. With this unique software, you can easily manage
            members of a conference management system on one platform.
          <br><br>"We are incredibly responsive to your requests and value your questions."</p>
    </section>
<!-- End of Top content -->
<?php
            if(isset($_GET["newpwd"])){
                 if($_GET["newpwd"]=="passwordupdated"){

                   echo '<script type="text/javascript">alert("Password Reset  Successfully!!")</script>';


                 }

            }
        
       ?>

  <?php
        include "forhomepage-conferenceList.php";
	?>

<!-- Start of the footer -->
  <div class="footer">
      <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
  </div><!-- End of the footer -->

</body>
</html>
