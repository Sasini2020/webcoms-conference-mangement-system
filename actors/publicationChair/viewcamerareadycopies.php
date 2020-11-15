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

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/nav_footer_styles.css">

  <title>Uploaded camera ready copies</title>

<!-- Added css to style tag to style table -->
  <style>
#papersDownloads {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#papersDownloads td, #papersDownloads th {
  border: 1px solid #ddd;
  padding: 8px;
}

#papersDownloads tr:nth-child(even){background-color: #f2f2f2;}

#papersDownloads tr:hover {background-color: #ddd;}

#papersDownloads th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: dodgerblue;
  color: white;
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
<h2 style="color:#283747 ;margin-left:20px;">Uploaded camera ready copies</h2><br>
<!-- <p style="color:#283747 ;margin-left:20px;">As publownload final camera-ready copies and generate proceeding preparation</p> -->

<table id="papersDownloads">
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
 <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>
</html>
