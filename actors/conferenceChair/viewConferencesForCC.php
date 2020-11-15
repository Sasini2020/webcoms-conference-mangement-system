<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '4'){
    header('location:../../login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View conferences</title>
  
  
  <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
	    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  <style>
    #CTadd{
      padding:1px 8px;
      background-color:#ff66ff;
      border:2px solid #7a7a52;
      border-radius:10px;
    }
    #CTview{
      padding:1px 4px;
      background-color:#00ffff;
      border:2px solid #7a7a52;
      border-radius:10px;
    }


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


.dot {
  height: 8px;
  width: 8px;
  background-color: #86B0DD;
  border-radius: 50%;
  margin-bottom:2px;
  margin-left:28px;
  margin-right:5px;
  display: inline-block;
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
	  <li><a href="conferencechairhomepage.php">Home</a></li>
      <li><a href="create_conference.php">Create a Conf</a></li>
      <li><a class="active" href="viewConferencesForCC.php">View Conf</a></li>
      <li><a href="addnotemplates.php">Add notification templates</a></li>
      <li><a href="upudetauls.php">Upload User Details</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>

<br><br>
		<center><h2 style="margin-left:25px;color:dodgerblue;">Conference List</h2></center>


<div>
   <center>
   <table class="content-table">
     <thead>
         <tr>
         <th>ID</th>
         <th>Conference</th>
         <th>Venue</th>
         <th>Start date</th>
         <th>End date</th>
         <th>Deadline</th>
         <th>Sposer details</th>
         <th>Modify Tracks</th>
         </tr>
     </thead>
	 </center>

     <tbody>                                     
       <?php
            $c_email = $_SESSION['c_email'];
            $sql = mysqli_query($con, "select *
            from conferences
            where (Accepted='1')and(emailconfchair='$c_email');") or die(mysqli_error($con));
            $counter = 1;
            while ($row = mysqli_fetch_assoc($sql)) {
       ?>                                            
           <tr id="row<?php echo $row['id'];?>">

            <td><?=$counter?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['venue']?></td>
            <td><?=$row['start_date']?></td>
            <td><?=$row['end_date']?></td>
            <td><?=$row['deadline_date']?></td>
            <td><?=$row['sponsor_details']?></td>
            <td style="padding-left: 20px;">
                <form action="viewConferencesForCC.php" method="post">		                                   
                    <input type="submit" name="mTrack" Value="Add" id="CTadd"/>
                    <input type="submit" name="mTrack" Value="View" id="CTview" />
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                </form>
            </td>
           </tr>
     </tbody>
        <?php
            $counter++;}
        ?>


                
     </table>	
 </div>
 
  <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>


</body>
</html>
