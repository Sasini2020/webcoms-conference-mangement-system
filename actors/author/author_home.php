<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Author Home</title>
    <link rel="stylesheet" href="../../css/main_style.css">
</head>
<body>
<nav>
    <ul>
      <li><a href="ConferenceListForA.php">Conference List</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>

  <br><br>

    <p> Welcome Author </p><br><br>

</body>
</html>
