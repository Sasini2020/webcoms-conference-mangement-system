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

  <title>Requested Conferences List</title>

  <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

 
<!-- Added css to style tag to style table -->
<style>
#papersDownloads {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#papersDownloads td, #papersDownloads th {
  border: 1px solid #ddd;
  padding: 8px;
}

#papersDownloads tr:nth-child(even){background-color: #f2f2f2;}

#papersDownloads tr:hover {background-color: #ddd;}

#papersDownloads th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5DADE2;
  color: white;
}
#acptBtn{
  background-color:#4dff4d; 
  padding:4px; 
  radius:20px;
  border: 2px solid #009966;
  border-radius: 20px;
}
#dltBtn{
  background-color:#ff0000; 
  padding:5px; 
  radius:20px;
  border: 2px solid #009966;
  border-radius: 20px;
}

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

<nav>
<div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
		<ul>
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
			<li><a href="adminhomepage.php">Home</a></li>
			<li><a class="active" href="requested_conferences.php">Requested conferences</a></li>
			<li><a href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a href="conferenceChairRegistration.php">Conf Chair Registration</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		</ul>

	</nav>

  <br><br>

  <h2 style="margin-left:20px;"> Requested Conferences</h2>

  <br><br>

  <div>
    
<center>
    <table class="content-table"  >
      <thead>
	      <tr>
          <th>ID</th>
          <th>Conference</th>
          <th>Venue</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Paper submission due date</th>
          <th>Sposer details</th>
          <th>Conference Chair</th>
          <th>Manage</th>
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
					
			
<!-- 		  <input type="submit" name="action" value="Delete" />
                  <input type="submit" name="action" Value="Accept" /> -->
			
		<input style="background-color:#196F3D;border: none;border-radius:10px;color: white;padding: 9px 20px;text-decoration: none;margin: 4px 2px;cursor: pointer;" type="submit" name="action" Value="Accept" />
		<input style="background-color:#E74C3C;border: none;border-radius:10px;color: white;padding: 9px 20px;text-decoration: none;margin: 4px 2px;cursor: pointer;" type="submit" name="action" value="Reject" />
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
          if($_POST['action'] == 'Reject'){
            $r_id = $_POST['id'];
            $qur = mysqli_query($con,"delete from conferences where id='$r_id'");
            //header('location:requested_conferences.php');
          }
          elseif($_POST['action'] == 'Accept'){
            $r_id = $_POST['id'];
            $qur = mysqli_query($con,"update conferences set Accepted = '1' where id='$r_id'");
            //header('location:requested_conferences.php');
            //header('Location: '.$_SERVER['PHP_SELF']);
          }
        }
      ?>
	
	  </table>	
  </div>

     
    <!-- Footer section -->
    <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
