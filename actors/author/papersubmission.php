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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/main_style.css">

    <title>Files Upload and Download</title>
  </head>
  <body>

<!-- navbar -->
  <nav>
    <ul>
    <li><a href="ConferenceListForA.php">Back</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="#">Help</a></li>

    </ul>
    <br /><br />
  </nav>




    <div class="container">
      <div class="row">
        <form action="papersubmission.php" method="post" enctype="multipart/form-data" >
          <h2 style="color:#41BBB0;">Submit a Paper</h2><br><br>

          <input type="file" name="myfile"> <br>

<!-- newely added -->
          <label><b>Full Name:</b></label><br>
		  	  <input name="full_name" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
          <label><b>University:</b></label><br>
          <input name="university" type="text" class="inputvalues" placeholder="Type your university" required/><br>
          <label><b>Contact 	Details:</b></label><br>
          <input name="contact_details" type="text" class="inputvalues" placeholder="Your Contact Details" required/><br>
          <label><b>Other links:</b></label><br>
          <input name="other_links" type="text" class="inputvalues" placeholder="Other links"><br>


          <button type="submit" id="save_btn" name="save">upload</button>
          <!-- <button type="submit" id="" name="">Cancel</button> -->
          <button type="cancel" onclick="javascript:window.location='papersubmission.php';">Cancel</button>

        </form>


   <!-- newely added -->

  



      </div>
    </div>
  </body>
</html>
