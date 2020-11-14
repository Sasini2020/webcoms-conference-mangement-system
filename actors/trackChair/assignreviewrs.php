<?php
	session_start();
    if($_SESSION['login_s'] != '5'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="../../css/nav_footer_styles.css">
<link rel="stylesheet" href="../../css/reg_form_style.css">
<!--<link rel="stylesheet" href="../../css/main_style.css">
<link rel="stylesheet" href="../../css/sty.css">-->
</head>
  
<style>
.button {
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.home {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.home:hover {
  background-color: #008CBA;
  color: white;
}


</style>


<body >

<nav>
    <ul>
      <li><a href="trackchairhomepage.php">Back</a></li>
    </ul>
  </nav>

 <center>
    <h1> Assign reviewers for papers </h1>
 </center>
 

<br><br>

<div id="container">

  <form action="assignreviewrs.php">
     <label for="no">select paper</label>
  
       <select name="papers" id="cars">
         <option value="paper1">select paper</option>
       </select>  
       <br><br>

     <label for="no">select reviewrs</label>
       <select name="reviewrs" id="reviewrs">
         <option value="rev1">select reviewrs</option>
       </select>  
       <br><br>

      <button type="submit" class="button "id="save_btn" name="submit">Save</button><br><br>
      <button type="cancel" class="button" onclick="javascript:window.location='uploadcoversub.php';">Cancel</button>

     <!--<input type="submit" value="Save">
     <input type="submit" value="cancel"><br><br>-->

  </form>
 </div>
  <!-- Footer section -->
  <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>

 </body>

</html>
