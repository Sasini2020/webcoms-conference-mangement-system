<?php
    session_start();
    require '../../dbconfig/config.php';
    if($_SESSION['login_s'] != '1'){
      header('location:../../login.php');
    }

        if(isset($_POST['action']) && isset($_POST['id'])){
          if($_POST['action'] == 'Reject'){
            $r_id = $_POST['id'];
            $qur = mysqli_query($con,"delete from conferences where id='$r_id'");            
            header('location:requested_conferences.php');
          }
          elseif($_POST['action'] == 'Accept'){
            $r_id = $_POST['id'];
            $qur = mysqli_query($con,"update conferences set Accepted = '1' where id='$r_id'");
            header('location:requested_conferences.php');
          }
        }
?>