<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>

	<title>Conferences List</title>
	
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
	    <li><a href="reviewerhomepage.php">Home</a></li>
			<li><a class="active" href="ConferenceListForR.php">Conference List</a></li>
      <li><a href="paperlist.php">Review papers</a></li>	
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>

  <br><br>
<br>
  <h2 style="margin-left:20px;">Conferences List</h2>
<center>
	<table class="content-table">
	<tr>
     <th>ID</th>
	   <th>Conference</th>
	   <th>Venue</th>
	   <th>Conference Start date</th>
     <th>Conference End Date</th>
	   <th>Paper Submission Due Date</th>
	   <!-- <th>Sponser details</th> -->


	</tr>
	<br>
	
	
	<?php
	
	 if(isset($_POST['back']))
			{
				header('location:.php');
	}


	
	$conn = mysqli_connect("localhost","root","","webcomsdb");
	if ($conn-> connect_error) {
		die("Connection failed:". $conn-> connect_error);
	}
	
	$sql = "SELECT * from conferences ";
	$result = $conn-> query($sql);


	
	if ($result-> num_rows> 0){
		while ($row = $result-> fetch_assoc()){
			echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["venue"] ."</td><td>". $row["start_date"] ."</td><td>". $row["end_date"] ."</td><td>" . $row["deadline_date"]  ;
			//echo "<a href='papersubmission.php?id=". $row['id'] ."' title='submit paper' ><span ></span><img src='../../imgs/submit icon.PNG' height='25' width='25' /></a>";
       
        }
		echo "</table>";
	}
	else {
		echo "No conferences";
	}
	$conn-> close();
	?>


	
	</table>
	</center>
</div>
<!-- </td> -->
	
	
<!-- </section> -->

<!-- Footer section -->
<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>

</html>
