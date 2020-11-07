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


 <link rel="stylesheet" href="../../css/style.css">
 <link rel="stylesheet" href="../../css/main_style.css">
 <link rel="stylesheet" href="../../css/style_footer.css">

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
}
/* mouse over link */
a:hover {
  color: blue;
}
</style>


</head>
<body>

<nav>
    <ul>
      <li><a href="author_home.php">Back to Home</a></li>
    </ul>
  </nav>

  <br><br>

  <h2 align="center">Conferences List</h2>

	<table id="papersDownloads">
	<tr>
        <th>ID</th>
	   <th>Conference</th>
	   <th>Venue</th>
	   <th>Start date</th>
	   <th>End date</th>
	   <th>Deadline</th>
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
			echo "<a href='papersubmission.php?id=". $row['id'] ."' title='submit paper' ><span ></span><img src='../../imgs/sub.png' height='25' width='25' />upload</a>";
			echo "<td><a href='cameraReadySubmission.php?id=". $row['id'] ."' title='submit camera-ready paper' ><span ></span><img src='../../imgs/sub.png' height='25' width='25' />upload</a></td>";

       
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


<?php include "../../footer.html" ?></body>

</body>
</html>
