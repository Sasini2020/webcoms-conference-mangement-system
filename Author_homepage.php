
<!DOCTYPE html>
<html>
<head>


 <link rel="stylesheet" href="css/mychanged.css">


<title>Athor Home</title>
	<link rel="stylesheet" href="css/styleNavbar.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<!-- Remove commenting and get multicolorsfor backgorund
<div class="filter">
</div>	 -->
<div>
<nav>
		<label class="logo">WebComs</label>
		<ul>
	<!-- <li><a class="active" href="#">Home</a></li> -->

	<li><a class="active" href="#">Home
			<i class="fas fa-caret-down"></i>
			</a>
			<ul>
	<li><a href="index.php">Log out</a></li>
	
	</ul>
	</li>
	
	<li><a href="authorhomepage.php">Submit paper</a></li>
	<li><a href="index.php">Register</a></li>
	<li><a href="help.html">Help</a></li>
	<li><a href="contactUs.html">Contact Us</a></li>


	</ul>
</nav>

</div>
<section>

  <div>
	  <br><br>
  <form class="myform" action="adminhomepage.php" method="post">
		
	
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
	   <th>Submit</th>


	</tr>
	<br>
	
	
	<?php
	
	 if(isset($_POST['back']))
			{
				session_destroy();
				header('location:adminhomepage.php');
	}
	
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Conference deleted!"; 
	header('location: Author_homepage.php');
}


	
	$conn = mysqli_connect("localhost","root","","samplelogindb");
	if ($conn-> connect_error) {
		die("Connection failed:". $conn-> connect_error);
	}
	
	$sql = "SELECT * from conferences ";
	$result = $conn-> query($sql);


	
	if ($result-> num_rows> 0){
		while ($row = $result-> fetch_assoc()){
			echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["venue"] ."</td><td>". $row["start_date"] ."</td><td>". $row["end_date"] ."</td><td>" . $row["deadline_date"] ."</td><td>" . $row["sponsor_details"] ."</td><td>";
         //   echo "<button>Submit</button>";
        echo "<a href='authorhomepage.php?id=". $row['id'] ."' title='submit paper' ><span ></span>+</a>";
       
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