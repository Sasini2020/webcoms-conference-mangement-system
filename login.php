<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>


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



<body style="background-color:#ffff">

     <link rel="stylesheet" href="css/mychanged.css">

<title>Created conferences by conference chairs</title>
	<link rel="stylesheet" href="css/styleNavbar.css">

</head>
<body>
<!-- Remove commenting and get multicolorsfor backgorund
<div class="filter">
</div>	 -->
<div>


<ul>
  <li><a class="active" href="index.php">WebCOMS</a></li>
	<li><a href="index.php">Home</a></li>
	<li><a href="login.php">Login</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a href="help.html">Help</a></li>
	<li><a href="contactUs.html">Contact Us</a></li>
</ul>

</br></br>

</div>

       
	
	<div id="main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<form class="myform" action="login.php" method="post">
			<label><b>Email:</b></label><br>
			<input name="email" type="text" class="inputvalues" placeholder="Type your email" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
			<input name="login" type="submit" id="login_btn" value="Login"/><br>
			
		</form>
		<?php
		if(isset($_POST['login']))
		{
			$email=$_POST['email'];
			$password=$_POST['password'];
			
			
			//$query="select * from userinfotable WHERE email='$email' AND password='$password'";
			
			$select_query = mysqli_query($con, "select * from userinfotable WHERE email='$email' AND password='$password'");
            $select_row = mysqli_fetch_assoc($select_query);
            $qualification = $select_row['qualification'];
			
			//$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($select_query)>0)
			{
				// valid
				$_SESSION['email']= $email;
				if($qualification=="Admin"){
					header('location:adminhomepage.php');
				}
				else if($qualification=="Reviewer"){
					header('location:reviewerhomepage.php');
				}
				else if($qualification=="Author"){
					header('location:authorhomepage.php');
				}
				else if($qualification=="Conference_chair"){
					header('location:conferencechairhomepage.php');
				}
				
				
			}
			else
			{
				// invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>
		
	</div>
	
	
	
	
	
	
	
	
</body>
</html>