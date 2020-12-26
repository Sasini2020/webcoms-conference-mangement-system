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
   
    <title>Upload a reseach paper</title>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/reg_form_style.css">
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">

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
  </head>

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
    <li><a class="active" href="papersubmission.php">Submit Reseach Paper</a></li>


    </ul>
  </nav>
  <br>
  <h2 style="margin-left:25px;color:#283747;">Create New Submission</h2><br>
	

  <div class="container">
      <div class="row">

        <form action="papersubmission.php" method="post" enctype="multipart/form-data" >
          
          <label for="trackp"><b>Select Track*</b></label><br>
      
          <select name="Ptrack" id="trackp" class="inputvalues">
            <option value="">-- Select --</option>
            <?php 
              $c_id = $_GET['c_id'];
              $_SESSION['con_id'] = $c_id;
              $t_list = mysqli_query($con,"select ct.ID as id, sct.trackName as Name from conferencetrack as ct, system_conference_track as sct
              where (ct.systemTrackId = sct.trackId) and (ct.	conferenceID=$c_id)");
              while($row = mysqli_fetch_assoc($t_list)){
            ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?></option>
            <?php $counter++;} ?>
          </select>
          
          <label><b>Paper Title*</b></label><br>
          <input name="title" type="text" class="inputvalues" placeholder="Title" required/><br>

          <!-- Text-area -->
          <label><b>Abstract*</b></label><br>

          <!-- <textarea name="abstract" rows="10" cols="40"><?php //echo $comment;?></textarea> -->
          <textarea name="abstract" rows="10" cols="40"></textarea><br>

          <label><b>Other Authors Email*</b></label><br>
          <input name="OtherAutherE" type="text" class="inputvalues" placeholder="Enter Emails"/><br>
          
          <label><b>Select Paper *</b></label><br>
          <input type="file" name="myfile" > <br>
          <br>
          <button type="submit" class="button" id="save_btn" name="save">Upload</button>
          <!-- <button type="submit" id="" name="">Cancel</button> -->
          <button type="cancel" class="button" onclick="javascript:window.location='papersubmission.php';">Cancel</button>
 
         <!-- <button name="submit_btn" type="submit" id="signup_btn" value="Sign Up">Register</button><br> -->

        </form>

      </div>
    </div>
    
    <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
  </body>
</html>
