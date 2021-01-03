<?php
	  session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!-- Accessing the FilesLogic.php -->
<?php //include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <link rel="stylesheet" href="../../css/table_style.css">


  <title>My Submitted Reaserch Papers List</title>

<style>

.conListLink{
  color:white;
  /* text-shadow: 1px 1px 0 #444; */
}

.conListLink:link,
.conListLink:link:visited{
  background-color: dodgerblue;
  color: white;
  padding: 7px 15px;
  width:110px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius:6px;
}  

.conListLink:hover, 
.conListLink:active {
  background-color: #00b8e6;
}

.content-table {
  border-collapse: collapse;
  color:black;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 100%;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  display:block;
  overflow-x: auto;
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
  min-width:200px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid dodgerblue;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

.isDisable{
  color:currentColor;
  cursor:default;
  pointer-events:none;
  opacity:0.5;
  text-decoration:none;
}

.linkDec, .link:visited{
  text-decoration:none;
  color:currentColor;
}
.forAbstract{
  min-width:500px !important;
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
      <!--<li><a href="trackchairhomepage.php">Back</a></li>-->
      <li><a href="author_home.php">Back</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>
  
<br>
<div>
    
    <h2 style="color:#34495E ;margin-left:20px;">My Submissions </h2>
    <center>
    <table class="content-table">
    <thead>
        <!-- file id -->
        <th>Number</th>
        <th>Paper Title</th> 
        <th class="forAbstract">Abstract</th>
        <th>Other Authors</th>
        <th>Download</th>
        <th>Acceptancy</th>
        <!--<th>View Camera-Ready <br>Submission Guidelines</th>-->
        <th>Submit Camera Ready</th>
        <th>View Submitted Camera Ready</th>
    </thead>
    <tbody>
      <?php

        $conId = $_SESSION['conId'];
        $conName=$_SESSION['conName'];
        $aEmail = $_SESSION['au_email'];

        $queryResult = mysqli_query($con,"select * from researchpaper
        where (conferenceId = $conId) and (emailauthor = '$aEmail') order by idrp DESC");
        
        $count = 1;
        while($row = mysqli_fetch_assoc($queryResult)){
      ?>
      <tr>
          <td><?= $count ?></td>
          <td><?= $row['title'] ?></td>
          <td class="forAbstract"><?= $row['abstract'] ?></td>
          <td><?= $row['corautherdetails'] ?></td>
          <td><i class="fas fa-file-download" style="color:#1F618D;"></i><b> </b><a style="text-decoration:none;color:#1F618D" href="route.php?downPId=<?= $row['idrp']  ?> ">Download</a></td>
          <td>
            <?php
              /* show paper acceptancy or rejection flag
               0 = Pending
               1 = Accept
               2 = Reject */
              if($row['acceptancy'] == 0){
                echo 'Pending';
              }
              elseif($row['acceptancy'] == 1){
                echo 'Accept';
              }
              elseif($row['acceptancy'] == 2){
                echo 'Reject';
              }
            ?>
          </td>
         
          <!--<td>
            <?php 
              //echo "<a href='route.php?CamSubGuid_Id=". $conId. " &CamSubGuid_Name=".$conName." '    class='conListLink' > View </a>";
            ?>
          </td>-->
          <td>
              <?php
                if($row['acceptancy'] == 1){
                  if($row['isCameraReadyUpload'] == 0){
                    echo "<a href='route.php?submiteCameraReadyRPId=".$row['idrp']." ' title='Submit Camera Ready Reaserch Paper' 
                    class='linkDec'>
                    <span style='margin-right:5px;'><i class='fas fa-file-upload'></i></span>Submit</a>"; 
                  }
                  elseif($row['isCameraReadyUpload'] == 1){
                    echo 'Submitted';
                  }
                }else{
                  echo "<a href='route.php?submiteCameraReadyRPId=".$row['idrp']." ' title='Submit Camera Ready Reaserch Paper' 
                  class='linkDec isDisable'>
                  <span style='margin-right:5px;'><i class='fas fa-file-upload'></i></span>Submit</a>"; 
                }
              ?>
          </td>
          <td>
                <?php
                  if(($row['acceptancy'] == 1) and ($row['isCameraReadyUpload'] == 1)){
                    echo "<a href='route.php?viewSubmittedCameraReadyPId=".$row['idrp']."' class='conListLink' > View </a>";
                  }
                  else{
                    echo "<a href='route.php?viewSubmittedCameraReadyPId=".$row['idrp']."' class='conListLink isDisable' > View </a>";
                  }
                ?>
          </td>
      </tr>

      <?php 
          $count++; 
        } 
      ?>
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
