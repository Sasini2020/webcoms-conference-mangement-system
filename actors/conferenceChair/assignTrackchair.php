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

  <!-- import jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/jquery.dropdown.min.css">
  <script src="../../javascript/jquery.dropdown.min.js"></script>

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

<div id="main-wrapper" style="margin:20px auto;height:500px">
        <center>
			<h2>Assign Track chairs to Conference Track</h2>
		</center>
    <br>
        <form action="assignTrackchair.php" class="myform" method="post" style="height:280px;">
            <fieldset>
                <label for="selectTc"><b>Choose Track Chairs:</b><br>(Hold Ctrl to select multiple tracks)</label><br>

                <!-- Drop down list field -->

                <div class="dropDownWithSearch">
                  <select name="selectedTrC[]" id="selectTc" multiple="multiple" style="height: 100px; display:none">
                      <?php
                          $query_result = mysqli_query($con,"select * from trackchair;");
                          while($row = mysqli_fetch_assoc($query_result)){
                      ?>
                      <option value="<?= $row['emailtrackchair'] ?>"><?= $row['emailtrackchair'] ?></option>
                      <?php 
                          }
                      ?>
                  </select>
                </div>

                <br>

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

    <div style="margin:20px 40px;">
      <h2>Assigned Track Chairs Details</h2>

      <table class="content-table" style="">
        <thead>
          <tr>
            <th>Number</th>
            <th>Track Chair Email</th>
            <th>Title</th>
            <th>Full Name</th>
            <th>Organaization</th>
            <th>Country</th>
            <th>Contact Number</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $conTrackId = $_SESSION['TrackId_id'];
            $count = 1;
            $query_result = mysqli_query($con,"select tc.emailtrackchair as tcEmail, tc.title as title
            ,tc.fullname as fullName
            ,tc.organization as  organization
            ,tc.country as country
            ,tc.contactdetails as coNum
            from conferencetrack_and_trackchair as cttc, trackchair as tc 
            where (cttc.trackChairEmail = 	tc.emailtrackchair) and (cttc.conferenceTrackId = $conTrackId)  order by cttc.ID DESC")
            or die(mysqli_error($con));
            while($row = mysqli_fetch_assoc($query_result)){
          ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row['tcEmail'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['fullName'] ?></td>
            <td><?= $row['organization'] ?></td>
            <td><?= $row['country'] ?></td>
            <td><?= $row['coNum'] ?></td>
          </tr>
          <?php
            $count++;}
          ?>
        </tbody>
      </table>
    </div>

    <script type="text/javascript">

    $('.dropDownWithSearch').dropdown({
      // options here
      input:'<input type="text" maxLength="20" style="width:370px" placeholder="Search">',
      searchable:true,
      multipleMode: 'label',
      searchNoData: '<li style="color:#ddd">No Results</li>'
    });

  </script>

    <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
    </div>

</body>
</html>