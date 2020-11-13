<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reviewer Home</title>
    <link rel="stylesheet" href="../../css/main_style.css">
</head>
    
<body>
<nav>
    <ul>
      <li><a href="ConferenceListForR.php">Conference List</a></li>
      <li><a href="paperslist.php">View papers</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>

  <br><br>

    <p> Welcome Reviewer </p><br><br>
 
</body>
    
</html>
