<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View conferences</title>
  
  
  <link rel="stylesheet" href="../../css/table_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
	    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  <style>

* {
  font-family: sans-serif; /* Change your font family */
}
.conListLink{
  color:white;
  text-shadow: 1px 1px 0 #444;
}

.conListLink:link,
.conListLink:link:visited{
  background-color: #00ccff;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}  

.conListLink:hover, 
.conListLink:active {
  background-color: #00b8e6;
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}


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


<br><br><br><br>
		<h2 style="margin-left:100px;color:#000000;">Conference List</h2>


<div>
   <center>
   <table class="content-table">
     <thead>
         <tr>
         <th>ID</th>
         <th>Conference</th>
         <th>Venue</th>
         <th>Start date</th>
         <th>End date</th>
         <th>Deadline</th>
         <th>Sponsor details</th>
         <th>Modify Tracks</th>
         <th>Assign Publication Chair</th>
         </tr>
     </thead>
	 </center>

     <tbody>                                     
       <?php
            $c_email = $_SESSION['c_email'];
            $sql = mysqli_query($con, "select *
            from conferences
            where (Accepted='1')and(emailconfchair='$c_email')
            group by conferences.id DESC;") or die(mysqli_error($con));
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
            <td>
                <a href="route.php?modifyTrackCId=<?= $row['id'] ?>" class="conListLink">Modify Tracks</a>
            </td>
            <td style="padding-left: 20px;">
               <!--<form action="route.php"  method="post">
                 <input type="submit" name="mTrack" value="assign" id="assignT"/>
                 <input type="hidden" name="id" value="<?php //echo $row['id'];?>"/>
                 <input type="hidden" name="Cname" value="<?php //echo $row['name'];?>">
               </form>-->

            </td>
           </tr>
     </tbody>
        <?php
            $counter++;}
        ?>

    
                
     </table>	
 </div>

  
  <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>


</body>
</html>
