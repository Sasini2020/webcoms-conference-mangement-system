<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '4'){
    header('location:../../login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Define Tracks</title>


  <link rel="stylesheet" href="../../css/sty.css">
    <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
	    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <style>
.dot {
  height: 8px;
  width: 8px;
  background-color: #86B0DD;
  border-radius: 50%;
  margin-bottom:2px;
  margin-left:28px;
  margin-right:5px;
  display: inline-block;
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
	  <li><a class="active" href="conferencechairhomepage.php">Home</a></li>
      <li><a href="create_conference.php">Request a Conf</a></li>
      <li><a href="viewConferencesForCC.php">View Conf</a></li>
      <li><a href="addnotemplates.php">Add notification templates</a></li>
      <li><a href="upudetauls.php">Upload User Details</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

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
     
      
      <!--<label for="trackc"><b>Select Track Chair:</b></label><br>
      
      <select name="trackCE" id="trackc" class="inputvalues">
        <option value="">-- Select --</option>
        <?php 
          //$t_list = mysqli_query($con,"select emailtrackchair,fullname from trackchair");
          //while($row = mysqli_fetch_assoc($t_list)){
        ?>
        <option value="<?php //echo $row['emailtrackchair']; ?>"><?php //echo $row['fullname']; ?></option>
        <?php //$counter++;} ?>
      </select>-->

      <input name="submit_btn" type="submit" id="login_btn" value="Submit"/>
    </form>

    <?php
			if(isset($_POST['submit_btn']))
			{

				$Tname =$_POST['Tname'];
        $c_id = $_SESSION['c_id'];

        //$Temail =$_POST['trackCE'];
				//$c_email = $_SESSION['c_email'];

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