<?php

	if($_SESSION['login_s'] != '1'){
        header('location:../../login.php');
    }

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/main_style.css">
	<link rel="stylesheet" href="../../css/sty.css">

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
	
	
<center><p><h3>Author Details</h3></p></center>

	<table class="content-table">
	<thead>
		<tr>
		<th>Full name</th>
		<th>Gender</th>
		<th>Email</th>
		<th></th>
		</tr>
	</thead>	
	
	<?php
	
	 if(isset($_POST['back']))
			{
				header('location:adminhomepage.php');
			}
	
	$conn = mysqli_connect("localhost","root","","webcomsdb");
	if ($conn-> connect_error) {
		die("Connection failed:". $conn-> connect_error);
	}
	
	$sql = "SELECT full_name, email, gender from userinfotable where user_type='Author'";
	$result = $conn-> query($sql);
	
	if ($result-> num_rows> 0){
		while ($row = $result-> fetch_assoc()){
			echo "<tr><td>". $row["full_name"] ."</td><td>". $row["email"] ."</td><td>". $row["gender"] ."</td><td>";
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}
	$conn-> close();
	?>
	
	</table>


	
	
</body>
</html>
