<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>


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
</style>

 <link rel="stylesheet" href="css/mychanged.css">

<title>Created conferences by conference chairs</title>
	<link rel="stylesheet" href="css/styleNavbar.css">

</head>
<body>
<!-- Remove commenting and get multicolorsfor backgorund
<div class="filter">
</div>	 -->


<div>
<ul>
  <li><a class="active" href="index.php">WebComs</a></li>
	<li><a href="help.html">Help</a></li>
	<li><a href="contactUs.html">Contact Us</a></li>
</ul>

</br></br></br></br></br></br>


</div>
<section>

  <div>
	  <br><br>
  <form class="myform" action="adminhomepage.php" method="post">
		
		<p style="text-align:left;color:#000000;font-size: 20px;"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"  ></i> To Admin's home page..</p>
		
		<!-- In mychanged.css file css file-> myButton class -->
		<input class="myButton" name="button" type="submit" id="button" value="Back"/><br>	
		
		</br></br></br></br></br></br></br></br>
		
	</form>


<div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                           <div class="panel panel-primary">
                               <div class="panel-heading"> <i class="fa fa-desktop"> </i> <strong></strong></div>
                               <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                               
                            </p>



	<table id="datatable-buttons" class="table table-striped table-bordered" >
    <thead>
	<tr>
	

		<th>ID</th>
	   <th>Conference</th>
	   <th>Venue</th>
	   <th>Start date</th>
	   <th>End date</th>
	   <th>Deadline</th>
	   <th>Sposer details</th>
	   <th>Manage</th>


	</tr>
	<br>


<tbody>       </tr>
                                </thead>
                                    <?php
                                        $sql = mysqli_query($con, "select * from conferences") or die(mysqli_error($con));
                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($sql)) {?>
                                            
                                 <tr id="row<?php echo $row['id'];?>">
                                    <td><?=$counter?></td>
                                    <td id="conference<?php echo $row['id'] ?>"><?=$row['name']?></td>
                                    <td id="venue<?php echo $row['id'] ?>"><?=$row['venue']?></td>
                                    <td id="start_date<?php echo $row['id'] ?>"><?=$row['start_date']?></td>
									<td id="end_date<?php echo $row['id'] ?>"><?=$row['end_date']?></td>
									<td id="deadline_date<?php echo $row['id'] ?>"><?=$row['deadline_date']?></td>
                                    <td id="sponsor_details<?php echo $row['id'] ?>"><?=$row['sponsor_details']?></td>
                                    

                                    <td style="padding-left: 20px;">
                                        <!-- <a href="#"  class="on-editing save" id="save_button<?php echo $row['id'];?>" onclick="save_row('<?php echo $row['id'];?>');"><i class="fa fa-save"></i></a>

                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a> -->
										
										<input type="button" name="delete" value="delete">
										<button type="button" class="button">Add</button>




                                    </td>
                                </tr>
                                </tbody>
								<?php
                               $counter++;}
                                    ?>
											<?php
	
		if($_GET){
    if(isset($_GET['delete'])){
        delete();
    }//elseif(isset($_GET['select'])){
        //select();
    //}
}

    function delete()
    {
    	$delete1 =("DELETE * FROM `conferences` WHERE id = '$id'");
        $result = mysqli_query($conn,$delete1) or die(mysqli_error());
        
	echo "record deleted";
   
   
 
    }
	
	?>
	
	</table>
	


	
	   </div>
                           </div>
                        </div>
                    </div>
</div>
<!-- </td> -->

	
</section>

		<?php
	
	

	
	
	 if(isset($_POST['back']))
			{
				session_destroy();
				header('location:adminhomepage.php');
	}
	
	
	?>
	


</body>
</html>
