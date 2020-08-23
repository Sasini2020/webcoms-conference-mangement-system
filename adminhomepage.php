<?php
	session_start();
	if($_SESSION['login_s'] != '1'){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>

	<link rel="stylesheet" href="css/main_style.css">

	<!--<link rel="stylesheet" href="css/sty.css">

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
	.logout_btn{
		margin-top:10px;
		background-color:#DC143C;
		padding:5px;
		border-radius:28px;
		color:white;
		width:40%;
		text-align:center;
		font-size:18px;
		font-weight:bold;
		margin-bottom:20px;
	}
	</style>-->
</head>

<body>

	<nav>
		<ul>
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
			<li><a href="requested_conferences.php">Requested conferences</a></li>
			<li><a href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<!--<li><a href="help.html">Help</a></li>
			<li><a href="contactUs.html">Contact Us</a></li>-->	
		</ul>
		</br></br>
	</nav>

	<div>
		<form action="adminhomepage.php" method="post">
			<input type="submit" name="logout" value="Log Out" />
		</form>
		<?php
			if(isset($_POST['logout'])){
				session_destroy();
				header('location:index.php');
			}
		?>
	</div>
	
	<div id="main-wrapper">
		<center>
			<h2>Admin Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<!--	
		<form class="myform" action="adminhomepage.php" method="post">
		
		</form>-->

	</div>
</body>
</html>
