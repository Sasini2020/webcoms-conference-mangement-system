<?php
	session_start();
	if($_SESSION['login_s'] != '1'){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Author details</title>
	<link rel="stylesheet" href="css/table_style.css">
	<link rel="stylesheet" href="css/main_style.css">
	<link rel="stylesheet" href="css/sty.css">

	<!--
	<style type "text/css">
		table {
			border-collapse: collapse;
			width: 100%;
			color: #1e1919;
			font-family: monospace;
			font-size: 25px;
			text-align: left;
		}
		
		th {
			background-color: #6495ED;
			color: white;
		}
		
		tr:nth-child(even) {background-color: #f2f2f2}
		ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
		}

		li {
		float: left;
		}

		li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		}

		li a:hover:not(.active) {
		background-color: #111;
		}

		.active {
		background-color: #6495ED;
		}
		.logout_btn{
			margin-top:10px;
			background-color:#DC143C;
			padding:5px;
			border-radius:28px;
			color:white;
			width:10%;
			text-align:center;
			font-size:18px;
			font-weight:bold;
			margin-bottom:20px;
		}
	</style>
	<link rel="stylesheet" href="css/sty.css">-->
</head>
<body>
	
	
	<nav>
		<ul>
			<li><a href="adminhomepage.php">Back to Home page</a></li>
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>
			<li><a href="conferences_view.php">Conferences</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a href="help.html">Help</a></li>
			<li><a href="contactUs.html">Contact Us</a></li>-->	
		</ul>
		</br></br>
	</nav>

	<table>
		<tr>
		<th>Full name</th>
		<th>Gender</th>
		<th>Email</th>
		</tr>
	
	<?php
	
	 if(isset($_POST['back']))
			{
				session_destroy();
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

	<br/>	
	<form class="myform" action="adminhomepage.php" method="post">
		<input name="back" type="submit" id="back_btn" value="Back"/><br>		
	</form>
	
	
</body>
</html>
