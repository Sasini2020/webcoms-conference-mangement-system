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
        <a href="authordetails.php"> Check papers </a></br></br>
		<h4> Paper review comment </h4>
		<div class="row">
    <div class="col-25">
      <label for="name">Paper Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" placeholder="paper name....">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="comment">comment</label>
    </div>
    <div class="col-75">
      <textarea id="comment" name="comment" placeholder="comment.." style="height:200px"></textarea>
    </div>
  </div>
		<input type="submit" value="submit" name="submit"></br>
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
