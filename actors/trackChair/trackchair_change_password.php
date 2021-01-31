<?php
    session_start();
    if($_SESSION['login_s'] != '5'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
   <link rel="stylesheet" href="../../css/reg_form_style.css">

   <style>
	/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}

</style>	
 
</head>
<body>
 <nav>
       <div class="logo">WebComs</div>
           <input type="checkbox" id="click">
             <label for="click" class="menu-btn">
               <i class="fas fa-bars"></i>
             </label>
        <ul>
            <li><a href="trackchairhomepage.php">Back to Home</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
        <ul>

 </nav>
 <br><br>
   <h1>Change password</h1>
   <br><br>
   <div id="main-wrapper"> 
       
     <?php  
     
        ?>
           <form action="trackchair_change_password.php" method="post" class="myform">
               <fieldset>
                  <label for="currentPass"><h3>Current Password</h3></label><br>
                  <input type="password" name="currentPass" placeholder="Current password" required><br>

                  <label for="newPass"><h3>New Password</h3></label><br>

                   <input type="password" name="newPwd" id="newPass" placeholder="New password" 
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one 
                   uppercase and lowercase letter, and at least 8 or more characters" required><br>

                   <!-- Validations passwod -->
                  <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                  </div>

                  <br>
                   
                   <input type="password" name="CNPwd" placeholder="Confirm new password" required><br><br>

                   <button type="submit" name="changePass">Change Password</button>

               </fieldset>
           </form>

       <?php


     ?>

     <?php
         if(isset($_POST["changePass"])){
           $aEmail = $_SESSION['t_email'];
           $currentPass = $_POST['currentPass'];
           $newPass = $_POST['newPwd']; 
           $conNewPass = $_POST['CNPwd'];
           
           $query_result = mysqli_query($con,"select password from trackchair where emailtrackchair='$aEmail'");
           $row = mysqli_fetch_assoc($query_result);

           $encriptedCurrentPass = md5($currentPass);
           
           if($row['password'] == $encriptedCurrentPass){
              //echo '<script type="text/javascript"> alert("yahoo") </script>';

              if($newPass == $conNewPass){
                //echo '<script type="text/javascript"> alert("yahoo") </script>';
                
                if($currentPass <> $newPass){  
                    
                  $encriptedNewPass = md5($newPass);

                  // avoid new password duplication
                  $query_result_CD = mysqli_query($con,"select password from userinfotable where (email='$aEmail')
                  and (user_type <> 'TrackChair')");
                  $CDCount = 0;
                  while($rowCD = mysqli_fetch_assoc($query_result_CD)){
                    if($rowCD['password']==$encriptedNewPass){
                      $CDCount++;
                    }
                  }

                  if($CDCount == 0){
                    // update password query
                    $encriptedNewPass = md5($newPass);

                    $query1_r = mysqli_query($con,"update userinfotable set password='$encriptedNewPass'
                                where (email = '$aEmail') and (user_type = 'TrackChair')");
                    
                    $query2_r = mysqli_query($con,"update trackchair set password='$encriptedNewPass' where emailtrackchair = '$aEmail'");

                    if($query1_r and $query2_r){
                      $_SESSION['user_password'] = $newPass;
                      echo '<script type="text/javascript"> alert("Successfully.. Password is updated..!") </script>';
                    }
                  }
                  else{
                    echo '<script type="text/javascript"> alert("You entered new password is allready used with another actor type. Please add another new password..!") </script>';
                  }
                }
                else{
                  echo '<script type="text/javascript"> alert("You added new password is same as current password. Please add another new password..!") </script>';
                }
                
              }
              else{
                echo '<script type="text/javascript"> alert("New Password and Conform Password are not match..!") </script>';
              }
           }
           else{
              echo '<script type="text/javascript"> alert("Current Password is wrong..!") </script>';
           }
         }
     ?>
   </div>

<script>
var myInput = document.getElementById("newPass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

   <div class="footer">
     <p>&copy;2020,All Rights Reserved By www.WebComs.lk </p>

   </div>


</body>
</html>

