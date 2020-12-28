<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '5'){
    header('location:../../login.php');
  }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Profile</title>

		<link rel="stylesheet" href="../../css/nav_footer_styles.css">

		<link rel="stylesheet" href="../../css/reg_form_style.css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<style>
	/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
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
     


			<li><a class="active" href="trackchairhomepage.php">Home</a></li>
			<!--<li><a href="firstround.php">First-round paper evaluation</a></li>
      <li><a href="assignreviewrs.php">Assign Reviewers </a></li>
      <li><a href="trackchair_change_password.php">Change Password</a></li>-->
	    	  <li><a href="updateprofile.php">Update Profie</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		


    </ul>
  </nav>
	<br><br><br><br>

	<div id="main-wrapper">
		
		<form  action="updateprofile.php"method="post">

			<br><h1>Update Profile</h1>
			<fieldset>
      		<legend><span class="number"></span>Your Basic Information</legend><br>
			
      <label for="aTitle">Title:</label><br>
      <select name="acTitle" id="aTitle">
        <option value="Mr">Mr.</option>
        <option value="Ms">Ms.</option>
        <option value="Mrs">Mrs.</option>
        <option value="Miss">Miss.</option>
        <option value="Prof">Prof.</option>
        <option value="Dr">Dr.</option>
      </select>
      
      <label for="fname">Full Name:</label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
	 <label for="email">Email:</label><br>
			<input id="email" name="email" type="text" class="inputvalues" placeholder="Type your current Email" required/><br>
			


      <label for="aOrganization">Organization:</label><br>
			<input id="aOrganization" name="Organization" type="text" class="inputvalues" placeholder="Type your Organization" /><br>

      <br>
			

			<label for="ContactDetails">Contact No:</label><br>
			<input id="ContactDetails"  name="ContactDetails" type="tel" class="inputvalues" pattern="[0-9]{1}[0-9]{9}" placeholder="Type your Contact Number" title="Phone number with 0-9 and remaing 9 digit with 0-9"required/>
      
    
      <br>
		</fieldset>

	
			<button name="submit_btn" type="submit" id='btnValidate' value="Sign Up" >UPDATE</button><br>

		</form>



		<?php
			if(isset($_POST['submit_btn']))
			{
				

                $email= $_POST['email'];
				$aTitle = $_POST['acTitle'];
                $fullname =$_POST['fullname'];
				$Organization = $_POST['Organization'];
				$ContactDetails = $_POST['ContactDetails'];
				
                $query = "UPDATE userinfotable SET full_name = '$fullname',
                organization = '$Organization', contactdetails = '$ContactDetails'
                WHERE email = '$email'";
                $query_run = mysqli_query($con,$query);
				
				if($query_run)
                {
                  echo '<script type="text/javascript"> 
                     alert("Update Successfully.");
                  </script>';
                }
			
					
            }
        ?>
	</div>

	


<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>

</html>
