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

  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Conference List</title>

  <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
  <link rel="stylesheet" href="../../css/DropDownListToNav.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>


.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 1400px;
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

.linkStyle:link, .linkStyle:visited{
  text-decoration:none;
  color: #404040;
}

.linkStyle:hover, .linkStyle:active{
  text-decoration:none;
  color: black;
}

.archivedText{
  color:black;
  opacity:0.5;
  cursor: default;
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
			<li><a href="adminhomepage.php">Home</a></li>
			<li><a href="requested_conferences.php">Requested conferences</a></li>
			<li><a class="active" href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a href="conferenceChairRegistration.php">Conf Chair Registration</a></li>
      <li><a href="conferenceTrackDefine.php">Conf Track Defination</a></li>
			<li class="dropdown">				
					<a href="#" class="dropdown">Profile <i class="fa fa-caret-down"></i></a>
					
					<div class="dropdown-content">
						<a href="updateprofile.php">Update profile</a>
						<a href="admin_change_password.php">Change Password</a>
						<a href="../logout.php">Log Out</a>
					</div>
			</li>
		

	</nav>

  


  <center>
    <table class="content-table">
      <thead>
	      <tr>
          <th>ID</th>
          <th>Conference</th>
          <th>Venue</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Deadline</th>
          <th>Sponser details</th>
          <th>Conference Chair</th>
          <th>Archive</th>
      	</tr>
      </thead>
</center>
	    
      <tbody>                                     
        <?php
          $sql = mysqli_query($con, "select conferences.id,
          conferences.name,
          conferences.venue,
          conferences.start_date,
          conferences.end_date,
          conferences.deadline_date,
          conferences.sponsor_details,
          conferencechair.fullname,
          conferences.Accepted
          from conferences
          inner join conferencechair on conferences.emailconfchair = conferencechair.emailconfchair
          where conferences.Accepted <> '0'
          group by conferences.id DESC;") or die(mysqli_error($con));
          $counter = 1;
          while ($row = mysqli_fetch_assoc($sql)) {
        ?>                                            
            <tr id="row<?php echo $row['id'];?>">

              <td><?=$counter?></td>
              <td><?=$row['name']?></td>
              <td><?=$row['venue']?></td>
              <td><?=$row['start_date']?></td>
							<td><?=$row['end_date']?></td>
							<td><?=$row['deadline_date']?></td>
              <td><?=$row['sponsor_details']?></td>
              <td><?=$row['fullname']?></td>
              <td>
                <?php
                  if($row['Accepted'] == '1'){
                    echo '<a class="linkStyle" 
                    href="route.php?archiveConfId='.$row['id'].'"><i class="fa fa-archive" aria-hidden="true"></i> Archive</a>';
                  }
                  // accepted = 2 is used to achive conferences
                  elseif($row['Accepted'] == '2'){
                    echo '<span class="archivedText"><i class="fa fa-archive" aria-hidden="true"></i> Archived</span>
                          <b>&nbsp; </b> <a class="linkStyle" 
                          href="route.php?restArchiveConfId='.$row['id'].'"> <u>Reset</u></a>';
                  }
                ?>
              </td>
            </tr>
      </tbody>
			<?php
        $counter++;}
      ?>

	  </table>	
 

    <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
