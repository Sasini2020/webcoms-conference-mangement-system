<?php
	  session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Ready Research Paper Abstract</title>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">

    <style>
    .container{
        margin: 20px;
    }
    .sub_con{
        margin:20px;
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
      <li><a href="viewcamerareadycopies.php">Back</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>

<br>
<div class="container">
    <h2>Camera Ready Research Paper Abstract</h2>

    <div class="sub_con">

        <?php
            $CRPId = $_SESSION["CameraReadyPaperId"];

            $mysqli_query = mysqli_query($con,"select abstract from camera_ready_research_paper where id = $CRPId");

            $row = mysqli_fetch_assoc($mysqli_query);

            echo $row['abstract'];
        ?>
    
    </div>

</div>

<!-- Footer section -->
<div class="footer">
    <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
</div>
    
</body>
</html>