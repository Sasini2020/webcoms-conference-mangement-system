<?php
	session_start();
    if($_SESSION['login_s'] != '5'){
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
  <!--<link rel="stylesheet" href="../../css/style.css">-->
  <link rel="stylesheet" href="../../css/nav_footer_styles.css">


  <!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">-->
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
  background-color: #5DADE2;
  color: white;
}
</style>-->
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
    <li><a href="trackchairhomepage.php">Back</a></li>
    <li><a class="active" href="firstround.php">First Round Paper Evaluation</a></li>
    <li><a href="../../About.php">About</a></li>
    <li><a href="../../help.php">Help</a></li>
    </ul>
  </nav>
<body>
  
<br>
<center>
<h1 style="color:#111 ;margin-left:20px;">Uploaded Research Papers</h1>

<table class="content-table">
<thead>
    <!-- file id -->
    <th>ID </th>
    <th>Paper Title</th> 
    <th>Author's name</th>
    <th>Research paper</th>
    <!--<th>Conference name</th>-->
    <th>University(Author)</th>
    <th>File size (in KB)</th>
    <th>Contact details</th>
    <th>Other links</th>
    <th>Downloads</th>
    <th>Action</th>
    <th>Action</th>
    <th>Action</th>
    <th>Action</th>


</thead>
<tbody>




  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['id']; ?></td>
      <td><?php echo $file['title']; ?></td>
      <td><?php echo $file['full_name'];?></td>
      <td><?php echo $file['name']; ?></td>
  
  
      <!-- show conference name here in below php tag 
      <td><?php ?></td>-->


      <td><?php echo $file['university'];?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['contact_details'];?></td>
      <td><?php echo $file['other_links'];?></td>
      <td><?php echo $file['downloads']; ?></td>
      <td><i style="color:dodgerblue" class="fas fa-download"></i><a style="color:dodgerblue;text-decoration:none;" href="firstround.php?file_id=<?php echo $file['id'] ?>"> Download </a></td>
      <td><i style="color:#1A5276" class="fas fa-eye"></i><a style="color:#1A5276 ;text-decoration:none;" href="../../uploads/<?php echo $file['name']; ?>" target="_blank">View</a></td>

      <!--<td><i style="color:red" class="fas fa-trash-alt"></i> style="color:red;text-decoration:none;" type="submit" name="action" Value="Reject">Reject</a></td>-->
      <form action="firstround.php" method="post">
          <td><i style="color:red" class="fas fa-trash-alt"></i><input style="color:red;text-decoration:none;" type="submit" name="action" Value="Reject" /></td>
          <input type="hidden" name="id" value="<?php echo $file['id']; ?>" />
          <input type="hidden" name="accept" value="<?php echo $file['accept'];?>"/>
      </form>
      <td><i style="color:#2ECC71 " class="fas fa-share-square"></i><a href="firstround.php?p_id=<?php echo $file['id'];?>" style="color:green;text-decoration:none;">Assign</a></td>

    
    
    </tr>
 

  
</tbody>
<?php endforeach;?>
   <?php
        if(isset($_POST['action']) && isset($_POST['id'])){
           if($_POST['action']=='Reject'){
             $t_id=$_POST['id'];
             if($_POST['accept']=='1'){
              echo '<script type="text/javascript">alert("Already  Rejected this paper")</script>';
  
             }else{
             $qr=mysqli_query($conn,"update files set accept='1' where id='$t_id'");
             echo '<script type="text/javascript">alert("Rejected Successfully")</script>';
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
