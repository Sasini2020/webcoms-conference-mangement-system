<?php

    session_start();
    if($_SESSION['login_s'] != '4'){
      header('location:../../login.php');
    }

      if(isset($_POST['mTrack']) && isset($_POST['id'])||isset($_POST['Cname'])){
        if($_POST['mTrack'] == 'Add'){
          $_SESSION['c_id'] = $_POST['id'];
          header('location:defineTracks.php');
        }
        elseif($_POST['mTrack'] == 'View'){
          $_SESSION['c_id'] = $_POST['id'];
          header('location:viewTracksForCC.php');

        }else if($_POST['mTrack']=='assign'){
          $_SESSION['c_id'] = $_POST['id'];
          $Cname=$_POST['Cname'];
                    header('Location:assignTrackchair.php?cname='.$Cname);


        }
      }
    ?>