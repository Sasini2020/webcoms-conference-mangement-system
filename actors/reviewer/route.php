<?php

    session_start();
    if($_SESSION['login_s'] != '2'){
      header('location:../../login.php');
    }

    /*   if(isset($_GET['f_id']) && isset($_GET['f_title']){
          $_SESSION['f_id'] = $_GET['f_id'];
          $_SESSION['f_title'] = $_GET['f_title'];

          header('location:addreview.php');
    } */
        
    if(isset($_GET['SytemTId'])){
      $_SESSION['sysTrackId'] = $_GET['SytemTId'];
      $_SESSION['sysTrackName'] = $_GET['trackName'];
      header('location:paperlist.php');
    }

    if(isset($_GET['addReviewRP_Id'])){
      $_SESSION['RPaperId'] = $_GET['addReviewRP_Id'];
      $_SESSION['RPaperTitle'] = $_GET['RP_title'];
      header('location:addreview.php');
    }

    if(isset($_GET['viewReviewRP_id'])){
      $_SESSION['RPaperId'] = $_GET['viewReviewRP_id'];
      $_SESSION['RPaperTitle'] = $_GET['RP_title'];
      header('location:viewreview.php');
    }
?>