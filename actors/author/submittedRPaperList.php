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


  <title>You Submitted Reaserch Paper List</title>

<style>

* {
  font-family: sans-serif; /* Change your font family */
}

.conListLink{
  color:white;
  text-shadow: 1px 1px 0 #444;
}

.conListLink:link,
.conListLink:link:visited{
  background-color: #00ccff;
  color: white;
  padding: 10px 20px;
  width:130px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}  

.conListLink:hover, 
.conListLink:active {
  background-color: #00b8e6;
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
      <li><a href="author_home.php">Back</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>
<body>
  
<br>
<div>
    <center>
    <h1 style="color:#111 ;margin-left:20px;">You Submitted Research Papers List</h1>

    <table class="content-table">
    <thead>
        <!-- file id -->
        <th>Number</th>
        <th>Paper Title</th> 
        <th>Abstrackt</th>
        <th>Co Authors</th>
        <th>Download</th>
        <th>Acceptancy</th>
        <th>Submit Camera Ready</th>
    </thead>
    <tbody>
      <?php
        $conId = $_SESSION['conId'];
        $aEmail = $_SESSION['au_email'];

        $queryResult = mysqli_query($con,"select * from researchpaper
        where (conferenceId = $conId) and (emailauthor = '$aEmail') order by idrp DESC");
        
        $count = 1;
        while($row = mysqli_fetch_assoc($queryResult)){
      ?>
      <tr>
          <td><?= $count ?></td>
          <td><?= $row['title'] ?></td>
          <td><?= $row['abstract'] ?></td>
          <td><?= $row['corautherdetails'] ?></td>
          <td><a href="route.php?downPId=<?= $row['idrp'] ?>">Downlode</a></td>
          <td>
            <?php
              /* show paper acceptancy or rejection flag
               0 = Pending
               1 = Accept
               2 = Reject */
              if($row['acceptancy'] == 0){
                echo '';
              }
            ?>
          </td>
          <td></td>
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
