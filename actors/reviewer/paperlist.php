<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<!-- Accessing the FilesLogic.php -->
<?php include 'filesLogic.php';?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/main_style.css">

  <title>Uploaded reseach papers</title>

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
  background-color: #148F77;
  color: white;
}
</style>
</head>
<body>
<!-- navbar -->
<nav>
    <ul>
    <li><a href="reviewerhomepagenew.php">Back</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="#">Help</a></li>


    </ul>
    <br /><br />
  </nav>
<h2></h2><br>
<h2 style="color:#F1C40F ;text-align:center;">Uploaded Research Papers</h2><br><br>
<h3 style="color:#2874A6 ;text-align:center;">For now reviewer can dowload and view all the papers.</h3>
<table id="papersDownloads">
<thead>
    <!-- file id -->
    <th>ID </th> 
    <th>Author's name</th>
    <th>File name</th>
    <th>Conference name</th>
    <th>University(Author)</th>
    <th>File size (in KB)</th>
    <th>Contact details</th>
    <th>Other links</th>
    <th>Downloads</th>
    <th>Action</th>

</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['id']; ?></td>
      <td><?php echo $file['full_name'];?></td>
      <td><?php echo $file['name']; ?></td>
  
  
      <!-- show conference name here in below php tag -->
      <td><?php ?></td>


      <td><?php echo $file['university'];?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['contact_details'];?></td>
      <td><?php echo $file['other_links'];?></td>
      <td><?php echo $file['downloads']; ?></td>
      <td><a href="paperslist.php?file_id=<?php echo $file['id'] ?>"> Download </a></td>
      

    
    
    </tr>
  <?php endforeach;?>

</tbody>
</table>

</body>
</html>
