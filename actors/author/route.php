<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
      header('location:../../login.php');
    }
    require '../../dbconfig/config.php';

    if(isset($_GET['viewRPaper_cid'])){
        $_SESSION['conId'] = $_GET['viewRPaper_cid'];
        header('location:submittedRPaperList.php');
    }
    if(isset($_GET['ConfGuid_Id'])){
      $_SESSION['c_id'] = $_GET['ConfGuid_Id'];
      header('location:ViewConfGuidelines.php');
  }
    // ConfGuid_Id
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

      header('location:submittedRPaperList.php');
      
    }
?>
