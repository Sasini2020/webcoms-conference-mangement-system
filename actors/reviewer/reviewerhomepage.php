<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>Reviewer Home</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/table_style.css">

  <style>



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
  border-bottom: 2px solid dodgerblue;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
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
      
		 <li><a class="active" href="reviewerhomepage.php">Home</a></li>
                 <li><a href="ConferenceListForR.php">Conference List</a></li>
<!-- 		<li><a href="paperlist.php">Review papers</a></li> -->
      <!--<li><a href="rev_change_password.php">Change Password</a></li>-->
	    	 <li><a href="updateprofile.php">Update Profie</a></li>
	         <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		
    </ul>
  </nav>

  <br>
	

  <h2 style="margin-left:20px;color:#34495E;"> My Tracks And Assigned Papers</h2>

  <br><br>

  <div>
    
<center>
    <table class="content-table"  >
      <thead>
	      <tr>
          <th>Track Id</th>
          <!-- <th>System Track Id</th> -->
          <th>Track name</th>
          <th>Action</th>          
      	</tr>
      </thead>
</center>
      <tbody>                                     
           <?php
          $sql = "SELECT
          system_conference_track.trackName 
          FROM reviewer_interest_track inner join system_conference_track 
          on reviewer_interest_track.systemTrackID = system_conference_track.trackId where reviewer_interest_track.reviewerEmail='{$_SESSION['r_email']}' ";
          $result = $con->query($sql);
          
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["trackName"]."</td><td>"."<a href='paperlist.php?trackName=".$row['trackName']."' title='Assigned papers' style='color:#34495E;text-decoration:none'><span style='margin-right:5px;'>
                  <i class='fas fa-file'></i></span>View Assigned papers</a>". "</td></tr>";

                }
              echo "</table>";
          } else {
              echo "0 results";
          }
          
          $con->close();
          ?>
      
	  </table>	
  </div>


     <?php 
     //By following echo we can print the logged reviewer email
    // echo "{$_SESSION['r_email']}";
     ?>
    <!-- Footer section -->


    <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
