<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Reviewer Home</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
     <link rel="stylesheet" href="../../css/table_style.css">
    <!--<link rel="stylesheet" href="../../css/main_style.css">-->

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



  <nav>
  <div class="logo">Web-COMS</div>
  <input type="checkbox" id="click">
  <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    <ul>
      


			<li><a class="active" href="reviewerhomepage.php">Home</a></li>
      <li><a href="ConferenceListForR.php">Conference List</a></li>
			<li><a href="paperlist.php">View papers</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		


    </ul>
  </nav>

  <br><br>

	<div id="main-wrapper">
		<center>
			<!--<h2>Reviewer Home Page</h2>
			<h3> Welcome </h3>
			<img src="../../imgs/webc.png" class="avatar"/>-->

      <h1 style="color:#283747 ;margin-left:20px;">Uploaded Research Papers</h1>


<table class="content-table">
<thead>
    <!-- file id -->
    <th>ID </th>
    <th>Paper Title</th> 
    <th>Author's name</th>
    <th>File</th>
    <th>Conference name</th>
    <th>University(Author)</th>
    
    
    
    


</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['id']; ?></td>
      <td><?php echo $file['title']; ?></td>
      <td><?php echo $file['full_name'];?></td>
      <td><?php echo $file['name']; ?></td>
  
  
      <!-- show conference name here in below php tag -->
      <td><?php ?></td>


      <td><?php echo $file['university'];?></td>
     


    
    
    </tr>
  <?php endforeach;?>

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
