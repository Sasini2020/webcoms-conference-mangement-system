<?php
	session_start();
    if($_SESSION['login_s'] != '5'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/main_style.css">
<link rel="stylesheet" href="../../css/sty.css">
</head>

<body style="background-color:#bdc3c7">

<nav>
    <ul>
      <li><a href="trackchairhomepage.php">Back</a></li>
    </ul>
  </nav>

  <br><br>
  <center>
  <h1>Paper acceptance</h1>
   <center>

 <br><br>
<div id="main-wrapper">
   
    <h2> select Paper</h2>
  
  </form>
</div>
</body>

</html>
