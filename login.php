<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>

		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<!-- <link rel="stylesheet" href="css/main_style.css"> -->
		<link rel="stylesheet" href="css/nav_footer_styles.css">
		<link rel="stylesheet" href="css/reg_form_style.css">

	</head>

<body>
	
	<!--Navigation bar -->
	<nav>
	<div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a class="active" href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="About.php">About</a></li>
		</ul>
	</nav>
<br><br><br><br>
	<!-- Login Form -->
	<div id="main-wrapper">
		
		<form action="login.php" method="post" class="myform" >
			<br><h1>Log In</h1>
			<fieldset>
				<input id="Uname" name="email" type="text" placeholder="E-mail"/><br>
				<input id="UpassW" name="password" type="password" placeholder="Password"/>


			<button name="login" type="submit" id="login_btn" value="Login">login</button>
			<!--<p style="text-align:center;" class="message">Not registered? <a style="text-decoration:none;color:dodgerblue" href="register.php">Create an account</a></p>-->

			<p style="text-align:center;" class="message"> <a style="text-decoration:none;color:dodgerblue" href="forgetpassword.php">Forgot your password? </a> &nbsp;|&nbsp; New to Web-Coms? <a style="text-decoration:none;color:dodgerblue" href="register.php">Register</a></p>
			
			</fieldset>
		</form>
  		</div>

		<?php
			if(isset($_POST['login']))
			{
				$email=$_POST['email'];
				$password=$_POST['password'];
				
				$encrypted_password = md5($password);
				
				//$query="select * from userinfotable WHERE email='$email' AND password='$password'";
				
				$select_query = mysqli_query($con, "select * from userinfotable WHERE email='$email' AND password='$encrypted_password'");
				$select_row = mysqli_fetch_assoc($select_query);
				$user_type = $select_row['user_type'];
				
				//$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($select_query)>0)
				{
					// valid
					//$_SESSION['email']= $email;

					if($user_type=="Admin"){
						$_SESSION['login_s'] = '1';
						$_SESSION['ad_email'] = $email;
						header('location:actors/admin/adminhomepage.php');
					}
					else if($user_type=="Reviewer"){
						$_SESSION['login_s'] = '2';
						$_SESSION['r_email'] = $email;
						header('location:actors/reviewer/reviewerhomepage.php');
					}
					else if($user_type=="Author"){
						$_SESSION['login_s'] = '3';
						$_SESSION['au_email'] = $email;
						header('location:actors/author/Author_home.php');
					}
					else if($user_type=="Conference_chair"){
						$_SESSION['login_s'] = '4';
						$_SESSION['c_email'] = $email;
						header('location:actors/conferenceChair/conferencechairhomepage.php');
					}
					else if($user_type=="TrackChair"){
						$_SESSION['login_s'] = '5';
						$_SESSION['t_email']=$email;
						header('location:actors/trackChair/trackchairhomepage.php');
					}
					else if($user_type=="PublicationChair"){
						$_SESSION['login_s'] = '6';
						$_SESSION['p_email'] = $email;
						header('location:actors/publicationChair/publicationchairhomepage.php');
					}
					else{
						echo '<script type="text/javascript"> alert("Invalid User") </script>';
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
     
    <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
