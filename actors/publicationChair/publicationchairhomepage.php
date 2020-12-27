<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!-- Accessing the FilesLogic.php -->
<?php include 'fileLogicCameraReady.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <link rel="stylesheet" href="../../css/table_style.css">

   
    <!--<link rel="stylesheet" href="../../css/main_style.css">-->

<!--<link rel="stylesheet" href="../../css/main_style.css">-->
<!-- Added css to style tag to style table -->
<!--<style>



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
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}
 
</style>-->

<style>


.conListLink{
  color:white;
  text-shadow: 1px 1px 0 #444;
}

.conListLink:link,
.conListLink:link:visited{
  background-color: #00ccff;
  color: white;
  padding: 10px 20px;
  width:130px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}  

.conListLink:hover, 
.conListLink:active {
  background-color: #00b8e6;
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  width: 1300px;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}


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
      <!--<li><a href="publishcameracopy.php">Publish Camera ready copy guideline</a></li>
      <li><a href="uploadcoversub.php">Upload Cover Pages and sub page</a></li>
      <li><a href="viewcamerareadycopies.php">View Camera-ready copy</a></li>
      <li><a href="autoproceeding.php">Auto generate proceeding</a></li>
	  <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>-->


			<li><a class="active" href="publicationchairhomepage.php">Home</a></li>
			<li><a href="publishSubmissionGuidelines.php">Upload Guidelines For Paper Submission</a></li>
			<li><a href="uploadcoversub.php">Upload Pages</a></li>
			<li><a href="viewcamerareadycopies.php">View Camera-ready copy</a></li>
			<li><a href="autoproceeding.php">Auto generate proceeding</a></li>
	    	        <li><a href="updateprofile.php">Update Profie</a></li>
      <!--<li><a href="pub_change_password.php">Change Password</a></li>-->
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		


    </ul>
  </nav>

  <br><br>


	
	<div>
		<center>
    
    <table class="content-table">
<thead>
  <thead>
    <tr>
    <th>Number</th> 
    <th>Conference</th>
    <th>Venue</th>
    <th>Country</th>
    <th>Start date</th>
    <th>End date</th>
    <th>Select</th>
    </tr>
</thead>

</center>
<tbody>

   <?php
   
   $p_email=$_SESSION['p_email'];
   
   $sql=mysqli_query($con,"SELECT conferences.name,conferences.venue,conferences.country,conferences.start_date,conferences.end_date,conference_and_publicationchair.conferenceId,conference_and_publicationchair.publicationChairEmail,conferences.id
   from conferences LEFT JOIN  conference_and_publicationchair ON conferences.id=conference_and_publicationchair.conferenceId
   WHERE conference_and_publicationchair.publicationChairEmail='$p_email';") or die(mysqli_error($con));
   $counter=1;

   while($row=mysqli_fetch_assoc($sql)){


   ?>
  <tr id="row<?php echo $row['id']?>">

      <td><?=$counter?></td>
      <td><?=$row['name']?></td>
      <td><?=$row['venue']?></td>
      <td><?=$row['country']?></td>
      <td><?=$row['start_date']?></td>
      <td><?=$row['end_date']?></td>
      <td>
                <a href="#" class="conListLink">Select</a>
      </td>
      

      
    </tr>
  

</tbody>
<?php

 $counter++;}

?>
</table>
	   
	</div>
  <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
			 
</body>
</html>
