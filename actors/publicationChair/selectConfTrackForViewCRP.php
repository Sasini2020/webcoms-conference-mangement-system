<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!-- Accessing the FilesLogic.php -->
<?php //include 'fileLogicCameraReady.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Select Conference Track</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <link rel="stylesheet" href="../../css/table_style.css">



<style>


.conListLink{
  color:white;
  /* text-shadow: 1px 1px 0 #444; */
}

.conListLink:link,
.conListLink:link:visited{
  background-color: dodgerblue;
  color: white;
  padding: 7px 15px;
  width:110px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius:6px;
}  

.conListLink:hover, 
.conListLink:active {
  background-color: #00b8e6;
}
.content-table {
  border-collapse: collapse;
  color:black;
  margin: 25px 0;
  width: 1300px;
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
  border-bottom: 1px solid dodgerblue;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid dodgerblue;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}


.dot {
  height: 8px;
  width: 8px;
  background-color: #86B0DD;
  border-radius: 50%;
  margin-bottom:2px;
  margin-left:28px;
  margin-right:5px;
  display: inline-block;
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
			<li><a class="active" href="publicationchairhomepage.php">Back to Home</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>

  <div>
  
  </div>
    <h2 style="margin-left:20px;">Select Conference Track</h2>
    <center>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Track Name</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $confernceId = $_SESSION['conf_id'];

                    $query_result = mysqli_query($con,"select ct.ID as cId ,sct.trackName as trackName 
                    from conferencetrack as ct, system_conference_track as sct
                    where (ct.systemTrackId = sct.trackId) and (ct.conferenceID = $confernceId)");
                    $counter = 1;
                    while($row = mysqli_fetch_assoc($query_result)){
                ?>
                <tr>
                    <td><?= $counter ?></td>
                    <td><?= $row['trackName'] ?></td>
                    <td>
                        <a href="route.php?confTackIdForViewCameraReady=<?=$row['cId']?>" 
                        class="conListLink">Select</a>
                    </td>
                </tr>

                <?php
                    $counter++; }
                ?>
            </tbody>
        </table>
    </center>
  </div>
<!-- Footer section -->
<div class="footer">
    <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
</div>
</body>
</html>