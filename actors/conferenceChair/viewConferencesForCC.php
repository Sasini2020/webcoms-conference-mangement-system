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

  <link rel="stylesheet" href="../../css/main_style.css">
  <link rel="stylesheet" href="../../css/table_style.css">
  
</head>
<body>

  <nav>
    <ul>
      <li><a href="conferencechairhomepage.php">Back to Home</a></li>
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
            where (Accepted='1')and(C_chairEmail='$c_email');") or die(mysqli_error($con));
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
                    <input type="submit" name="mTrack" Value="Add"/>
                    <input type="submit" name="mTrack" Value="View" />
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



</body>
</html>
