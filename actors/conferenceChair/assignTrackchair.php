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

  <title>Assign Track Cahir</title>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/sty.css">
	<link rel="stylesheet" href="../../css/table_style.css">
  <link rel="stylesheet" href="../../css/new_table_and_button.css">

</head>
<body>
<nav>
   <div class="logo">Web-COMS</div>
   <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
          <i class="fas fa-bars"></i>
      </label>
    <ul>
      <li><a href="modifyTracks.php">Back</a></li>
    </ul>
</nav>

<div id="main-wrapper" style="margin:20px auto;height:360px">
        <center>
			<h2>Assign Track chairs to Conference Track</h2>
		</center>
    <br>
        <form action="assignTrackchair.php" class="myform" method="post" style="height:280px;">
            <fieldset>
                <label for="selectTc"><b>Choose Track Chairs:</b><br>(Hold Ctrl to select multiple tracks)</label><br>
                <select name="selectedTrC[]" id="selectTc" multiple="multiple" style="height: 100px;">
                    <?php
                        $query_result = mysqli_query($con,"select * from trackchair;");
                        while($row = mysqli_fetch_assoc($query_result)){
                    ?>
                    <option value="<?= $row['emailtrackchair'] ?>"><?= $row['emailtrackchair'] ?></option>
                    <?php 
                        }
                    ?>
                </select>
            <button name="addTrackC_btn" id='login_btn' value="addTC" >Add Track Chair</button><br>
            </fieldset>
            <br>
        </form>
        <?php
            if(isset($_POST['addTrackC_btn'])){
                $conTrackId = $_SESSION['TrackId_id'];
                $trackChairEmail = $_POST['selectedTrC'];
                $checkDTC = 0;

                foreach($trackChairEmail as $trackCE){
                    $query = mysqli_query($con,"select * from conferencetrack_and_trackchair where (conferenceTrackId=$conTrackId) and (trackChairEmail='$trackCE')");
                    
                    if(mysqli_num_rows($query)>0){
                        $checkDTC++;
                        
                    }
                }

                if($checkDTC>0){
                    echo '<script type="text/javascript"> alert("You selected some Track Chair is allready added to this conference Track...!") </script>';
                }
                else{
                    foreach($trackChairEmail as $trackCE){
                        $query1 = mysqli_query($con,"insert into conferencetrack_and_trackchair values(NULL,$conTrackId,'$trackCE')");
                    }
                    if($query1){
                        echo '<script type="text/javascript"> alert("Track Chair Adding process is successfully..!") </script>';
                    }
                    else{
                        echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
                    }
                }              
            }
        ?>
    </div>
    <hr>

    <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
    </div>

</body>
</html>