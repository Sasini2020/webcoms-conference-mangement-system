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
    

    <title>Camera Ready Copy Upload</title>
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
    <li><a href="submittedRPaperList.php">Back</a></li>
    </ul>
  </nav>
<br>
  <h2 style="margin-left:20px;">Upload Camera Ready Copy </h2>

    <div class="container">
      <div class="row">
        <form action="cameraReadySubmission.php" method="post" enctype="multipart/form-data" >
          <h2 style="color:#5DADE2;">Title AND Abstract</h2><br><br>

          <label><b>Title*</b></label><br>
          <input name="title" type="text" class="inputvalues" placeholder="Title" required/><br>

          <!-- Text-area -->
          <label><b>Abstract*</b></label><br>

          <textarea name="abstract" rows="10" cols="40"></textarea><br>

          <label><b>Other Authors Email*</b></label><br>
          <input name="OtherAutherE" type="text" class="inputvalues" placeholder="Enter Emails"/><br>
          
          <label><b>Upload File*</b></label>
          <input type="file" name="myfile"> <br>
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
