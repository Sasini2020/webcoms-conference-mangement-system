<?php
	session_start();

	require '../../dbconfig/config.php';

	if($_SESSION['login_s'] != '4'){
		header('location:../../login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Create a new conference</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/nav_footer_styles.css">


</head>
<body>

	<nav>
	<div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
		<ul>
			<li><a class="active" href="create_conference.php">Create a Conference</a></li>
			<li><a href="conferencechairhomepage.php">Back to Home</a></li>
			
		</ul>
	</nav>

	<br><br><br>
	<div id="main-wrapper">
		
		<form action="create_conference.php"method="post">
			<br><h1>Create a Conference</h1>

			<label>Conference Name:</b></label><br>
			<input name="name" type="text" class="inputvalues" placeholder="Type your conference's title" required/><br>
			
			<label>Venue:</b></label><br>
			<input name="venue" type="text" class="inputvalues" placeholder="Venue" required/><br>
			
			<label >Start date:</b></label><br>
			<input name="start_date" required type="date" class="inputvalues" placeholder="dd-mm-yyyy" min="2020-12-15" required/><br>
			
			<label>End date:</b></label><br>
			<input name="end_date" type="date" class="inputvalues" placeholder="dd-mm-yyyy" min="2021-01-15" required/><br>
			
			<label>Dead line:</b></label><br>
			<input name="deadline" type="date" class="inputvalues" placeholder="dd-mm-yyyy" min="2021-02-15" required/><br>
			
			<label>Sponsor/s details:</b></label><br>
			<input name="sponsor_details" type="text" class="inputvalues" cols="30" placeholder="Sponsor's details" required/><br>

			<!-- <input name="create_btn" type="submit" id="register_btn" value="CREATE"/><br> -->
			<button name="create_btn" type="submit" id="register_btn" value="CREATE">Create</button><br>

			<!--<a href="conferencechairhomepage.php"><input type="button" id="back_btn" value="Back"/></a>-->
		</form>
		
		<?php
			if(isset($_POST['create_btn']))
			{				
				$name =$_POST['name'];
				$venue = $_POST['venue'];
				$start_date = $_POST['start_date'];
				$end_date = $_POST['end_date'];
				$deadline = $_POST['deadline'];
				$sponsor_details = $_POST['sponsor_details'];
				$c_Email = $_SESSION['c_email'];			
		
				//$query= "select * from conferences '";
				//$query_run = mysqli_query($con,$query);					
					
				$query= "insert into conferences values(NULL,'$name','$venue','$start_date','$end_date','$deadline','$sponsor_details','0','$c_Email')";
				$query_run = mysqli_query($con,$query);
						
				if($query_run)
					{
						echo '<script type="text/javascript"> alert("Your conference was created..Admin will inform you more details") </script>';
					}
				else
					{
						echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
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
