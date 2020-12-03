<?php

      if(isset($_POST['mTrack']) && isset($_POST['id'])){
        if($_POST['mTrack'] == 'Add'){
          $_SESSION['c_id'] = $_POST['id'];
          header('location:defineTracks.php');
        }
        elseif($_POST['mTrack'] == 'Accept'){
          $r_id = $_POST['id'];
          $qur = mysqli_query($con,"update conferences set Accepted = '1' where id='$r_id'");
          header('location:requested_conferences.php');
        }
      }
    ?>