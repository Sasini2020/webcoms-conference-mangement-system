<?php
	session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
	require '../../dbconfig/config.php';
?>

<?php include 'fileLogicCameraReady.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/reg_form_style.css">
    

    <title>Camera ready copies upload</title>
  </head>
  <style>
    /* Styles for two buttons in the form*/
    .button {
  background-color: #5DADE2; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

  </style>
  <body>

<!-- navbar -->
  <nav>
  <div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    <ul>
    <li><a href="ConferenceListForA.php">Back</a></li>
    <li><a class="active" href="cameraReadySubmission.php">Camera-ready Submission</a></li>

    <li><a href="../../help.php">Help</a></li>
    <li><a href="../../About.php">About</a></li>

    </ul>
  </nav>
<br>
  <h2 style="margin-left:20px;">Upload camera ready copy </h2>

    <div class="container">
      <div class="row">
        <form action="cameraReadySubmission.php" method="post" enctype="multipart/form-data" >
          <h2 style="color:#5DADE2;">TITLE AND ABSTRACT </h2><br><br>




          <label><b>Title*</b></label><br>
          <input name="title" type="text" class="inputvalues" placeholder="Title" required/><br>

          <!-- Text-area -->
          <label><b>Abstract*</b></label><br>

          <!-- <textarea name="abstract" rows="10" cols="40"><?php //echo $comment;?></textarea> -->
          <textarea name="abstract" rows="10" cols="40"></textarea>
          
          <label><b>Upload File*</b></label>
          <input type="file" name="myfile"> <br>

<!-- newely added -->
          <!-- <label><b>Full Name:</b></label><br>
		  	  <input name="full_name" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
          <label><b>University:</b></label><br>
          <input name="university" type="text" class="inputvalues" placeholder="Type your university" required/><br>
          <label><b>Contact 	Details:</b></label><br>
          <input name="contact_details" type="text" class="inputvalues" placeholder="Your Contact Details" required/><br>
          <label><b>Other links:</b></label><br>
          <input name="other_links" type="text" class="inputvalues" placeholder="Other links"><br> -->
          <br><br>

          <button type="submit" class="button" id="save_btn" name="save">Submit</button>
          <!-- <button type="submit" id="" name="">Cancel</button> -->
          <button type="cancel" class="button" onclick="javascript:window.location='cameraReadySubmission.php';">Cancel</button>

        </form>


      </div>
    </div>
 <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
  </body>
</html>
