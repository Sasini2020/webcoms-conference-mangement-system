<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>Conferences List</title>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <link rel="stylesheet" href="../../css/reg_form_style.css">
  <link rel="stylesheet" href="../../css/table_style.css">


<style>


.content-table {
  border-collapse: collapse;
  margin: 25px auto !important;
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

.isDisable{
  color:currentColor;
  cursor:not-allowed;
  opacity:0.5;
  text-decoration:none;
}

.linkDec, .link:visited{
  text-decoration:none;
  color:currentColor;
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
  <li><a  href="author_home.php">home</a></li>
	  <li><a class="active" href="ConferenceListForA.php">Conferences List</a></li>
    <li><a href="submission_guidlines.php">Submission Guidlines</a></li>
    <li ><a style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

	</ul>
  </nav>

  <br>
  <h2 style="margin-left:20px;">All Conferences </h2>

	<table class="content-table">
	<tr>
     <!-- <th>ID</th> -->
	   <th>Conference</th>
	   <th>Location</th>
	   <th>Conference Start Date</th>
	   <th>Paper submission due date</th>
	   <!-- <th>Sponser details</th> -->
	   <th>Submit a Paper</th>
	   <th>Submit camera ready copy</th>



	</tr>
	<br>
	
	
	<?php
	
	 if(isset($_POST['back']))
			{
				header('location:.php');
	}


	
	$conn = $con;
	
  $sql = "SELECT id,name,venue,start_date,end_date from conferences 
          group by conferences.id DESC";
	$result = $conn-> query($sql);


	
	if ($result-> num_rows> 0){
		while ($row = $result-> fetch_assoc()){
			echo "</tr><td>". $row["name"] ."</td><td>". $row["venue"] ."</td><td>". $row["start_date"] ."</td><td>". $row["end_date"] ."</td><td>";
			echo "<a href='papersubmission.php?c_id=". $row['id'] ."' title='submit paper' class='linkDec'><span style='margin-right:5px;'><i class='fas fa-file-upload'></i></span>Submit</a>";
			echo "<td><a href='cameraReadySubmission.php?id=". $row['id'] ."' title='submit camera-ready paper' class='isDisable'><span style='margin-right:5px;'><i class='fas fa-file-upload'></i></span>Submit</a></td>";

       
        }
		echo "</table>";
	}
	else {
		echo "0 result";
	}
	?>


	
	</table>
</div>
<!-- </td> -->
	
	
<!-- </section> -->



    <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
