
<!-- Accessing the FilesLogic.php -->
<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <link rel="stylesheet" href="../../css/table_style.css">
  <title>Uploaded reseach papers</title>

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
  text-align:left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 15px 11px;
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


<center>
<table class="content-table">
<thead>
    <!-- file id -->
    <th>Paper ID</th>
    <th>Paper Title</th> 
    <th>Track Name</th>
    <th>Conference Name</th>
    <th>Action</th>
    <th>Review & Discussion</th>

   
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['id']; ?></td>
      <td><?php echo $file['title']; ?></td>
      <!-- show conference name here in below php tag -->
      <td><?php ?></td>
      <td><?php ?></td>

      <td><i class="fas fa-file-download" style="color:#1A5276;"></i><a style="text-decoration:none;color:dodgerblue;" href="paperslist.php?file_id=<?php echo $file['id'] ?>"> Download paper</a>
      <br><br>
      <i style="color:#1A5276" class="fas fa-eye"></i><a style="color:dodgerblue ;text-decoration:none;" href="../../uploads/<?php echo $file['name']; ?>" target="_blank">View paper</a>
      <br><br>
      <!-- <i style="color:#1A5276" class="fas fa-newspaper"></i><a style="text-decoration:none;color:dodgerblue;" href="../../uploads/<?php echo $file['name']; ?>"> View abstract</a> -->
      <i style="color:#1A5276" class="fas fa-newspaper"></i><a style="text-decoration:none;color:dodgerblue;" href="#"> View abstract</a>

      <br><?php echo $file['abstract']; ?>
      </td>

			<!-- echo "<a href='papersubmission.php?c_id=". $row['id'] ."' title='submit paper' class='linkDec'><span ></span><img src='../../imgs/sub.png' height='25' width='25' />Submit</a>"; -->
      <td>
      <?php

      echo "<i class='far fa-plus-square' style='color:#1A5276'></i><a href='route.php?f_id=".$file['id']." & f_title=".$file['title']." ' style='color:#1A5276; text-decoration:none;'> Add Review        </a> ";
      echo "<br><br>";
      echo "<i class='fas fa-pen' style='color:#1A5276'></i><a href='#.php?f_id=".$file['id']." & f_title=".$file['title']." ' style='color:#1A5276; text-decoration:none;'> Edit Review </a> ";
      echo "<br><br>";
      echo "<i class='fas fa-eye' style='color:#1A5276'></i><a href='#.php?f_id=".$file['id']." & f_title=".$file['title']." ' style='color:#1A5276; text-decoration:none;'> View Review </a> ";

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
