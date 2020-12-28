<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '5'){
    header('location:../../login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign reviewers to Research Paper</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/sty.css">
	<link rel="stylesheet" href="../../css/table_style.css">
    <link rel="stylesheet" href="../../css/new_table_and_button.css">
    
</head>
<body>

<!-- Navigation -->
<nav>
    <div class="logo">Web-COMS</div>
   <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
          <i class="fas fa-bars"></i>
      </label>
    <ul>
      <li><a href="reaserchPaperList.php">Back</a></li>
    </ul>
</nav>

<div id="main-wrapper" style="margin:20px auto;height:360px">
        <center>
			<h2>Assign Reviewers to Reaserch Paper</h2>
		</center>
    <br>
        <form action="assignReviewersToRPaper.php" class="myform" method="post" style="height:280px;">
            <fieldset>
                <label for="selectR"><b>Choose Reviewers:</b><br>(Hold Ctrl to select multiple tracks)</label><br>
                <select name="selectedR[]" id="selectR" multiple="multiple" style="height: 100px;">
                    <?php
                        $conTrack = $_SESSION['conTrack_id'];
                        $query_result = mysqli_query($con,"select rit.reviewerEmail as eEmail 
                        from conferencetrack as ct, reviewer_interest_track as rit
                        where (ct.ID = $conTrack) and (ct.systemTrackId = rit.systemTrackID);");
                        
                        while($row = mysqli_fetch_assoc($query_result)){
                    ?>
                    <option value="<?= $row['eEmail'] ?>"><?= $row['eEmail'] ?></option>
                    <?php 
                        }
                    ?>
                </select>
            <button name="addR_btn" id='login_btn' value="addR" >Add Reviewer</button><br>
            </fieldset>
            <br>
        </form>
        <?php
            if(isset($_POST['addR_btn'])){
                $rPaperId = $_SESSION['rPaper_id'];
                $reviewerEmail = $_POST['selectedR'];
                $checkDTC = 0;

                foreach($reviewerEmail as $rEmail){
                    $query = mysqli_query($con,"select * from reviewerandpaper where (reviewerEmail='$rEmail') and (paperId=$rPaperId)");
                    
                    if(mysqli_num_rows($query)>0){
                        $checkDTC++;                        
                    }
                }

                if($checkDTC>0){
                    echo '<script type="text/javascript"> alert("You selected some Reviewer is allready added to Research Paper...!") </script>';
                }
                else{
                    foreach($reviewerEmail as $rEmail){
                        $query1 = mysqli_query($con,"insert into reviewerandpaper values(NULL,'$rEmail',$rPaperId)");
                    }
                    if($query1){
                        echo '<script type="text/javascript"> alert("Reviewer Adding process is successfully..!") </script>';
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