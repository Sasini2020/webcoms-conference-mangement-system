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
      $_SESSION['c_name'] = $_GET['Conf_Name'];



      $conn = $con;

      $c_id = $_SESSION['c_id'];
      
      $sql = "SELECT * FROM conferenceguidelinedetails where conf_id='$c_id'";
      
      
      $result = mysqli_query($conn, $sql);
      
      $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
      // Uploads files
      if (isset($_POST['save'])) { // if save button on the form is clicked
          // name of the uploaded file
          $filename = $_FILES['myfile']['name'];
      
          // destination of the file on the server
          $destination = '../../uploads/conferenceGuidelines/' . $filename;
      
          // get the file extension
          $extension = pathinfo($filename, PATHINFO_EXTENSION);
      
          // the physical file on a temporary uploads directory on the server
          $file = $_FILES['myfile']['tmp_name'];
          $size = $_FILES['myfile']['size'];
      
      
          if (!in_array($extension, ['pdf'])) {
              echo '<script type="text/javascript"> alert("Your file extension must be .pdf") </script>';
          } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1MB
              // echo "File is large than 1MB !";
              echo '<script type="text/javascript"> alert("file size larger than 1 MB.. Try another file") </script>';
      
          } else {
              // move the uploaded (temporary) file to the specified destination
              if(move_uploaded_file($file, $destination)) {
      
              $c_id = $_SESSION['c_id'];
      
      
                  $query1="select * from conferenceguidelinedetails where conf_id='$c_id' ";
                  $query1_run=mysqli_query($con,$query1);
                  if(mysqli_num_rows($query1_run)>0){
                      echo '<script type="text/javascript">alert("This conference has been already uploaded conference guidelines..!!")</script>';
                  }
                  else{
      
                      $sql = "INSERT INTO conferenceguidelinedetails(name,size,conf_id) VALUES 
                      ('$filename',$size,$c_id)";
                     
                      if (mysqli_query($conn, $sql)) {
                          // echo "File uploaded successfully";
                          echo '<script type="text/javascript"> alert("Conference Guidelines was uploaded successfully!!") </script>';
          
                      }
                  }
      
      
              }
               else {
                  echo '<script type="text/javascript"> alert("Failed to submit your file !!") </script>';
              }
          }
      }
      // Downloads files
      if (isset($_GET['file_id'])) {
          $id = $_GET['file_id'];
      
          // fetch file to download from database
          $sql = "SELECT id,name,size FROM conferenceguidelinedetails WHERE id=$id  ";
          $result = mysqli_query($conn, $sql);
      
          $file = mysqli_fetch_assoc($result);
          $filepath = '../../uploads/conferenceGuidelines/' . $file['name'];
      
          if (file_exists($filepath)) {
              header('Content-Description: File Transfer');
              header('Content-Type: application/octet-stream');
              header('Content-Disposition: attachment; filename=' . basename($filepath));
              header('Expires: 0');
              header('Cache-Control: must-revalidate');
              header('Pragma: public');
              header('Content-Length: ' . filesize('../../uploads/conferenceGuidelines/' . $file['name']));
              readfile('../../uploads/conferenceGuidelines/' . $file['name']);
      
              exit;
          }
      
      }
    
 

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
