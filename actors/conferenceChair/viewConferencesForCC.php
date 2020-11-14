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
  <title>View conferences</title>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
 <!-- <link rel="stylesheet" href="../../css/main_style.css">-->
  <link rel="stylesheet" href="../../css/table_style.css">
  <style>
    #CTadd{
      padding:1px 8px;
      background-color:#ff66ff;
      border:2px solid #7a7a52;
      border-radius:10px;
    }
    #CTview{
      padding:1px 4px;
      background-color:#00ffff;
      border:2px solid #7a7a52;
      border-radius:10px;
    }
  </style>
</head>
<body>

  <nav>
    <ul>
      <li><a href="conferencechairhomepage.php">Back to Home</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
    </ul>
  </nav>

<br><br>
  <center><h1>Conference List</h1></center>
<br><br>

<div>
   
   <table>
     <thead>
         <tr>
         <th>ID</th>
         <th>Conference</th>
         <th>Venue</th>
         <th>Start date</th>
         <th>End date</th>
         <th>Deadline</th>
         <th>Sposer details</th>
         <th>Modify Tracks</th>
         </tr>
     </thead>

     <tbody>                                     
       <?php
            $c_email = $_SESSION['c_email'];
            $sql = mysqli_query($con, "select *
            from conferences
            where (Accepted='1')and(emailconfchair='$c_email');") or die(mysqli_error($con));
            $counter = 1;
            while ($row = mysqli_fetch_assoc($sql)) {
       ?>                                            
           <tr id="row<?php echo $row['id'];?>">

            <td><?=$counter?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['venue']?></td>
            <td><?=$row['start_date']?></td>
            <td><?=$row['end_date']?></td>
            <td><?=$row['deadline_date']?></td>
            <td><?=$row['sponsor_details']?></td>
            <td style="padding-left: 20px;">
                <form action="viewConferencesForCC.php" method="post">		                                   
                    <input type="submit" name="mTrack" Value="Add" id="CTadd"/>
                    <input type="submit" name="mTrack" Value="View" id="CTview" />
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                </form>
            </td>
           </tr>
     </tbody>
        <?php
            $counter++;}
        ?>

        <?php
        
        if(isset($_POST['mTrack']) && isset($_POST['id'])){
            if($_POST['mTrack']=='Add'){
              $_SESSION['c_id'] = $_POST['id'];
              header('location:defineTracks.php');
            }
            elseif($_POST['mTrack']=='View'){
              $_SESSION['c_id'] = $_POST['id'];
              header('location:viewTracksForCC.php');
            }
        }
        ?>
                
     </table>	
 </div>
 
  <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>


</body>
</html>
