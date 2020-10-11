<?php
  session_start();
  require 'dbconfig/config.php';
  if($_SESSION['login_s'] != '4'){
    header('location:login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Define Tracks</title>

  <link rel="stylesheet" href="css/main_style.css">
  <link rel="stylesheet" href="css/sty.css">
  
</head>
<body>

  <nav>
    <ul>
      <li><a href="viewConferencesForCC.php">Back to Conference List</a></li>
    </ul>
  </nav>

<br><br>

<div id="main-wrapper">
		<center>
			<h2>Define Track Name</br><br><br></h2>	
		</center>

    <form class="myform" action="defineTracks.php"method="post">

      <label for="name"><b>Track Name:</b></label><br>
			<input id="name" name="Tname" type="text" class="inputvalues" placeholder="Type Track Name" required/>
      <input name="submit_btn" type="submit" id="login_btn" value="Submit"/>
    </form>

    <?php
			if(isset($_POST['submit_btn']))
			{

				$Tname =$_POST['Tname'];
				$c_id = $_SESSION['c_id'];

					$query= "select * from conferencetrack WHERE (Name='$Tname')and(conferenceID=$c_id)";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already have that track name
						echo '<script type="text/javascript"> alert("Track name already exists.. try another Track Name") </script>';
					}
					else
					{
						$query= "insert into conferencetrack
						values(NULL,'$Tname',$c_id)";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("New Track Defined") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}				
			}
		?>
</div>
</body>
</html>
