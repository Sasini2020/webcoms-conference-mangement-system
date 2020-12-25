<?php

    session_start();
    if($_SESSION['login_s'] != '4'){
      header('location:../../login.php');
    }
    
    if(isset($_GET['modifyTrackCId'])){
      $_SESSION['c_id'] = $_GET['modifyTrackCId'];
      header('location:modifyTracks.php');
    }
?>