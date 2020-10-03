<?php
	require 'dbconfig/config.php';
?>		

<!DOCTYPE html>
<html>
	<head>
		<title>Registration</title>

		<link rel="stylesheet" href="css/main_style.css">
		<link rel="stylesheet" href="css/sty.css">
		
		<!--<link rel="stylesheet" href="css/sty.css">
		<link rel="stylesheet" href="css/styleNavbar.css">

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
		</style>
		-->
</head>

<body>

	<!--Navigation bar -->
	<nav>
		<ul>
		<li><a class="active" href="index.php">WebCOMS</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="contactUs.php">Contact Us</a></li>
		</ul>
		<br /><br />
	</nav>

	<!--Registration form-->
	<div id="main-wrapper">
		<center>
			<h2>Registration Form</br><br><br></h2>	
		</center>
	
		<form class="myform" action="register.php"method="post">
			<label for="fname"><b>Full Name:</b></label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<label><b>Gender:</b></label>
			<input id="Gmale" type="radio" class="radiobtns" name="gender" value="male" checked required> 
			<label for="Gmale">Male</label>
			<input id="GFemale" type="radio" class="radiobtns" name="gender" value="female" required>
			<label for="GFemale">Female</label><br>
			
			<label for="actor"><b>User Role: </b></label>
				<select id="actor" class="" name="usertype">
					<option value="Author">Author</option>
					<option value="Reviewer">Reviewer</option>
				</select><br>
			
			<label for="Email"><b>Email:</b></label><br>
			<input id="Email" name="email" type="text" class="inputvalues" placeholder="Type your email" required/><br>
			
			<label for="passW"><b>Password:</b></label><br>
			<input id="passW" name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			
			<label for="CpassW"><b>Confirm Password:</b></label><br>
			<input id="CpassW" name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<!--<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>-->
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';

				$fullname =$_POST['fullname'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				$gender = $_POST['gender'];
				$usertype = $_POST['usertype'];

				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$fullname.' ---'.$username.' --- '.$password.' --- '.$gender.' --- '.$qualification.'"  ) </script>';

				if($password==$cpassword)
				{
					$encrypted_pass = md5($password);	//password encrypted

					$query= "select * from userinfotable WHERE email='$email'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same email
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query= "insert into userinfotable (email, full_name, gender, user_type, password) 
						values('$email','$fullname','$gender','$usertype','$encrypted_pass')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}
				
				
				
				
			}
		?>
	</div>

</body>
</html>
