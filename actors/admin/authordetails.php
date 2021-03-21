<?php
	session_start();
	if($_SESSION['login_s'] != '1'){
        header('location:../../login.php');
    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Author details</title>
  <link rel="stylesheet" href="../../css/table_style.css">
  <link rel="stylesheet" href="../../css/about_help_styles.css">
  <link rel="stylesheet" href="../../css/DropDownListToNav.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

.btn{

  background-color: DodgerBlue;
  border: none;
  border-radius:8px;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}
.btn:hover{
	background-color: RoyalBlue;
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
			<li><a class="active" href="authordetails.php">Author details</a></li>
			<li><a href="conferenceChairRegistration.php">Conf Chair Registration</a></li>
			<li><a href="conferenceTrackDefine.php">Conf Track Defination</a></li>
			<li class="dropdown">				
					<a href="#" class="dropdown">Admin <i class="fa fa-caret-down"></i></a>
					
					<div class="dropdown-content">
						<a href="updateprofile.php">Update profile</a>
						<a href="admin_change_password.php">Change Password</a>
						<a href="../logout.php">Log Out</a>
					</div>
			</li>
		

	</nav>

<br><br><br><br>
<center>
  
<button onclick="myfunction()" class="btn" id="btnex" >  Download Report    <i class="fa fa-download"></i></button> 

 <script> function myfunction(){
    alert("Report Download Successfully");

 }</script>
	<table id="dpdf" class="content-table">
	
	<thead>

		<tr>
		<th>Full name</th>
		<th>Email</th>
		<th></th>
		</tr>
	</thead>	
</center>	
	<?php
	
	 if(isset($_POST['back']))
			{
				header('location:adminhomepage.php');
			}
	
	$conn = mysqli_connect("localhost","root","","webcomsdb");
	if ($conn-> connect_error) {
		die("Connection failed:". $conn-> connect_error);
	}
	
	$sql = "SELECT full_name, email from userinfotable where user_type='Author'";
	$result = $conn-> query($sql);
	
	if ($result-> num_rows> 0){
		while ($row = $result-> fetch_assoc()){
			echo "<tr><td>". $row["full_name"] ."</td><td>". $row["email"] ."</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}
	$conn-> close();
	?>
	
	</table>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  

  <script type="text/javascript">
        $("body").on("click", "#btnex", function () {
            html2canvas($('#dpdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("author-details.pdf");
                   

                }
            });
        });
    </script>
 

	<br/>	

	</div>
     <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
