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

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <link rel="stylesheet" href="../../css/table_style.css">
  <title>Uploaded reseach papers</title>

<!-- Added css to style tag to style table -->
  <!--<style>
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
</style>-->
<!-- Added css to style tag to style table -->
<style>
*{
color:#283747;
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
<nav>
<div class="logo">Web-COMS</div>
        <input type="checkbox" id="click">
              <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
              </label>
      <ul>
      <!--<li><a href="reviewform.php">Submit paper review comment</a></li>-->
      <!-- <li><a href="reviewerhomepage.php">Back</a></li> -->
        <li><a class="active" href="paperlist.php">Uploaded Papers</a></li>
        <li><a href="../../About.php">About</a></li>
        <li><a href="../../help.php">Help</a></li>
        <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

        <!--<li><a href="reviewerhomepagenew.php">Back</a></li>-->

      </ul>
</nav>
<br>
<h2 style="color:#283747 ;margin-left:20px;">Uploaded Research Papers</h2>

<center>
<table class="content-table">
<thead>
    <!-- file id -->
    <th>Paper ID</th>
    <th>Paper Title</th> 
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
      <td><i class="fas fa-file-download" style="color:#1A5276;"></i><a style="text-decoration:none;color:dodgerblue;" href="paperslist.php?file_id=<?php echo $file['id'] ?>"> Download </a>
      <br><br>
      <!-- <i style="color:#1A5276" class="fas fa-newspaper"></i><a style="text-decoration:none;color:dodgerblue;" href="../../uploads/<?php echo $file['name']; ?>"> View abstract</a> -->
      <i style="color:#1A5276" class="fas fa-newspaper"></i><a style="text-decoration:none;color:dodgerblue;" href="#"> View abstract</a>

      <br><?php echo $file['abstract']; ?>
      </td>


      <td><i class="fas fa-pen-square" style="color:#1A5276;"></i><a style="text-decoration:none;color:dodgerblue;" href="addreview.php"> Add Review </a>
      <br><br><i class="fas fa-edit" style="color:#1A5276;"></i><a style="text-decoration:none;color:dodgerblue;" href="editreview.php"> Edit Review </a>
      <br><br><i class="far fa-eye"style="color:#1A5276;"></i><a style="text-decoration:none;color:dodgerblue;" href="viewreview.php"> View Review </a></td>

      
      
      


    
    
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
