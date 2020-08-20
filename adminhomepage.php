<?php
	session_start();
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
.logout_btn{
	margin-top:10px;
	background-color:#DC143C;
	padding:5px;
	border-radius:28px;
	color:white;
	width:10%;
	text-align:center;
	font-size:18px;
	font-weight:bold;
	margin-bottom:20px;
}
</style>


<title>Admin Home Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#ffff">


<div>


<ul>
  <li><a class="active" href="index.php">WebCOMS</a></li>
	<li><a href="conferences_view.php">Conferences</a></li>
	<li><a href="authordetails.php">Author details</a></li>
	<li><a href="help.html">Help</a></li>
	<li><a href="contactUs.html">Contact Us</a></li>
</ul>

</br></br>

</div>

	
	<div id="main-wrapper">
		<center>
			<h2>Admin Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<form class="myform" action="adminhomepage.php" method="post">
			

			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
			
			
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}

		?>
	</div>
</body>
</html>
