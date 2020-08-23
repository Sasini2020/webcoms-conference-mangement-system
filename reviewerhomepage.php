<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>


<title>Home Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#bdc3c7">
	
	<div id="main-wrapper">
		<center>
			<h2>Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
		<?php
		if(isset($_post['submit'])){

                         $pname=$_post["name"];
                     $comment=$_post["comment"];


            }
       ?>
	   <form action="reviewercheck.php" method="post">
        <a href="authordetails.php"> Check papers </a></br></br>
		<h4> Paper review comment </h4>
		Enter paper Name:<input type="text" name="name"></br></br>
		Comment:<input type="text" name="comment"></br></br>
		<input type="submit" value="submit" name="submit"></br>
        </form>

		
		<form class="myform" action="homepage.php" method="post">
		
		
			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
			
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}
		?>
	</div>
</body>
</html>
