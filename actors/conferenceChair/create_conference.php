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
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Request a new conference</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">

 <!-- styles for dots in paragraphs -->
 <style>
.dot {
  height: 8px;
  width: 8px;
  background-color: #86B0DD;
  border-radius: 50%;
  margin-bottom:2px;
  margin-left:28px;
  margin-right:5px;
  display: inline-block;
}
</style>
</head>
<body>

	<nav>
  <div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    <ul>
	  <li><a href="conferencechairhomepage.php">Home</a></li>
      <li><a class="active" href="create_conference.php">Request a Conf</a></li>
      <!--<li><a href="viewConferencesForCC.php">View Conf</a></li>-->
      <li><a href="addnotemplates.php">Add notification templates</a></li>
      <li><a href="upudetauls.php">Upload User Details</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>

	<br>
	<div id="main-wrapper">
		
		<h2 style="margin-left:25px;color:dodgerblue;">New Conference Request</h2><br>
		<p style="margin-left:25px;margin-bottom:29px;color:#283747;font-weight:400;">In order to have a conference site in Web-COMS, you will need to request one.
		Once you submit the request for your conference, it can take up to 72 hours for the conference site to be created.
		Once the request is approved and the conference site created, you will receive an email with all the information pertaining to your conference. </p>

		<h3 style="margin-left:25px;color:dodgerblue;">Criteria For Submission</h3><br>
		
		<p style="margin-left:25px;margin-bottom:15px;color:#283747;font-weight:500;">
		Before clicking "Submit" to save your request, please make sure that you use the correct information in the correct format for the conference.
		</p>

		<p style="margin-left:25px;color:#283747;font-weight:400;">
		
			<span class="dot"></span>
			Enter the <span style='color: dodgerblue;font-weight:500;'>full title</span> of the conference
			<br>
			<span class="dot"></span>
			<!-- I used span for color words in p tag -->
			Use <span style='color: dodgerblue;font-weight:500;'>mm/dd/yyyy</span> format for dates (Start Date, End Date, Paper Submission Due Date) for site request.
			For example, Feb 1st, 2021 would be 02/01/2021.
		</p>
		<br>

		<h3 style="margin-left:25px;color:dodgerblue;">Request Form</h3>

		<form action="create_conference.php"method="post">
			<br><h1>Request a Conference</h1>

			<label>Conference Name*</b></label><br>
			<input name="name" type="text" class="inputvalues" placeholder="Type your conference's title" required/><br>
			
			<label>Venue*</b></label><br>
			<input name="venue" type="text" class="inputvalues" placeholder="Venue" required/><br>
			
			<label >Conference Start Date*</b></label><br>
			<input name="start_date" required type="date" class="inputvalues" placeholder="dd-mm-yyyy" min="2020-12-15" required/><br>
			
			<label>Conference End Date*</b></label><br>
			<input name="end_date" type="date" class="inputvalues" placeholder="dd-mm-yyyy" min="2021-01-15" required/><br>
			
			<label>Paper Submission Due Date*</b></label><br>
			<input name="deadline" type="date" class="inputvalues" placeholder="dd-mm-yyyy" min="2021-02-15" required/><br>
			
			<label>Sponsor/s details*</b></label><br>
			<input name="sponsor_details" type="text" class="inputvalues" cols="30" placeholder="Sponsor's details"/><br>

			<!-- <input name="create_btn" type="submit" id="register_btn" value="CREATE"/><br> -->
			<button name="create_btn" type="submit" id="register_btn" value="CREATE">Submit</button>
			<button type="cancel" class="button" onclick="javascript:window.location='create_conference.php'">Cancel</button>

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
