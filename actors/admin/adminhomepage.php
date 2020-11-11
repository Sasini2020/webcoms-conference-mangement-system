<?php
	session_start();
	if($_SESSION['login_s'] != '1'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>

	<link rel="stylesheet" href="../../css/main_style.css">
	<link rel="stylesheet" href="../../css/style_footer.css">
	<link rel="stylesheet" href="../../css/table_style.css">
	
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
  height: 30%;
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


</head>
	

<body>
<div class="hero-image"> 

	<nav>
		<ul>
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
			<li><a href="adminhomepage.php">Home</a></li>
			<li><a href="requested_conferences.php">Requested conferences</a></li>
			<li><a href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a href="conferenceChairRegistration.php">Conference Chair Registration</a></li>
			<li>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
			&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
			&ensp;&ensp;&ensp;&ensp;&ensp;</li>
			<li><a href="../../index.php">Log Out</a></li>
		

	</nav>
	
<div class="hero-text">
</br>
    <h5 style="font-size:30px">Admin</h5>
</div>

	
	


	
	</br></br></br></br></br></br></br></br></br></br></br></br>

<center>
	<?php
        include "forhomepage-reqC.php";
	?>
	</br></br></br></br>
	<?php
        include "forhomepage-conferenceL.php";
	?>
	</br></br></br></br>
	<?php
        include "forhomepage-rauthorD.php";
	?>
	</br></br></br></br></br></br></br></br>
</center>
<h5 style="color:white; padding:20px; margin:0; text-align:center; background-color:#063247">WebCOMS @2020</h5>
</body>
</html>
