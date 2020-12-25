<?php
	session_start();
	if($_SESSION['login_s'] != '1'){
        header('location:../../login.php');
	}
	require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>

    <title>Conference Track Defination</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/sty.css">
	<link rel="stylesheet" href="../../css/table_style.css">
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
			<li><a href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a href="conferenceChairRegistration.php">Conference Chair Registration</a></li>
            <li><a class="active" href="conferenceTrackDefine.php">Track Defination</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		</ul>

	</nav>

	<div id="main-wrapper" style="margin:20px auto;">
		<center>
			<h2>Define New Track</br><br>
		</center>

		<form class="myform" action="conferenceTrackDefine.php" method="post">

			<label for="name"><b>Track Name:</b></label><br>
			<input id="name" name="Tname" type="text" class="inputvalues" placeholder="Type Track Name" required/>
		
			<input name="submit_btn" type="submit" id="login_btn" value="Submit"/>
		</form>

		<?php
				if(isset($_POST['submit_btn']))
				{

					$Tname =$_POST['Tname'];
					$adminEmail = $_SESSION['ad_email'];

						$query= "select * from system_conference_track WHERE trackName='$Tname';";
						$query_run = mysqli_query($con,$query);
						
						if(mysqli_num_rows($query_run)>0)
						{
							// there is already have that track name
							echo '<script type="text/javascript"> alert("This Track is allready defined...!") </script>';
						}
						else
						{
							$query= "insert into system_conference_track
							values(NULL,'$Tname','$adminEmail')";
							$query_run = mysqli_query($con,$query);
							
							if($query_run)
							{
								echo '<script type="text/javascript"> alert("New Track Defined") </script>';
							}
							else
							{
								echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
							}
						}				
				}
		?>
	</div>
	<hr>
	<div style="margin:20px 40px;">
		<h2>Conerence Track List</h2>

		<table class="content-table">
			<thead>
				<tr>
					<th>Number</th>
					<th>Track Name</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$count = 1;
					$query_result = mysqli_query($con,"select * from system_conference_track order by trackId DESC")
					or die(mysqli_error($con));
					while($row = mysqli_fetch_assoc($query_result)){
				?>
				<tr>
					<td><?= $count ?></td>
					<td><?= $row['trackName'] ?></td>
				</tr>
				<?php
					$count++;}
				?>
			</tbody>
		</table>
	
	</div>

     <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
     </div>
		
</body>
</html>