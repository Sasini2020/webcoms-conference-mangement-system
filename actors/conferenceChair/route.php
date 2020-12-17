<?php

    session_start();
    if($_SESSION['login_s'] != '4'){
      header('location:../../login.php');
    }

      if(isset($_POST['mTrack']) && isset($_POST['id'])){
        if($_POST['mTrack'] == 'Add'){
          $_SESSION['c_id'] = $_POST['id'];
          header('location:defineTracks.php');
        }
        elseif($_POST['mTrack'] == 'View'){
          $_SESSION['c_id'] = $_POST['id'];
          header('location:viewTracksForCC.php');
          
        }else if($_POST['assignT']=='assign'){
                    header('Location:assignTrackchair.php');


        }
      }
    ?>