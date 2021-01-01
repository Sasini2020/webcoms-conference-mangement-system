<?php

    session_start();
    if($_SESSION['login_s'] != '6'){
      header('location:../../login.php');
    }
    
    if(isset($_GET['CamSubGuid_Id'])){
      $_SESSION['c_id'] = $_GET['CamSubGuid_Id'];
      $_SESSION['c_name']= $_GET['Conf_Name'];;
      header('location:camera_ready_sub_guidelines.php');
    }
?>
