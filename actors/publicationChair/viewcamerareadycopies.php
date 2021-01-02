<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

  <!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/nav_footer_styles.css">-->

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <link rel="stylesheet" href="../../css/table_style.css">

  <title>Submitted Camera Ready Copies</title>

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
  min-width:130px;
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
      <li><a href="publicationchairhomepage.php">Back to Home</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>
<h2></h2><br>
<center>
<h2 style="color:#283747 ;margin-left:20px;">Submitted Camera Ready Copies</h2><br>
<!-- <p style="color:#283747 ;margin-left:20px;">As publownload final camera-ready copies and generate proceeding preparation</p> -->

<table class="content-table">
  <thead>
    <tr>
      <th>Number</th>
      <th>Paper Title</th>
      <th>Abstract</th>
      <th>Author Name</th>
      <th>Organization</th>
      <th>Other Authors</th>
      <th>Download Paper</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $confId = $_SESSION['conf_id'];

    $query_result = mysqli_query($con,"select crrp.id as Id, crrp.title as Title, crrp.abstract as Abstract, a.fullname as aName,
    a.organization as Organization, crrp.otherAuthorDetails as otherAthors
    from camera_ready_research_paper as crrp, author as a
    where (crrp.conferenceId = $confId) and (crrp.authorEmail=a.emailauthor)");

    $count = 1;
    while($row = mysqli_fetch_assoc($query_result)){
  ?>
  <tr>
      <td><?= $count ?></td>
      <td><?= $row['Title'] ?></td>
      <td><?= $row['Abstract'] ?></td>
      <td><?= $row['aName'] ?></td>
      <td><?= $row['Organization'] ?></td>
      <td><?= $row['otherAthors'] ?></td>
      <td>
      <i class="fas fa-file-download" style="color:#1F618D;"></i><b> </b><a style="text-decoration:none;color:#1F618D" 
      href="route.php?downCameraRPId=<?= $row['Id']  ?> ">Download</a>
      </td>
  </tr>

  <?php
    $count++; }
  ?>
  
  </tbody>
</table>
</center>
 <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>
</html>
