<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '5'){
    header('location:../../login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign reviewers</title>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/table_style.css">
</head>
<body>

<!-- Navigation -->
<nav>
    <ul>
      <li><a href="firstround.php">Back</a></li>
    </ul>
</nav>
<center>
    <h1>Assign reviewers to research papers</h1>
 </center>
 <br><br>

 <!-- Allready assign reviewers table -->
 <table>
  <caption>Allready assign reviewers list</caption>
    <thead>
        <th>Full Name</th>
        <th>E-mail</th>
        <th>Gender</th>
    </thead>
    <tbody>
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
    </tbody>
 </table>
 
 <br><br><hr><br><br>

 <!--Select and assign reviewers -->
 <table>
  <caption>Select and assign reviewers</caption>
    <thead>
        <th>Full Name</th>
        <th>E-mail</th>
        <th>select</th>
    </thead>
    <tbody>
        <?php
            $sql = mysqli_query($con, "select *
            from trackchair") or die(mysqli_error($con));
            $counter = 1;
            while ($row = mysqli_fetch_assoc($sql)) {
       ?>                                            
           <tr>

            <td><?=$row['fullname']?></td>
            <td><?=$row['emailtrackchair']?></td>
            <td>
                <form action="addReviewerTopaperinForm.php" method="post">		                                   
                    <input type="submit" name="assign" Value="Assign" id="CTadd"/>
                    <input type="hidden" name="remail" value="<?php echo $row['emailtrackchair']; ?>" />
                </form>
            </td>
           </tr>
    </tbody>
        <?php
            $counter++;}
        ?>
        <?php
            if(isset($_POST['assign']) && isset($_POST['remail'])){

                //echo "id value : ".$_GET['p_id'];
                $paper_id=$_SESSION['paper_id'];
                $r_email=$_POST['remail'];

                $query= "select * from reviewerandpaper WHERE (reviewerEmail='$r_email')and(paperId=$paper_id)";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already have that track name
						echo '<script type="text/javascript"> alert("This Reviewer allready assign this paper") </script>';
					}
					else
					{
						$query= "insert into reviewerandpaper
						values('$r_email',$paper_id)";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("Reviewer assign to paper") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}	
            }
        ?>
 </table>
 
<!-- Footer section -->
<div class="footer">
    <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
</div>
</body>
</html>