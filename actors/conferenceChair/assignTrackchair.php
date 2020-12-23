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

  <title>Assign Track Cahir</title>
  <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
<nav>
   <div class="logo">Web-COMS</div>
   <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
          <i class="fas fa-bars"></i>
      </label>
    <ul>
      <li><a href="conferencechairhomepage.php">Home</a></li>
      <li><a href="create_conference.php">Request a Conference</a></li>
      
      <li><a href="addnotemplates.php">Add notification templates</a></li>
      <li><a href="upudetauls.php">Upload User Details</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
      
    </ul>

</nav>

  <?php
        



  ?>
  <h1>conference Name :- <?php 
        echo $_GET['cname'];
   
      ?></h1>
   <table>
         <caption> Allready assign Trackchair list</caption><br>
         <thead>
             <th>Track</th>
             <th>Track chair Name</th>
             <th>Track chair E-mail</th>
         </thead>
         <tbody>
        
            <tr>
                <td></td>
                <td></td>
                <td></td>  
            </tr>
         </tbody>
              

   </table>


   <br><br><hr><br><br>

   <table>
      <caption>Select and Assign Trackchairs</caption>
      <br><br>
      <thead>
      <?php

          $sql=mysqli_query($con,"select * from conferencetrack")or
          die(mysqli_error($con));
          $counter=1;
          while($row=mysqli_fetch_assoc($sql)){


          ?>
          <th>Track</th>
          
          <th>Submit Track Email</th>

      </thead>
      <br><br>
      <tbody>

          <tr>
             <td><?=$row['Name']?></td>
             <td>
                  <form action="assignTrackchair.php" method="post">
                  <input type="email" id="track" name="track">
                  <input type="submit" value="select" name="submit" id="sbtn">
                  <input type="">
                  </form>
             
             
             </td>


          </tr>


      </tbody>

               <?php
                  $counter++ ;}

                ?>
         <?php
              if(isset($_POST['track'])&&isset($_POST['submit'])){

                $Temail=$_POST['track'];
                $Cemail=$_SESSION['c_email'];


                $query="select * from ctassign where(	trackemail='$Temail')and(trackid)";
                $query_run=mysqli_query($con,$query);


                if(mysqli_num_rows($query_run)>0 ){


                  echo'<script type="text/javascript">alert("This Trackchair allready assign to this Track")</script>';



                }else{
                   
                  $query="insert into ctassign (trackname,trackid,trackemail,conferenceid,conferencename)values() ";
                  $query_run=mysqli_query($con,$query);

                  if($query_run){
                              echo '<script type="text/javascript">alert("Track Chair assign to Track")</script>';

                  }else{

                     echo '<script type="text/javascript">alert("'.mysqli_error($con).'")</script>';

                  }

                
                }


                




              }


           ?>


   </table>




</body>
</html>