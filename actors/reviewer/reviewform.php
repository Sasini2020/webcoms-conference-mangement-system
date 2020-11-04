<?php

session_start();
	if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head><h1> Review Form <h1>
</head>
<body>

<nav>
		<ul>
			<li><a href="Reviewerhomepage.php">Back to Home</a></li>
			
		</ul>
	</nav>

	<br><br>
	
	<div id="main-wrapper">
		<center>
			<h2>Paper review comment</h2>
		</center>
	
		<form class="myform" action="reviewform.php"method="post">
		  
		<label><b>reviewer email</b></label><br>
			<input id=emailreviewer name="emailreviewer" type="text" class="inputvalues" placeholder="reviewer email ..." required/><br>
			
			<label><b>Author Email</b></label><br>
			<input id=emailauthor name="emailauthor" type="text" class="inputvalues" placeholder="author email" required/><br>
			

			<label><b>recommendation</b></label><br>
			<input id=recommendation name="recommendation" type="text" class="inputvalues" placeholder="recommendation...." required/><br>
			
			
		<div class="row">
     <div class="col-25">
      <label for="comment">comment</label>
     </div>

    <div class="col-75">
      <textarea id="comments" name="comments" placeholder="comment.." style="height:200px"></textarea>
     </div>
    </div>
    <input name="submit" type="submit" id="submit_btn" value="submit"/><br>
		</form>
		
    <?php
			if(isset($_POST['submit']))
			{   
				$emailreviewer=$_POST['emailreviewer'];	
				$emailauthor=$_POST['emailauthor'];	
				$recommendation =$_POST['recommendation'];
				$comments = $_POST['comments'];
				
        	
				$query= "INSERT into reviewerform (comments,recommendation,emailreviewer,emailauthor)values('$comments','$recommendation','$emailreviewer','$emailauthor')";
				$query_run = mysqli_query($con,$query);
						
				if($query_run)
					{
						echo '<script type="text/javascript"> alert("Your review save") </script>';
					}
          else
					{
						echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
					}
			}			
		?>

    </div>
  </body>
  </html>




  


