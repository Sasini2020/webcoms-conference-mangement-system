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
  <title>Track List</title>

  <link rel="stylesheet" href="../../css/main_style.css">
  <link rel="stylesheet" href="../../css/table_style.css">
  
</head>
<body>

  <nav>
    <ul>
      <li><a href="viewConferencesForCC.php">Back to Conference List</a></li>
    </ul>
  </nav>

<br><br>
  <center><h1>Track List</h1></center>
<br><br>

<div>
   
   <table>
     <thead>
         <tr>
         <th>Number</th>
         <th>ID</th>
         <th>Name</th>
         </tr>
     </thead>

     <tbody>                                     
       <?php
            $c_id = $_SESSION['c_id'];
            $sql = mysqli_query($con, "select *
            from conferencetrack
            where 	conferenceID='$c_id';") or die(mysqli_error($con));
            $counter = 1;
            while ($row = mysqli_fetch_assoc($sql)) {
       ?>                                            
           <tr id="row<?php echo $row['ID'];?>">

            <td><?=$counter?></td>
            <td><?=$row['ID']?></td>
            <td><?=$row['Name']?></td>
           </tr>
     </tbody>
        <?php
            $counter++;}
        ?> 
     </table>	
 </div>



</body>
</html>