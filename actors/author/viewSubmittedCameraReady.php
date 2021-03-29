<?php
	  session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../../css/nav_footer_styles.css">



  <title>Submitted Camera Ready Reaserch Paper</title>
  <style>
  .container{
      margin:20px;
  }
  table{
      margin-left:60px;
      min-width:300px ;
      color:black;
      font-weight:bold;
  }
  table td{
      min-width:20px;
      padding:30px;
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
      <!--<li><a href="trackchairhomepage.php">Back</a></li>-->
      <li><a href="submittedRPaperList.php">Back</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>

    <div class="container">
        <br>
        <h2>Submitted Camera Ready Paper Details</h2>
        <br>

        <?php
            $RP_Id = $_SESSION['rPaperId'];
            $query_result = mysqli_query($con,"select id, title, abstract, otherAuthorDetails from camera_ready_research_paper 
            where rPaperId=$RP_Id");
            $row = mysqli_fetch_assoc($query_result);
        ?>
        <table>
        <tr>
            <td>Title</td>
            <td>:</td>
            <td><?= $row['title'] ?></td>
        </tr>
        <tr>
            <td>Abstract  </td>
            <td>:</td>
            <td><?= $row['abstract'] ?></td>
        </tr>
        <tr>
            <td>Other authors </td>
            <td>:</td>
            <td><?= $row['otherAuthorDetails'] ?></td>
        </tr>
        <tr>
            <td>Download </td>
            <td>:</td>
            <td><i class="fas fa-file-download" style="color:#1F618D;"></i><b> </b><a style="text-decoration:none;color:#1F618D" 
            href="route.php?downCameraReadyPId=<?= $row['id'] ?>" >Download</a></td>
        </tr>
        </table>
    </div>
    
<!-- Footer section -->
<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>
</html>