<?php

  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '1'){   
    header('location:../../login.php');
  }  

?>

<!DOCTYPE html>
<html>
<head>

  <title>Requested Conferences List</title>

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
  <!-- Remove commenting and get multicolorsfor backgorund
  <div class="filter">
  </div>	 -->


  <br><br>

  <center>
    <h3><p><b>Requested Conference List</b></p><h3>
  </center>

  <br><br>

  <div>
    
    <!--<br><br>
    <form class="myform" action="adminhomepage.php" method="post">
      
      <p style="text-align:left;color:#000000;font-size: 20px;"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"  ></i> To Admin's home page..</p>
      
      <input class="myButton" name="button" type="submit" id="button" value="Back"/><br>	
      
      </br></br></br></br></br></br></br></br>
      
    </form>-->

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
          <th>Conference Chair</th>
          <th>Manage</th>
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
            where conferences.Accepted='0';") or die(mysqli_error($con));
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

              <td style="padding-left: 20px;">
                <form action="requested_conferences.php" method="post">
									
							    <input type="submit" name="action" value="Delete" />
                  <input type="submit" name="action" Value="Accept" />
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                </form>
              </td>
            </tr>
      </tbody>
			<?php
        $counter++;}
      ?>

      
   
      <?php

        //function del_d($id){
        //  $qur = mysqli_query($con,"delete from conferences where id='$id'");
        //  header('location:requested_conferences.php');
        //}
        if(isset($_POST['action']) && isset($_POST['id'])){
          if($_POST['action'] == 'Delete'){
            $r_id = $_POST['id'];
            $qur = mysqli_query($con,"delete from conferences where id='$r_id'");
            header('location:requested_conferences.php');
          }
          elseif($_POST['action'] == 'Accept'){
            $r_id = $_POST['id'];
            $qur = mysqli_query($con,"update conferences set Accepted = '1' where id='$r_id'");
            header('location:requested_conferences.php');
          }
        }
      ?>
	
	  </table>	
  </div>

</body>
</html>
