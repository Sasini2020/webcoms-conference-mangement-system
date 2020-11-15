<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
?>
<!-- Accessing the FilesLogic.php -->
<?php include 'fileLogicCameraReady.php';?>
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

  <title>Uploaded camera ready copies</title>

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
<!-- navbar -->
<nav>
  <div class="logo">Web-COMS</div>
        <input type="checkbox" id="click">
              <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
              </label>
    <ul>
    <li><a href="publicationchairhomepage.php">Back</a></li>
    <li><a class="active" href="viewcamerareadycopies.php">View Camera-Ready Copies</a></li>
    <li><a href="../../About.php">About</a></li>
    <li><a href="../../help.php">Help</a></li>

    </ul>
  </nav>
<h2></h2><br>
<center>
<h2 style="color:#283747 ;margin-left:20px;">Uploaded camera ready copies</h2><br>
<!-- <p style="color:#283747 ;margin-left:20px;">As publownload final camera-ready copies and generate proceeding preparation</p> -->

<table class="content-table">
<thead>
    <!-- file id -->
    <th>ID </th> 
    <!-- <th>Author's name</th> -->
    <th>Paper Title</th>
    <th>File</th>
    <th>Conference name</th>
    <th>University(Author)</th>
    <th>File size (in KB)</th>
    <!-- <th>Contact details</th>
    <th>Other links</th> -->
    <th>Downloads</th>
    <th>Action</th>


</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['crc_id']; ?></td>
      <td><?php echo $file['title']; ?></td>
      <td><?php echo $file['name']; ?></td>
  
  
      <!-- show conference name here in below php tag -->
      <td><?php ?></td>
      <td><?php ?></td>

      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['downloads']; ?></td>
      
      <td><i class="fas fa-download" style="color:dodgerblue;" ></i><a style="text-decoration:none;color:dodgerblue;" href="viewcamerareadycopies.php?file_id=<?php echo $file['crc_id'] ?>"> Download </a></td>

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
