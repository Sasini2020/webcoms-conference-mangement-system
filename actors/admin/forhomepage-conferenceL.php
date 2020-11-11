<?php

  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '1'){
    header('location:../../login.php');
  }
?>

<!DOCTYPE html>
<html>
<head>



    <link rel="stylesheet" href="../../css/table_style.css">
    <link rel="stylesheet" href="../../css/main_style.css">
<style>

* {
  font-family: sans-serif; /* Change your font family */
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
 
</style>
</head>
<body>

  <br><br>

  <center>
    <p><h3>Conference List</h3></p>
  </center>

  <br><br>

  <div>
   
    <table class="content-table">
      <thead>
	      <tr>
          <th>ID</th>
          <th>Conference</th>
          <th>Venue</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Deadline</th>
          <th>Sposer details</th>
          <th> Conference Chair</th>
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
