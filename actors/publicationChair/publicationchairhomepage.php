<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="../../css/main_style.css">
</head>

	
<body>

<nav>
    <ul>
      <li><a href="publishcameracopy.php">Publish Camera ready copy guidelines</a></li>
      <li><a href="uploadcoversub.php">Upload Cover Pages and sub pages</a></li>
      <li><a href="viewcameracopy.php">View Camera-ready copy</a></li>
      <li><a href="autoproceeding.php">Auto generate proceeding</a></li>
    </ul>
  </nav>

  <br><br>


	
	<div id="main-wrapper">
		<center>
			<h2>Publication Chair Home Page</h2>
			<h3> Welcome </h3>
			<img src="../../imgs/webc.png" class="avatar"/>
		</center>
	   
		<form class="myform" action="publicationchairhomepage.php" method="post">
			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
			
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:../../index.php');
			}
		?>
	</div>
			 
</body>
</html>
