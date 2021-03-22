<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '1'){
    header('location:../../login.php');
  }
?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Report Generation</title>
	<link rel="stylesheet" href="../../css/about_help_styles.css">
  <link rel="stylesheet" href="../../css/DropDownListToNav.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>
#ReportList{
    margin: 60px 40px;
}
#ReportList td{
    padding:10px 30px;
    max-width: 450px;
}
.RGbtn, .RGbtn:visited{
    background-color:#00ffff;
    color:black;
    padding:5px 10px;
    border:none;
    outline: none;
}
.RGbtn:hover, .RGbtn:active{
    background-color:#00e6e6;
    color:black;
    border:none;
    outline: none;
}
</style>

</head>
<body>

  
	
<nav>
<div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
		<ul>
		
			<li><a href="conference_list.php">Back</a></li>
		</ul>
	</nav>

    <table id="ReportList">
        <tr>
            <td>Number of research paper submission for conference in decending order</td>
            <td>:</td>
            <td>
                <form action="pdf_gen.php" method="post">
                    <input class="RGbtn" type="submit" name="generateCRL" Value="Generate">
                </form>
            </td>
        </tr>
    </table>



    <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
    </div>
</body>
</html>