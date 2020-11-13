<?php
	session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
	require '../../dbconfig/config.php';
?>

<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>

  <!-- paste   here  ../../css/ -->
    <link rel="stylesheet" href="../../css/reg_form_style.css">
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">

    <title>Files Upload and Download</title>
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
  <input type="checkbox" id="check">
          <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
          </label>
        <label class="logo">Web-COMS</label>
    <ul>
    <li><a href="ConferenceListForA.php">Back</a></li>
    <li><a href="../../About.php">About</a></li>
    <li><a href="../../help.php">Help</a></li>

    </ul>
    <br /><br />
  </nav>
  <br>
  <h2 style="color:#111 ;text-align:center;">Upload a research paper for the first evaluation</h2>



    <div class="container">
      <div class="row">
        <form action="papersubmission.php" method="post" enctype="multipart/form-data" >
          <h2 style="color:#6495ED;">Submit a Paper</h2><br><br>


<!-- newely added -->
          <label><b>Full Name:</b></label><br>
		  	  <input name="full_name" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
          <label><b>University:</b></label><br>
          <input name="university" type="text" class="inputvalues" placeholder="Type your university" required/><br>
          <label><b>Contact 	Details:</b></label><br>
          <input name="contact_details" type="text" class="inputvalues" placeholder="Your Contact Details" required/><br>
          <label><b>Other links:</b></label><br>
          <input name="other_links" type="text" class="inputvalues" placeholder="Other links"><br>
          <label><b>Choose File:</b></label><br>
          <input type="file" name="myfile" > <br>
          <br>
          <button type="submit" class="button" id="save_btn" name="save">upload</button>
          <!-- <button type="submit" id="" name="">Cancel</button> -->
          <button type="cancel" class="button" onclick="javascript:window.location='papersubmission.php';">Cancel</button>

        </form>


   <!-- newely added -->

  



      </div>
    </div>
    
    <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
  </body>
</html>
