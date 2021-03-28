<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
      header('location:../../login.php');
    }
    require '../../dbconfig/config.php';

    if(isset($_GET['viewRPaper_cid'])){
        $_SESSION['conId'] = $_GET['viewRPaper_cid'];
        $_SESSION['conName']=$_GET['con_Name'];

        header('location:submittedRPaperList.php');

    }

    //For Conference Guidelines
    if(isset($_GET['ConfGuid_Id'])){
      $_SESSION['c_id'] = $_GET['ConfGuid_Id'];
      $_SESSION['c_name'] = $_GET['Conf_Name'];

      include 'FileLogicForViewConfGuidelines.php';
      header('location:ViewConfGuidelines.php');
   }

   //In submitted research paper list this is passed to download submitted research paper
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

          exit;
      }

      header('location:submittedRPaperList.php');
      
    }

    //For Camera Ready Submission Guidelines
  if(isset($_GET['CamSubGuid_Id'])){
    $_SESSION['c_id'] = $_GET['CamSubGuid_Id'];
    $_SESSION['c_name'] =$_GET['CamSubGuid_Name'];

    include 'FileLogicForPublishCameraReadySubGuidelines.php';

    header('location:viewCamSubGuidelines.php');

    }

  // Go to camera ready submission page
  if(isset($_GET['submiteCameraReadyRPId'])){
    $_SESSION['rPaperId'] = $_GET['submiteCameraReadyRPId'];
    header('location:cameraReadySubmission.php');
  }

  if(isset($_GET['viewSubmittedCameraReadyPId'])){
    $_SESSION['rPaperId'] = $_GET['viewSubmittedCameraReadyPId'];
    header('location:viewSubmittedCameraReady.php');
  }

  //camera ready download
  if (isset($_GET['downCameraReadyPId'])) {
    $id = $_GET['downCameraReadyPId'];

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

    header('location:viewSubmittedCameraReady.php');
    
  }

  if(isset($_GET["viewAbstractPId"])){
    $_SESSION["RpaperId"] = $_GET["viewAbstractPId"];
    header("location:viewRPaperAbstract.php");
  }
?>
