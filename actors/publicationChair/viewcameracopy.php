<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="../../css/main_style.css">
<link rel="stylesheet" href="../../css/sty.css">
</head>

<nav>
    <ul>
      <li><a href="publicationchairhomepage.php">Back</a></li>
      
    </ul>
  </nav>

  <br><br>

  <center>
     <h1>View Final Camera-ready copy submission</h1>
  </center>

<br><br>

<body>
    <div id="main-wrapper">
       <div class="search-container">
          <select>
            <option value="0"> select</option>
          </selct>
          <input type="text" placeholder="Search" name="search">
          <button type="submit"><i class="fa fa-search"></i>Filter</button>
       </div>
    </div> 
    
 </body>
</html>
