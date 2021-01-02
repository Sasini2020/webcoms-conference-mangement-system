<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
	require '../../dbconfig/config.php';
?>

<?php include 'fileLogicForPublishCameraReadySubGuidelines.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Upload Camera Ready Submission Guidelines</title>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/reg_form_style.css">
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">

    <style>
    /* Styles for two buttons inside the form*/
    .button {
  background-color: #5DADE2;
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

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: dodgerblue;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid dodgerblue;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid dodgerblue;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
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
      <li><a href="publicationchairhomepage.php">Back to Home</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>
  <br>

  <h1 style="color:#7D3C98;text-align:center;">
  <?php 
    
      // echo "Conference Name :"." ". $_GET['c_id'];
      echo "Conference Name :"." ". $_SESSION['c_name'];

      
?></h1>
<br><br><br>
  <h3 style="margin-left:25px;color:#283747;">Upload Camera Ready Submission Guidelines as a pdf file</h3><br>
	

  <div class="container">
      <div class="row">

        <form action="camera_ready_sub_guidelines.php" method="post" enctype="multipart/form-data" >
          <label><b>Select file </b></label><br>
          <input type="file" name="myfile" > <br>
          <br>
          <button type="submit" class="button" id="save_btn" name="save">Upload</button>
          <!-- <button type="submit" id="" name="">Cancel</button> -->
          <!-- <button type="cancel" class="button" onclick="javascript:window.location='publish_conf_guidelines.php';">Cancel</button> -->
 
         <!-- <button name="submit_btn" type="submit" id="signup_btn" value="Sign Up">Register</button><br> -->

        </form>

      </div>
    </div>
    <br><br><br><br><br><br><br><br>

    <h3 style="margin-left:25px;color:dodgerblue;">Already Uploaded Camera Ready Submission Guidelines Files For Conferences</h3><br>
<center>

<table class="content-table">
<thead>
    <!--<th>Conference ID</th>
     <th>Conference Name</th> -->
    <th>Guidelines File </th>
    <th>File size (in KB)</th>
    <th>View</th>
    <!--<th>Delete</th>-->

</thead>
<tbody>
<!-- By following code inside php tag , I keep the particular conference Id -->
  
    
  <?php foreach ($files as $file): ?>
    <tr>
      <!--<td><?php //echo $file['conf_id']; ?></td>-->
      <td><?php echo $file['name']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><i style="color:#1A5276" class="fas fa-eye"></i><a style="color:#1A5276 ;text-decoration:none;margin-right:10px;" href="../../uploads/cameraReadySubmissionGuidelines/<?php echo $file['name']; ?>" target="_blank">View file</a></td>
      <!-- delete is not working yet complete it 
      <td><i style="color:red" class="fas fa-trash-alt"></i><a href="reject.php?op=delete&name=<?php //echo $row['name']; ?>" style="color:red;text-decoration:none;">Delete file</a></td>-->

    </tr>
  <?php endforeach;?>

</tbody>
</table>
</center>

    <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
  </body>
</html>
