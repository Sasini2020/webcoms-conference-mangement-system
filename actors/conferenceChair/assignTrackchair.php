<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '4'){
    header('location:../../login.php');
  }

?>
<!DOCTYPE html>
<html>
<head>

  <title>Assign Track Cahir</title>
  <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
<nav>
   <div class="logo">Web-COMS</div>
   <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
          <i class="fas fa-bars"></i>
      </label>
    <ul>
      <li><a href="modifyTracks.php">Back</a></li>
      
      
    </ul>



</body>
</html>