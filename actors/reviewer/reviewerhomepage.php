<?php
	session_start();
	if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
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

.check {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.check:hover {
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

<title>Home Page</title>
<link rel="stylesheet" href="../../css/sty.css">
</head>
<body style="background-color:#bdc3c7">
	
	<div id="main-wrapper">
		<center>
			<h2>Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="../../imgs/webc.png" class="avatar"/>
		</center>
		<?php
		if(isset($_post['submit'])){

                         $pname=$_post["name"];
                     $comment=$_post["comment"];


            }
       ?>
	   <form action="reviewercheck.php" method="post">
      <div id="wrapper">
        <a href="paperlist.php"><button class="button check"> Check papers <buttton></a>
      </div>  
        </form>

		
		<form class="myform" action="reviewerhomepage.php" method="post">
		
		
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
