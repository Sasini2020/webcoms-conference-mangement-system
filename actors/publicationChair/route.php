<?php

    session_start();
    if($_SESSION['login_s'] != '6'){
      header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
    
    if(isset($_GET['CamSubGuid_Id'])){
      $_SESSION['c_id'] = $_GET['CamSubGuid_Id'];
      $_SESSION['c_name']= $_GET['Conf_Name'];;
      header('location:camera_ready_sub_guidelines.php');
    }

    if(isset($_GET['cameraReadyConfId'])){
      $_SESSION['conf_id'] = $_GET['cameraReadyConfId'];
      header('location:viewcamerareadycopies.php');
    }

    //camera ready download
  if (isset($_GET['downCameraRPId'])) {
    $id = $_GET['downCameraRPId'];

    // fetch file to download from database
    $sql = "SELECT * FROM camera_ready_research_paper WHERE id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../uploads/cameraReadyUploads/' . $file['NameOfFile'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../uploads/cameraReadyUploads/' . $file['NameOfFile']));
        readfile('../../uploads/cameraReadyUploads/' . $file['NameOfFile']);

        exit;
    }

    header('location:viewcamerareadycopies.php');
    
  }
?>
