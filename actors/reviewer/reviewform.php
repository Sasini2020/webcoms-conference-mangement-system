<?php

session_start();
	if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/reg_form_style.css">
</head>
<body>

<nav>
		<ul>
			<li><a href="paperlist.php">Back</a></li>
			
		</ul>
	</nav>

	<br><br>
	
	<div id="main-wrapper">
		<center>
			<h2>Paper review comment</h2>
		</center>
	
		<form class="myform" action="reviewform.php"method="post">
		  
		<!--<label><b>reviewer email</b></label><br>
			<input id=emailreviewer name="emailreviewer" type="text" class="inputvalues" placeholder="reviewer email ..." required/><br>-->
			
			<label><b>Author Email</b></label><br>
			<input id=emailauthor name="emailauthor" type="text" class="inputvalues" placeholder="author email" required/><br>
			

			<label><b>recommendation</b></label><br>
			<input id=recommendation name="recommendation" type="text" class="inputvalues" placeholder="recommendation...." required/><br>
			
			
		<div class="row">
     <div class="col-25">
      <label for="comment">comment</label>
     </div>

    <div class="col-75">
     <!-- <textarea id="comments" name="comments" placeholder="comment.." style="height:200px"></textarea>-->
	  <textarea id="comments" rows="4" cols="50" name="comments" placeholder="comment.." > Add comment </textarea>
     </div>
    </div>
    <!--<input name="submit" type="submit" id="submit_btn" value="submit"/><br>-->
	<button type="submit" class="button "id="submit_btn"  value="submit" name="submit">Upload</button><br><br>
		</form>
		
    <?php
			if(isset($_POST['submit']))
			{   
				$emailreviewer=$_POST['emailreviewer'];	
				$emailauthor=$_POST['emailauthor'];
				$recommendation =$_POST['recommendation'];
				$comments = $_POST['comments'];
				$r_Email=$_SESSION['r_email'];
				
        	
				$query= "INSERT into reviewerform (comments,recommendation,emailreviewer,emailauthor)values('$comments','$recommendation','$r_Email','$emailauthor')";
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

	</div>
        <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
  </body>
  </html>




  


