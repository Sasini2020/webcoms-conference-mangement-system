<?php
	session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
	require '../../dbconfig/config.php';
?>
<?php include 'fileLogicForViewConfGuidelines.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title> conference Guidelines</title>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/reg_form_style.css">
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">

    <style>
    /* Styles for two buttons inside the form*/
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
      <li><a href="author_home.php">Back</a></li>  
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>
  <br>
  <br>
  <h1 style="color:#7D3C98;text-align:center;">
  <?php 
    
      // echo "Conference Id :"." ". $_SESSION['c_id'];
      echo "Conference Name :"." ". $_SESSION['c_name'];    
  ?></h1>
<br><br><br>

<section id="ABC" class="ABC">
  <br>
<p style="text-align:center;color:#5F6A6A ;margin-left:20px;margin-top:50px;font-size:35px;font-weight:600;">Conference Guidelines</p><br>

<p style="text-align:center;color:#1F618D ;margin-left:20px;margin-top:40px;font-size:30px;font-weight:500;">To facilitate the submission process and the subsequent follow up process, please consider the following guidelines, information, tips, terms and deadlines ...</p>
<br><br> 

<center>
  <?php foreach ($files as $file): ?>
    <a id="button" class="button"  href="../../uploads/conferenceGuidelines/<?php echo $file['name']; ?>" target="_blank">
    <i style="color:white;margin-right:10px;" class="fas fa-link" ></i>View Conference Guidelines</a></td>
  <?php endforeach;?>

</center>
<br><br><br><br>
</section>
    <!-- Footer section -->
	<div class="footer">
    <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
  </div>
</body>
</html>
