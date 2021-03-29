<?php

  require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>



    <link rel="stylesheet" href="../../css/table_style.css">
    <link rel="stylesheet" href="../../css/main_style.css">
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

.content-table th{
  padding: 12px 15px;
  max-width:350px;
}
.content-table td {
  padding: 12px 15px;
  color:#1C2833;
  max-width:350px;
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


  <h1 style="margin-left:20px;color:#1C2833   ;font-size:35px;">Recent Conferences</h1>

  

  <div>
   <center>
    <table class="content-table">
      <thead>
	      <tr>
          <th>ID</th>
          <th>Conference</th>
          <th>Venue</th>
          <th>Conference Start date</th>
          <th>Conference End date</th>
          <th>Paper Submission Due Date</th>
          <!-- <th>Sponser details</th> -->
          <th>Conference Chair</th>
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
          conferencechair.fullname
          from conferences
          inner join conferencechair on conferences.emailconfchair = conferencechair.emailconfchair
          where conferences.Accepted='1'
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
