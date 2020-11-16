<?php
	session_start();
    if($_SESSION['login_s'] != '6'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>

<?php
    
$error1 = array();
$errors2=array();
$errors3=array();

if (isset($_POST['submit'])) {
	// submitt button is clicked

	
  $file_name=$_FILES['template']['name'];
  $file_type=$_FILES['template']['type'];
	$file_size=$_FILES['template']['size'];
  $temp_name=$_FILES['template']['tmp_name'];
  $file_name_cover=$_FILES['coverpage']['name'];
  $file_type_cover=$_FILES['coverpage']['type'];
	$file_size_cover=$_FILES['coverpage']['size'];
  $temp_name_cover=$_FILES['coverpage']['tmp_name'];
  $file_name_sub=$_FILES['subpage']['name'];
	$file_type_sub=$_FILES['subpage']['type'];
	$file_size_sub=$_FILES['subpage']['size'];
	$temp_name_sub=$_FILES['subpage']['tmp_name'];
  
  $p_Email=$_SESSION['p_email'];
  


	
  $upload_to ='pubuploads/';
  $upload_to ='pubuploads/';
  $upload_to ='pubuploads/';
  
// checking file size
if ($file_size > 500000) {
  $errors1[] = 'File size should be less than 500kb.';
}else if($file_size_cover > 500000){

  $errors2[] = 'File size should be less than 500kb.';
}else if($file_size_sub > 500000){

  $errors3[] = 'File size should be less than 500kb.';

}

if (empty($errors1)) 
 {
  $file_uploaded = move_uploaded_file($temp_name, $upload_to . $file_name);
 }else if(empty($errors2))
   {
     $file_uploaded = move_uploaded_file($temp_name_cover, $upload_to . $file_name_cover);
      }else if(empty($errors3))
       {
         $file_uploaded = move_uploaded_file($temp_name_sub, $upload_to . $file_name_sub);
       }
	

	
  
$sql = "INSERT INTO pages (template,coverpage,subpage,emailpubchair) VALUES ('$file_name','$file_name_cover','$file_name_sub','$p_Email')";
       
$query_run = mysqli_query($con,$sql);
						
				if($query_run)
					{
						echo '<script type="text/javascript"> alert("your pages save") </script>';
					}
          else
					{
						echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
					}




if (mysqli_query($con, $sql)) {
    // echo "File uploaded successfully";
    echo '<script type="text/javascript"> alert("Your paper was submitted successfully!!") </script>';

}
}




?>

<!DOCTYPE html>
<html>
<head>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	  <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/reg_form_style.css">
    



<!--<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/main_style.css">-->

</head>
<style>
  * {
  font-family: sans-serif; /* Change your font family */
}

</style>
<style>
    /* Styles for two buttons in the form*/
    .button {
  background-color: #5DADE2; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

  </style>
 
<!--<nav>
    <ul>
      <li><a href="publicationchairhomepage.php">Back</a></li>
      
    </ul>
  </nav>

  <br><br>-->
<!-- navbar -->
<nav>
  <div class="logo">Web-COMS</div>
        <input type="checkbox" id="click">
              <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
              </label>
    <ul>
    <li><a href="publicationchairhomepage.php">Back</a></li>
    <li><a class="active" href="uploadcoversub.php">Upload Pages</a></li>
    <li><a href="../../About.php">About</a></li>
    <li><a href="../../help.php">Help</a></li>

    </ul>
  </nav>
<h2></h2><br>



 <center>
   <h2>Upload cover pages and Sub Pages </h2>  

  </center>
<br><br>
<style>
    .errors1 { color: red; margin-bottom: 20px; }
    .errors2 { color: red; margin-bottom: 20px; }
    .errors3 { color: red; margin-bottom: 20px; }
	</style>

<body>

    <div id="container">
    <div class="row">
    
 <?php 
		          	if (!empty($errors1)) {
			            	echo '<div class="errors1">';
				          echo '<b>template not uploaded. Check following errors:</b><br>';
				          foreach ($errors1 as $error) {
				            	echo '- ' . $error;
			            	}
				           echo '</div>';
      }else if(!empty($errors2))
      {
        echo '<div class="errors2">';
				          echo '<b>coverpage not uploaded. Check following errors:</b><br>';
				          foreach ($errors2 as $error) {
				            	echo '- ' . $error;
			            	}
				           echo '</div>';

      }else if(!empty($errors3)){
        echo '<div class="errors3">';
        echo '<b>subpage not uploaded. Check following errors:</b><br>';
        foreach ($errors3 as $error) {
            echo '- ' . $error;
          }
         echo '</div>';

      }


 ?>

  

		
      <form action="uploadcoversub.php" method="post" enctype="multipart/form-data">
      <center>
      <h2 style="color:#5DADE2;">Select Files</h2>


       
        <br><br>
       </center>
          <h3>Upload template </h2><br>
          <input type="file" name="template" id="" ><br><br>
          <h3>Upload coverpage </h2><br>
          <input type="file" name="coverpage" id=""><br><br>
          <h3>Upload subpage </h2><br>
          <input type="file" name="subpage" id=""><br><br>
         
          <br>
          <button type="submit" class="button "id="save_btn" name="submit">Upload</button><br><br>
          <button type="cancel" class="button" onclick="javascript:window.location='uploadcoversub.php';">Cancel</button>
      </form>
  <center>
      <?php 
      
			if (isset($file_uploaded)) {
        
        echo '<h3 style="color:#FC0932 ;">Files Uploaded Successfully</h3>';
			}
     
		 ?>
     </center>

    </div>
    </div>
      <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>


 </body>
</html>
