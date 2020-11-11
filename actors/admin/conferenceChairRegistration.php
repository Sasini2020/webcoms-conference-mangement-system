<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '1'){
    header('location:../../login.php');
  }
?>

<!DOCTYPE html>
<html>
<head>

    <title>Conference Chair Registration</title>

    <link rel="stylesheet" href="../../css/main_style.css">
	<link rel="stylesheet" href="../../css/style_footer.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
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
    <h5 style="font-size:30px">Conference Chair Registration</h5>
</div>
  <br><br><br><br><br><br><br><br><br><br>
  

	<!--Conference Chair Registration form-->
	<div id="main-wrapper">
		<!-- <center>
			<h2>Conference Chair Registration Form</br><br><br></h2>	
		</center> -->
	
		<form action="conferenceChairRegistration.php" method="post">
		<br><br>
		
			<fieldset>
      		<legend><span class="number">1</span>Personal Information</legend><br>
		
			<label for="fname">Full Name:</label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<label>Gender:</label><br>
			<input id="Gmale" type="radio" name="gender" value="male" checked required> 
			<label for="Gmale" class="light">Male</label><br>
			<input id="GFemale" type="radio" name="gender" value="female" required>
			<label for="GFemale" class="light">Female</label><br>

            <input type="hidden" name="usertype" value="Conference_chair">
			</fieldset>
		<fieldset>
      	<legend><span class="number">2</span>Login Information</legend><br>
			<label for="Email">Email:</label><br>
			<input id="Email" name="email" type="text" class="inputvalues" placeholder="Type your email" required/><br>
			
			<label for="passW">Password:</label><br>
			<input id="passW" name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			
			<label for="CpassW">Confirm Password:</label><br>
			<input id="CpassW" name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
		</fieldset>
	
			<button name="submit_btn" type="submit" id="signup_btn" value="Sign Up">Register</button<br>
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

						$query2= "insert into conferencechair 
									values('$email','$fullname','$gender','$encrypted_pass','$email')";
						$query_run2 = mysqli_query($con,$query2);
						
						if($query_run and $query_run2)
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

	</div>
		</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
	</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
	</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
	<h5 style="color:white; padding:20px; margin:0; text-align:center; background-color:#063247">WebCOMS @2020</h5>	

</body>
</html>
