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

    <title>Conference List</title>

    <link rel="stylesheet" href="../../css/table_style.css">
    <link rel="stylesheet" href="../../css/main_style.css">

</head>
<body>
  
	
  <nav>
    <ul>
      <li><a href="adminhomepage.php">Back to Home</a></li>
    </ul>    
  </nav>
  <br><br>

  <center>
    <p><b>Conference List</b></p>
  </center>

  <br><br>

  <div>
   
    <table>
      <thead>
	      <tr>
          <th>ID</th>
          <th>Conference</th>
          <th>Venue</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Deadline</th>
          <th>Sposer details</th>
          <th>Conference Chair</th>
      	</tr>
      </thead>

      <tbody>                                     
        <?php
          $sql = mysqli_query($con, "select conferences.id,
          conferences.name,
          conferences.venue,
          conferences.start_date,
          conferences.end_date,
          conferences.deadline_date,
          conferences.sponsor_details,
          conferencechair.fullname
          from conferences
          inner join conferencechair on conferences.emailconfchair = conferencechair.emailconfchair
          where conferences.Accepted='1';") or die(mysqli_error($con));
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
            </tr>
      </tbody>
			<?php
        $counter++;}
      ?>

	  </table>	
  </div>

</body>
</html>
