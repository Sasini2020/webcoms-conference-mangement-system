
<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 15%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #6495ED;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>

 <link rel="stylesheet" href="css/mychanged.css">


<title>Athor Home</title>
	<link rel="stylesheet" href="css/styleNavbar.css">

</head>
<body>

<ul>
  <li><a class="active" href="index.php">WebComs</a></li>
	<li><a href="index.php">Log out</a></li>
	<li><a href="help.html">Help</a></li>
	<li><a href="contactUs.html">Contact Us</a></li>
</ul>

<section>

  <div>
	  <br><br>
  <form class="myform" action="Author_homepage.php" method="post">
		
	
	</form>

	<table>
	<tr>
        <th>ID</th>
	   <th>Conference</th>
	   <th>Venue</th>
	   <th>Start date</th>
	   <th>End date</th>
	   <th>Deadline</th>
	   <th>Sposer details</th>
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
	
	
</section>
</body>
</html>
