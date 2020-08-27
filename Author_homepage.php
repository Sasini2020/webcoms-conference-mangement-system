
<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
}
.topnav input[type=text] {
    float: right;
    padding: 6px;
    border: none;
    border-radius: 15px;
    margin-top: 8px;
    margin-right: 16px;
    font-size: 17px;
  }
   
</style>

 <link rel="stylesheet" href="css/mychanged.css">
 <link rel="stylesheet" href="css/main_style.css">

<title>Author Home</title>

</head>
<body>

	<nav class="topnav">
			<ul>
				<li><a class="active" href="index.php">WebComs</a></li>
				<li><a href="index.php">Log out</a></li>
				<li><a href="help.html">Help</a></li>
				<li><a href="contactUs.html">Contact Us</a></li>
				<input type="text" placeholder="Search..">
				
			</ul>
			
		
		
  </nav>

  <br><br>

	<table>
	<tr>
        <th>ID</th>
	   <th>Conference</th>
	   <th>Venue</th>
	   <th>Start date</th>
	   <th>End date</th>
	   <th>Deadline</th>
	   <th>Sponser details</th>
	   <th>Submit a Paper</th>


	</tr>
	<br>
	
	
	<?php
	
	 if(isset($_POST['back']))
			{
				session_destroy();
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
			echo "<a href='papersubmission.php?id=". $row['id'] ."' title='submit paper' ><span ></span><img src='imgs/submit icon.PNG' height='25' width='25' /></a>";
       
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
</body>
</html>
