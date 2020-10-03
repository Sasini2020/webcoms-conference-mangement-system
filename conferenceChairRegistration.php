<?php
  session_start();
  require 'dbconfig/config.php';
  if($_SESSION['login_s'] != '1'){
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html>
<head>

    <title>Conference Chair Registration</title>

    <link rel="stylesheet" href="css/main_style.css">
    <link rel="stylesheet" href="css/main_style.css">
	<link rel="stylesheet" href="css/sty.css">

</head>
<body>
  
  <nav>
    <ul>
      <li><a href="adminhomepage.php">Back to Home</a></li>
    </ul>    
  </nav>
  <br><br>

	<!--Conference Chair Registration form-->
	<div id="main-wrapper">
		<center>
			<h2>Conference Chair Registration Form</br><br><br></h2>	
		</center>
	
		<form class="myform" action="conferenceChairRegistration.php"method="post">
			<label for="fname"><b>Full Name:</b></label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<label><b>Gender:</b></label>
			<input id="Gmale" type="radio" class="radiobtns" name="gender" value="male" checked required> 
			<label for="Gmale">Male</label>
			<input id="GFemale" type="radio" class="radiobtns" name="gender" value="female" required>
			<label for="GFemale">Female</label><br>

            <input type="hidden" name="usertype" value="Conference_chair">
			
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