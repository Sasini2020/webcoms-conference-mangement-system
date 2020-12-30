<?php 
  session_start();
  if($_SESSION['login_s'] != '2'){
      header('location:../../login.php');
  }
  require '../../dbconfig/config.php';
  include 'filesLogic.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
 

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <!-- <link rel="stylesheet" href="../../css/reg_form_style.css"> -->
   <link rel="stylesheet" href="../../css/table_style.css">
  <!-- <title>Uploaded reseach papers</title> -->

<style>


.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 1300px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align:left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 15px 11px;
  min-width: 200px;
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
<!-- navbar -->

<nav>
  <div class="logo">Web-COMS</div>
  <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    
    <ul>
      
		 <li><a href="reviewerhomepage.php">Back to Home</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		
    </ul>
  </nav>

  <br>
  <h2 style="color:#34495E;margin-left:20px;">
  <?php 
      // $track_Id = $_SESSION['trackId'];
      //echo $_GET['trackId'];  
      echo "Track Name :"." ". $_SESSION['sysTrackName'];
?></h2>
<center>
<table class="content-table">
<thead>
    <!-- file id -->
    <th>Number</th>
    <th>Paper Title</th> 
    <th>Abstract</th>
    <th>Conference Name</th>
    <th>Action</th>
    <th>Is Reviewed</th>
    <th>Review & Discussion</th>

   
</thead>
<tbody>
  <?php

    $rEmail = $_SESSION['r_email'];
    $sysTrackId = $_SESSION['sysTrackId'];

    // paperlist query
    $query = "SELECT rp.idrp as idrp, rp.NameOfFile as NameOfFile, rp.title as title, rp.abstract as abstract,
    c.name as cName, rap.isReviewed as isRved
    FROM researchpaper as rp, reviewerandpaper as rap, conferencetrack as ct, conferences as c
    where (rap.reviewerEmail = '$rEmail') and (rap.paperId = rp.idrp) and (rp.trackID = ct.ID) and (ct.systemTrackId = $sysTrackId)
     and (rp.conferenceId = c.id)
     order by rap.ID";

    $result = mysqli_query($conn, $query);

    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $count = 1; 
    foreach ($files as $file): ?>
    <tr>
      <td><?php echo $count ?></td>
      <td><?php echo $file['title']; ?></td>
      <!-- show conference name here in below php tag -->
      <td><?php echo $file['abstract']; ?></td>
      <td><?php echo $file['cName']; ?></td>

      <td><i class="fas fa-file-download" style="color:#1A5276;"></i><a style="text-decoration:none;color:dodgerblue;" 
      href="paperlist.php?dFile_id=<?php echo $file['idrp'] ?>"> Download paper</a>
      <br><br>
      <i style="color:#1A5276" class="fas fa-eye"></i><a style="color:dodgerblue ;text-decoration:none;" 
      href="../../uploads/<?php echo $file['NameOfFile']; ?>" target="_blank">View paper</a>
      <br><br>
      <!-- <i style="color:#1A5276" class="fas fa-newspaper"></i><a style="text-decoration:none;color:dodgerblue;" 
      href="../../uploads/<?php //echo $file['NameOfFile']; ?>"> View abstract</a>
      <i style="color:#1A5276" class="fas fa-newspaper"></i><a style="text-decoration:none;color:dodgerblue;" href="#"> 
      View abstract</a>

      <br><?php //echo $file['abstract']; ?> -->
      </td>
      
      <td>
        <?php
          if($file['isRved'] == 0){
            echo "Not Review";
          }
          else{
            echo "Reviewed";
          }
        ?>
      </td>

      <td>
      <?php

      echo "<i class='far fa-plus-square' style='color:#1A5276'></i>
      <a href='route.php?f_id=".$file['idrp']." & f_title=".$file['title']." ' style='color:#1A5276; text-decoration:none;'> 
      Add Review</a> ";
      
      echo "<br><br>";
      
      echo "<i class='fas fa-pen' style='color:#1A5276'></i><a href='#.php?f_id=".$file['idrp']." & f_title=".$file['title']." ' 
      style='color:#1A5276; text-decoration:none;'> Edit Review </a> ";
      
      echo "<br><br>";
      
      echo "<i class='fas fa-eye' style='color:#1A5276'></i><a href='#.php?f_id=".$file['idrp']." & f_title=".$file['title']." ' 
      style='color:#1A5276; text-decoration:none;'> View Review </a> ";

      $count++;
      ?>
    </td>
    
    </tr>
  <?php endforeach;?>


</tbody>
</table>
</center>



<!-- Footer section -->
<div class="footer">
    <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
</div>
</body>
</html>
