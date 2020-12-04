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
  <title>Track List</title>

   <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
	    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
	  <li><a class="active" href="conferencechairhomepage.php">Home</a></li>
      <li><a href="create_conference.php">Request a Conf</a></li>
      <li><a href="viewConferencesForCC.php">View Conf</a></li>
      <li><a href="addnotemplates.php">Add notification templates</a></li>
      <li><a href="upudetauls.php">Upload User Details</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>

<br><br>
  <center><h1>Track List</h1></center>
<br><br>

<div>
   <center>
   <table class="content-table">
     <thead>
         <tr>
         <th>Number</th>
         <th>Track Name</th>
         <th>Track Chair Name</th>
         </tr>
     </thead>

     <tbody>                                     
       <?php
            $c_id = $_SESSION['c_id'];
            $sql = mysqli_query($con, "select conferencetrack.ID ,conferencetrack.Name, trackchair.fullname
            from conferencetrack, trackchair
            where conferencetrack.trackChair = trackchair.emailtrackchair and
            conferencetrack.conferenceID='$c_id';") or die(mysqli_error($con));
            $counter = 1;
            while ($row = mysqli_fetch_assoc($sql)) {
       ?>                                            
           <tr id="row<?php echo $row['ID'];?>">

            <td><?=$counter?></td>
            <td><?=$row['Name']?></td>
            <td><?=$row['fullname']?></td>
           </tr>
     </tbody>
        <?php
            $counter++;}
        ?> 
     </table>	
	 </center>
 </div>



</body>
</html>
