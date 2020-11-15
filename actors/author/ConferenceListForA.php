<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>

	<title>Conferences List</title>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">

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
a {
  color: #5DADE2;
  text-decoration:none;
}
a:hover {
  color: #1A5276;
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
      <li><a href="author_home.php">Back to Home</a></li>
	  <li><a class="active" href="ConferenceListForA.php">Conferences List</a></li>

	</ul>
  </nav>

  <br>

  <h2 style="margin-left:20px;">Conferences List</h2>

	<table id="papersDownloads">
	<tr>
        <th>ID</th>
	   <th>Conference</th>
	   <th>Venue</th>
	   <th>Start date</th>
	   <th>End date</th>
	   <th>Paper submission due date</th>
	   <th>Sponser details</th>
	   <th>Submit a Paper</th>
	   <th>Submit camera ready copy</th>



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
			echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["venue"] ."</td><td>". $row["start_date"] ."</td><td>". $row["end_date"] ."</td><td>" . $row["deadline_date"] ."</td><td>" . $row["sponsor_details"] ."</td><td>";
			echo "<a href='papersubmission.php?id=". $row['id'] ."' title='submit paper' ><span ></span><img src='../../imgs/sub.png' height='25' width='25' />Submit</a>";
			echo "<td><a href='cameraReadySubmission.php?id=". $row['id'] ."' title='submit camera-ready paper' ><span ></span><img src='../../imgs/sub.png' height='25' width='25' />Submit</a></td>";

       
        }
		echo "</table>";
	}
	else {
		echo "0 result";
	}
	$conn-> close();
	?>


	
	</table>
</div>
<!-- </td> -->
	
	
<!-- </section> -->



    <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
