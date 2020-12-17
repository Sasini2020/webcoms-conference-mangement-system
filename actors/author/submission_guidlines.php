<?php
	session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
?>
<!-- Accessing the FilesLogic.php -->
<?php include 'fileLogicPublishSubmissionGuidelines.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

  <!--<script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/nav_footer_styles.css">-->

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <link rel="stylesheet" href="../../css/table_style.css">

  <title>Submission Guidelines</title>

  <style>
.ABC {
      background-color: #E5E7E9 ;
      height: 70%;
      /* position: relative; */
      top: 100px;
      left: 0;
      width: 100%;
    }

  .button {
  background-color: #7D3C98  ;
  /* box-shadow: 0 5px 0 darkred; */
  margin-top:140px;
  /* margin-left:500px; */
  color: white;
  padding: 1em 1.5em;
  position: relative;
  text-decoration: none;
  text-transform: uppercase;
  border-radius:5px;
}

.button:hover {
  background-color: #884EA0;
  cursor: pointer;
}

.button:active {
  box-shadow: none;
  top: 5px;
}


</style>

</head>
<body>
<!-- navbar -->
<nav>
  <div class="logo">Web-COMS</div>
        <input type="checkbox" id="click">
              <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
              </label>
    <ul>
   
    <li><a href="author_home.php">home</a></li>
    <li><a href="ConferenceListForA.php">Conferences List</a></li>
    <li><a class="active" href="submission_guidlines.php">Submission Guidelines</a></li>

    <li><a href="../../About.php">About</a></li>
    <li><a href="../../help.php">Help</a></li>
    <li ><a style="float:right; margin-right:40px;"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>
<h2></h2><br>

<!-- <p style="color:#283747 ;margin-left:20px;">As publownload final camera-ready copies and generate proceeding preparation</p> -->
<br><br><br>
<section id="ABC" class="ABC">
  <br>
<p style="text-align:center;color:#5F6A6A ;margin-left:20px;margin-top:50px;font-size:35px;font-weight:600;">Submission Guidelines</p><br>

<p style="text-align:center;color:#1F618D ;margin-left:20px;margin-top:40px;font-size:30px;font-weight:500;">If your paper is accepted and you have paid the registration fee for this International Conference you are encouraged to submit your camera ready copy paper.</p>
<br><br>
<?php foreach ($files as $file): ?>
<center>

<a id="button" class="button" href="../../media/<?php echo $file['name']; ?>" target="_blank"><i class="fas fa-link"></i>  View Submission Guidelines</a>
</center>

<?php endforeach;?>

<br><br><br><br><br>
</section>


 <!-- Footer section -->
         <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>
</html>
