<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>

	<title>Conference List</title>

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
 <link rel="stylesheet" href="../../css/mychanged.css">
 <!--<link rel="stylesheet" href="../../css/main_style.css">-->


<style>
	
body {
  margin: 0;
}
.topnav input[type=text] {
    float: right;
    padding: 6px;
    bord: none;
    border-radius: 15px;
    margin-top: 8px;
    margin-right: 16px;
    font-size: 17px;
  }
   
</style>

</head>
<body>

<nav>
    <ul>
      <li><a href="reviewerhomepage.php">Back to Home</a></li>
    </ul>
  </nav>

  <br><br>

  <h2 align="center">Conferences List</h2>

	<table>
	<tr>
       <th>ID</th>
	   <th>Conference</th>
	   <th>Venue</th>
	   <th>Start date</th>
	   <th>End date</th>
	   <th>Deadline</th>
	   <th>Sponser details</th>


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
			echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["venue"] ."</td><td>". $row["start_date"] ."</td><td>". $row["end_date"] ."</td><td>" . $row["deadline_date"] ."</td><td>" . $row["sponsor_details"] ;
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
</div>
<!-- </td> -->
	
	
<!-- </section> -->

<!-- Footer section -->
<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>

</html>
