<?php
	session_start();
    if($_SESSION['login_s'] != '5'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Select Track</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">
   <link rel="stylesheet" href="../../css/new_table_and_button.css">
   <link rel="stylesheet" href="../../css/table_style.css">



</head>

<body >
	



  <nav>
  <div class="logo">Web-COMS</div>
  <input type="checkbox" id="click">
  <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    <ul>
     


			<li><a class="active" href="trackchairhomepage.php">Back to Home</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		


    </ul>
  </nav>

  <br><br>

	<div id="main-wrapper">
	

    <h2 style="color:#111 ;margin-left:20px;">My Tracks List</h2>
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
        $tEmail = $_SESSION['t_email'];
        $c_id = $_SESSION['c_id'];

        $query_result = mysqli_query($con,"select ct.ID as ctId, sct.trackName as trackName
        from system_conference_track as sct, conferencetrack as ct, conferencetrack_and_trackchair as ctt
        where (ctt.trackChairEmail = '$tEmail') and (ctt.conferenceTrackId = ct.ID) and (ct.systemTrackId = sct.trackId)
        and (ct.conferenceID = $c_id)");
        $count = 1;
        while($row = mysqli_fetch_assoc($query_result)){
      ?>
        <tr>
          <td><?= $count ?></td>
          <td><?= $row['trackName'] ?></td>
          <td><a href="route.php?cTrack_selected=<?= $row['ctId'] ?>" class="conListLink">Select</a></td>
        </tr>
        <?php
          $count++;}
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
