<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
      header('location:../../login.php');
    }
    require '../../dbconfig/config.php';

    if(isset($_GET['Conf_Id'])){
        $_SESSION['c_id'] = $_GET['Conf_Id'];
        $_SESSION['c_name']= $_GET['Conf_Name'];
        
        header('location:ViewConfGuidelines.php');
    }
    
?>

