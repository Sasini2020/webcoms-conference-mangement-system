<?php
    session_start();
    require '../../dbconfig/config.php';
    if($_SESSION['login_s'] != '5'){
      header('location:../../login.php');
    }
    if(isset($_GET['c_selected'])){
        $_SESSION['c_id'] = $_GET['c_selected'];
        header('location:selectConferenceTrack.php');
    }

    if(isset($_GET['cTrack_selected'])){
      $_SESSION['conTrack_id'] = $_GET['cTrack_selected'];
      header('location:reaserchPaperList.php');
    }

    // Downloads files
    if (isset($_GET['downPId'])) {
      $id = $_GET['downPId'];

      // fetch file to download from database
      $sql = "SELECT * FROM researchpaper WHERE idrp=$id";
      $result = mysqli_query($con, $sql);

      $file = mysqli_fetch_assoc($result);
      $filepath = '../../uploads/' . $file['NameOfFile'];

      if (file_exists($filepath)) {
          header('Content-Description: File Transfer');
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename=' . basename($filepath));
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize('../../uploads/' . $file['NameOfFile']));
          readfile('../../uploads/' . $file['NameOfFile']);

          // Now update downloads count
          exit;
      }
      
      header('location:reaserchPaperList.php');
      
    }
?>