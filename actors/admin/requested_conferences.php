<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '1'){
    header('location:../../login.php');
  }
?>

<!DOCTYPE html>
<html>
<head>

  <title>Requested Conferences List</title>

  <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/main_style.css">

  <!--
  <link rel="stylesheet" href="css/mychanged.css">
	<link rel="stylesheet" href="css/styleNavbar.css">

  <style>
  body {
    margin: 0;
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
  }

  li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
  }

  li a.active {
    background-color: #6495ED;
    color: white;
  }

  li a:hover:not(.active) {
    background-color: #555;
    color: white;
  }
  </style>-->

</head>
<body>
  <!-- Remove commenting and get multicolorsfor backgorund
  <div class="filter">
  </div>	 -->

  <nav>
    <ul>
      <li><a href="adminhomepage.php">Back to Home</a></li>
      <!--<li><a class="active" href="index.php">WebComs</a></li>
      <li><a href="help.html">Help</a></li>
      <li><a href="contactUs.html">Contact Us</a></li>-->
    </ul>    
  </nav>
  <br><br>

  <center>
    <p><b>Requested Conference List</b></p>
  </center>

  <br><br>

  <div>
    
    <!--<br><br>
    <form class="myform" action="adminhomepage.php" method="post">
      
      <p style="text-align:left;color:#000000;font-size: 20px;"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"  ></i> To Admin's home page..</p>
      
      <input class="myButton" name="button" type="submit" id="button" value="Back"/><br>	
      
      </br></br></br></br></br></br></br></br>
      
    </form>-->

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
          <th>Conference Chair</th>
          <th>Manage</th>
      	</tr>
      </thead>

      <tbody>                                     
        <?php
          $sql = mysqli_query($con, "select conferences.id,
            conferences.name,
            conferences.venue,
            conferences.start_date,
            conferences.end_date,
            conferences.deadline_date,
            conferences.sponsor_details,
            userinfotable.full_name
            from conferences
            inner join userinfotable on conferences.C_chairEmail = userinfotable.email
            where Accepted='0';") or die(mysqli_error($con));
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
              <td><?=$row['full_name']?></td>                                   

              <td style="padding-left: 20px;">
                <form action="requested_conferences.php" method="post">
									
							    <input type="submit" name="action" value="Delete" />
                  <input type="submit" name="action" Value="Accept" />
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                </form>
              </td>
            </tr>
      </tbody>
			<?php
        $counter++;}
      ?>

      

      <?php

        //function del_d($id){
        //  $qur = mysqli_query($con,"delete from conferences where id='$id'");
        //  header('location:requested_conferences.php');
        //}
        if(isset($_POST['action']) && isset($_POST['id'])){
          if($_POST['action'] == 'Delete'){
            $r_id = $_POST['id'];
            $qur = mysqli_query($con,"delete from conferences where id='$r_id'");
            header('location:requested_conferences.php');
          }
          elseif($_POST['action'] == 'Accept'){
            $r_id = $_POST['id'];
            $qur = mysqli_query($con,"update conferences set Accepted = '1' where id='$r_id'");
            header('location:requested_conferences.php');
          }
        }
      ?>
	
	  </table>	
  </div>

</body>
</html>
