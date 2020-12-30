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
      <li><a href="publicationchairhomepage.php">Home</a></li>
			<li><a href="publishSubmissionGuidelines.php">Upload Guidelines For Paper Submission</a></li>
			<li><a href="uploadcoversub.php">Upload Pages</a></li>
			<li><a class="active" href="viewcamerareadycopies.php">View Camera-ready copy</a></li>
			<li><a href="autoproceeding.php">Auto generate proceeding</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

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
    <th>Action</th>
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
      
      <form action="viewcamerareadycopies.php" method="post">

       <td><i style="color:red" class="fas fa-trash-alt"></i><input style="color:red;text-decoration:none;" name="action" type="submit" value="Reject"/></td>
       <td><i style="color:#2ECC71" class="fas fa-share-square"></i><input style="color:green;text-decoration:none;" name="action" type="submit" value="Accept" /></td>
           <input type="hidden" name="crc_id" value="<?php echo $file['crc_id']; ?>"  />
           <input type="hidden" name="button" value="<?php echo $file['button'];?>" />
      </form>
      <!--<td><i style="color:red" class="fas fa-trash-alt"></i><a href="#"style="color:red;text-decoration:none;">Reject</a></td>
      <td><i style="color:#2ECC71 " class="fas fa-share-square"></i><a href="#" style="color:green;text-decoration:none;">Accept</a></td>-->
    </tr>
 

</tbody>
<?php endforeach;?>

<?php
   if(isset($_POST['action'])&& isset($_POST['crc_id'])){

      if($_POST['action']=='Reject'){
        $p_id=$_POST['crc_id'];
              if($_POST['button']=='1'){
                  echo '<script type="text/javascript">alert("Already  Rejected")</script>';

              }else{
                   $qr=mysqli_query($conn,"update camerareadycopypaper set button='1' where crc_id='$p_id'");
                   echo '<script type="text/javascript">alert("Rejected low quality camera ready copies ")</script>';

              }
      }
      elseif($_POST['action']=='Accept'){
        $p_id=$_POST['crc_id'];
             if($_POST['button']=='2'){

                 echo '<script type="text/javascript">alert("Already  Rejected")</script>';
             }else{
                 $qr=mysqli_query($conn,"update camerareadycopypaper set button='2' where crc_id='$p_id'");
                 echo '<script type="text/javascript">alert("Accepted")</script>';

             }

      }

   }


?>
</table>
</center>
 <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>
</html>
