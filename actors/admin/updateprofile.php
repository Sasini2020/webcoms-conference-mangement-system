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
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
			<li><a class="active" href="adminhomepage.php">Back to Home</a></li>
			<!--<li><a href="requested_conferences.php">Requested conferences</a></li>
			<li><a href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a href="conferenceChairRegistration.php">Conference Chair Registration</a></li>
			<li><a href="conferenceTrackDefine.php">Conference Track Defination</a></li>
		        <li><a href="updateprofile.php">Update Profie</a></li>
			<li><a href="admin_change_password.php">Change Password</a></li>-->
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		</ul>

	</nav>
	<br><br><br><br>

	<div id="main-wrapper">
		
		<form  action="updateprofile.php"method="post">

			<br><h1>Update Profile</h1>
			<fieldset>
      		<legend><span class="number"></span>Your Basic Information</legend><br>

      <?php
        $email=$_SESSION['ad_email'];
        $user_type='Admin';

        $query_result = mysqli_query($con,"select * from userinfotable where (email='$email') and (user_type='$user_type')");
        $row = mysqli_fetch_assoc($query_result);
      ?>
			
      <label for="aTitle">Title:</label><br>
      <?php
          switch($row['title']){
            case "Mr":
              $op0 = "";$op1 = "selected";$op2 = "";$op3 = "";$op4 = "";$op5 = "";$op6 = "";
              break;
            case "Ms":
              $op0 = "";$op1 = "";$op2 = "selected";$op3 = "";$op4 = "";$op5 = "";$op6 = "";
              break;
            case "Mrs":
              $op0 = "";$op1 = "";$op2 = "";$op3 = "selected";$op4 = "";$op5 = "";$op6 = "";
              break;
            case "Miss":
              $op0 = "";$op1 = "";$op2 = "";$op3 = "";$op4 = "selected";$op5 = "";$op6 = "";
              break;
            case "Prof":
              $op0 = "";$op1 = "";$op2 = "";$op3 = "";$op4 = "";$op5 = "selected";$op6 = "";
              break;
            case "Dr":
              $op0 = "";$op1 = "";$op2 = "";$op3 = "";$op4 = "";$op5 = "";$op6 = "selected";
              break;
            default:
              $op0 = "selected";$op1 = "";$op2 = "";$op3 = "";$op4 = "";$op5 = "";$op6 = "";
          }
        ?>
      <select name="acTitle" id="aTitle">
        <option value="" <?= $op0 ?>>No selected</option>
        <option value="Mr" <?= $op1 ?>>Mr.</option>
        <option value="Ms" <?= $op2 ?>>Ms.</option>
        <option value="Mrs" <?= $op3 ?>>Mrs.</option>
        <option value="Miss" <?= $op4 ?>>Miss.</option>
        <option value="Prof" <?= $op5 ?>>Prof.</option>
        <option value="Dr" <?= $op6 ?>>Dr.</option>
      </select>
      
      <label for="fname">Full Name:</label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="<?= $row['full_name'] ?>"/><br>
			
	 <!--<label for="email">Email:</label><br>
			<input id="email" name="email" type="text" class="inputvalues" placeholder="Type your current Email" required/><br>-->
			


      <label for="aOrganization">Organization:</label><br>
			<input id="aOrganization" name="Organization" type="text" class="inputvalues" placeholder="<?= $row['organization'] ?>" /><br>

      <br>
			

			<label for="ContactDetails">Contact No:</label><br>
			<input id="ContactDetails"  name="ContactDetails" type="tel" class="inputvalues" pattern="[0-9]{1}[0-9]{9}" placeholder="<?= $row['contactdetails'] ?>" title="Phone number with 0-9 and remaing 9 digit with 0-9"/>
      
    
      <br>
		</fieldset>

	
			<button name="update_btn" type="submit" id='btnValidate' value="Sign Up" >UPDATE</button><br>

		</form>



		<?php
			if(isset($_POST['update_btn']))
			{
        
          
          $aTitle = $_POST['acTitle'];
          $fullname =$_POST['fullname'];
				  $Organization = $_POST['Organization'];
				  $ContactDetails = $_POST['ContactDetails'];

          $query = "UPDATE userinfotable SET full_name = '$fullname',
          organization = '$Organization', contactdetails = '$ContactDetails'
          WHERE email = '$email' AND user_type='$user_type'";
          $query_run = mysqli_query($con,$query);
				
				if($query_run){
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
