<?php
	  session_start();
    if($_SESSION['login_s'] != '5'){
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
  <!--<link rel="stylesheet" href="../../css/style.css">-->
  <link rel="stylesheet" href="../../css/nav_footer_styles.css">


  <!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">-->
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <link rel="stylesheet" href="../../css/table_style.css">


  <title>Reaserch Paper List</title>

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
  min-width: 1400px;
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
  margin:10px auto;
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
      <!--<li><a href="trackchairhomepage.php">Back</a></li>-->
      <li><a href="selectConferenceTrack.php">Back</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>
<body>
  
<br>
<div>
    <center>
    <h1 style="color:#111 ;margin-left:20px;">Research Papers</h1>

    <table class="content-table">
    <thead>
        <!-- file id -->
        <th>Number</th>
        <th>Paper Title</th> 
        <th>Abstrackt</th>
        <th>Author name</th>
        <th>Co Authors</th>   
        <th>Organization(Author)</th>
        <th>Contact Number(Author)</th>
        <th>Download</th>
        <th>Assign Reviewers</th>
        <th>Accept/Reject</th>
        <th>Acceptancy</th>
    </thead>
    <tbody>
      <?php
        $conTrackId = $_SESSION['conTrack_id'];
        $queryResult = mysqli_query($con,"select rp.idrp as p_id, rp.title as Title, rp.abstract as Abstract, a.fullname as aName,
        rp.corautherdetails as coAuthors, a.organization as aOrganization, a.contactdetails as aConNum, rp.acceptancy as p_acceptancy
        from researchpaper as rp, author as a 
        where (rp.trackID = $conTrackId) and (rp.emailauthor = a.emailauthor)");
        
        $count = 1;
        while($row = mysqli_fetch_assoc($queryResult)){
      ?>
      <tr>
          <td><?= $count ?></td>
          <td><?= $row['Title'] ?></td>
          <td><?= $row['Abstract'] ?></td>
          <td><?= $row['aName'] ?></td>
          <td><?= $row['coAuthors'] ?></td>
          <td><?= $row['aOrganization'] ?></td>
          <td><?= $row['aConNum'] ?></td>
          <td><a href="route.php?downPId=<?= $row['p_id'] ?>">Downlode</a></td>
          <td></td>
          <td></td>
          <td>
            <?php
              /* show paper acceptancy or rejection flag
               0 = ---
               1 = Accept
               2 = Reject */
              if($row['p_acceptancy'] == 0){
                echo '---';
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
