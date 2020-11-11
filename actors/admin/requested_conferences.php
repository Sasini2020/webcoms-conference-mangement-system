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
  color: #0 09879;
}


.p {
	color:white;
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("try.jpg");
  height: 30%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

 
</style>

</head>
<body>
<div class="hero-image"> 
  <!-- Remove commenting and get multicolorsfor backgorund
  <div class="filter">
  </div>	 -->

	<nav>
		<ul>
      <!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
      <li><a href="adminhomepage.php">Home</a></li>
			<li><a href="requested_conferences.php">Requested conferences</a></li>
			<li><a href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a href="conferenceChairRegistration.php">Conference Chair Registration</a></li>
			<li>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
			&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
			&ensp;&ensp;&ensp;&ensp;&ensp;</li>
			<li><a href="../../index.php">Log Out</a></li>
		

  </nav>
  <div class="hero-text">
</br>
    <h5 style="font-size:30px">Requested Conferences</h5>
</div>
  <br><br><br><br><br><br><br><br>


  <br><br>

  <div>
    
    <!--<br><br>
    <form class="myform" action="adminhomepage.php" method="post">
      
      <p style="text-align:left;color:#000000;font-size: 20px;"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"  ></i> To Admin's home page..</p>
      
      <input class="myButton" name="button" type="submit" id="button" value="Back"/><br>	
      
      </br></br></br></br></br></br></br></br>
      
    </form>-->
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
  </div>
  </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
  <h5 style="color:white; padding:20px; margin:0; text-align:center; background-color:#063247">WebCOMS @2020</h5>
</body>
</html>
