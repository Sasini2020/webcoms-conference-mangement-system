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
    <style>
    .paperAcceptT{
      width:500px !important;
    }

    .paperAcceptT th,td{
      text-align:center;
    }
    </style>
    
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

<br>
<h4 style="color:#2E4053 ;margin-left:20px;">Paper Title<span style=margin-left:40px;>: &nbsp;&nbsp;
  <?php 
        $f_title = $_SESSION['rPaperTitle'];
        echo "$f_title";
  ?>
</span></h4>
<br>

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
                        $query1 = mysqli_query($con,"insert into reviewerandpaper values(NULL,'$rEmail',$rPaperId,0)");
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

    <div style="margin:20px 40px;">
      <h2>Assigned Reviewers Details and Their Reviews</h2>

      <table class="content-table" style="">
        <thead>
          <tr>
            <th>Number</th>
            <th>Reviewer Email</th>
            <th>Title</th>
            <th>Full Name</th>
            <th>Organaization</th>
            <th>Country</th>
            <th>Contact Number</th>
            <th>View Review</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $rPaperId = $_SESSION['rPaper_id'];
            $count = 1;
            $query_result = mysqli_query($con,"select r.emailreviewer as rEmail, r.title as title, r.fullname as fullName,
            r.organization as organization, r.country as country, r.contactdetails as coNum, rp.isReviewed as isReview
            from reviewerandpaper as rp, reviewer as r
            where (rp.paperId = $rPaperId) and (rp.reviewerEmail = r.emailreviewer)
            order by rp.ID DESC")
            or die(mysqli_error($con));
            while($row = mysqli_fetch_assoc($query_result)){
          ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row['rEmail'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['fullName'] ?></td>
            <td><?= $row['organization'] ?></td>
            <td><?= $row['country'] ?></td>
            <td><?= $row['coNum'] ?></td>
            <td>
              <?php
                if($row['isReview'] == 0){
                  echo "Not yet Review";
                }
                elseif($row['isReview'] == 1){
                  echo "<i class='fas fa-eye' style='color:#1A5276'></i><a href='route.php?showReviewREmail=".$row['rEmail']."' 
                  style='color:#1A5276; text-decoration:none;'> View Review </a>";
                }
              ?>
            </td>
          </tr>
          <?php
            $count++;}
          ?>
        </tbody>
      </table>
    </div>

    <hr>
    <br>

    <div style="margin:20px 40px;">
      <h2>Accept / Reject research paper</h2>
      <table class="content-table paperAcceptT">
        <thead>
          <tr>
            <th>Accept / Reject</th>
            <th>Acceptancy</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="route.php?acceptRPaper=<?= $rPaperId ?>" style="text-decoration:none;color:#1F618D" ><i class="fa fa-check" aria-hidden="true" style="color:#1F618D"></i><b> </b>Accept</a>
                <br><br>
              <a href="route.php?rejectRPaper=<?= $rPaperId ?>" style="text-decoration:none;color:#1F618D" ><i class="fa fa-times" aria-hidden="true"></i><b> </b>Reject</a>
              <br><br>
              <a href="route.php?pendingRPaper=<?= $rPaperId ?>" style="text-decoration:none;color:#1F618D" ><b> </b>Pending</a>
            </td>
            <td>
              <?php
                $query_result = mysqli_query($con, "select acceptancy from researchpaper where idrp = $rPaperId");
                $row = mysqli_fetch_assoc($query_result);
                if($row['acceptancy'] == 0){
                  echo '---';
                }
                elseif($row['acceptancy'] == 1){
                  echo 'Accept';
                }
                elseif($row['acceptancy'] == 2){
                  echo 'Reject';
                }
              ?>
            </td>
          </tr>
        </tbody>      
      </table>
    </div>
 
<div class="footer">
    <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
</div>
</body>
</html>