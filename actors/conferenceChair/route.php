<?php

    session_start();
    if($_SESSION['login_s'] != '4'){
      header('location:../../login.php');
    }
    
    if(isset($_GET['modifyTrackCId'])){
      $_SESSION['c_id'] = $_GET['modifyTrackCId'];
      header('location:modifyTracks.php');
    }

    if(isset($_GET['cTrackId'])){
      $_SESSION['TrackId_id'] = $_GET['cTrackId'];
      header('location:assignTrackchair.php');
    }

    if(isset($_GET['assignPubC_CId'])){
      $_SESSION['c_id'] = $_GET['assignPubC_CId'];
      header('location:assignPublicationChairToConference.php');
    }
    if(isset($_GET['Conf_Id'])){
      $_SESSION['c_id'] = $_GET['Conf_Id'];
      $_SESSION['c_name']= $_GET['Conf_Name'];;
      header('location:publish_conf_guidelines.php');
    }

    if(isset($_GET['ReportConf_Id'])){
      $_SESSION['c_id'] = $_GET['ReportConf_Id'];
      $_SESSION['c_name']= $_GET['ReportConf_Name'];;
      header('location:researchPapersReport.php');
    }
?>
