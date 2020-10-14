<?php
	session_start();
    if($_SESSION['login_s'] != '5'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="../../css/sty.css">
</head>
<style>
.button {
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.one {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.one:hover {
  background-color: #008CBA;
  color: white;
}


.tree {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.tree:hover {
  background-color: #008CBA;
  color: white;
}


.two {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.two:hover {
  background-color: #008CBA;
  color: white;
}

.wrapper {
  margin-right: auto;
  margin-left:  auto;

  max-width: 900px;

  padding-right: 8px;
  padding-left:  5px;
}



</style>
<body style="background-color:#bdc3c7">
	
	<div id="main-wrapper">
		<center>
			<h2>Track Chair Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="../../imgs/webc.png" class="avatar"/>
		</center>
		<div id="wrapper">
	     <a href="firstround.php"><button class="button one">First-round paper evaluation</button></a>
		 <a href="paperaccept.php"><button class="button two" >Paper Acceptance</button></a>
		 <a href="assignreviewrs.php"><button class="button tree"> Assign Reviewers <buttton></a>
		 </div>
		<form class="myform" action="trackchairhomepage.php" method="post">
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
