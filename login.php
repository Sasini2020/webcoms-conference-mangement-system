<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>

		<!--<link rel="stylesheet" href="css/sty.css">
		<link rel="stylesheet" href="css/mychanged.css">
		<link rel="stylesheet" href="css/styleNavbar.css">-->

		<link rel="stylesheet" href="css/main_style.css">
		<link rel="stylesheet" href="css/sty.css">

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

	<!-- Login Form -->
	<div id="main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<form class="myform" action="login.php" method="post">
			<label for="Uname"><b>Email:</b></label><br>
			<input id="Uname" name="e mail" type="text" class="inputvalues" placeholder="Type your email" required/><br>
			
			<label for="UpassW"><b>Password:</b></label><br>
			<input id="UpassW" name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
			
			<input name="login" type="submit" id="login_btn" value="Login"/><br>
			
		</form>

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
						header('location:actors/admin/adminhomepage.php');
					}
					else if($user_type=="Reviewer"){
						$_SESSION['login_s'] = '2';
						header('location:actors/reviewer/reviewerhomepage.php');
					}
					else if($user_type=="Author"){
						$_SESSION['login_s'] = '3';
						header('location:actors/author/Author_home.php');
					}
					else if($user_type=="Conference_chair"){
						$_SESSION['login_s'] = '4';
						$_SESSION['c_email'] = $email;
						header('location:actors/conferenceChair/conferencechairhomepage.php');
					}
					else if($user_type=="TrackChair"){
						$_SESSION['login_s'] = '5';
						header('location:actors/trackChair/trackchairhomepage.php');
					}
					else if($user_type=="PublicationChair"){
						$_SESSION['login_s'] = '6';
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
	
</body>
</html>
