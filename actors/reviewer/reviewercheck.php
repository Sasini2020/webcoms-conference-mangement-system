<?php
	session_start();
	if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<body>
    <center>
    <h1> paper review comment </h1>
    <hr/>
   Paper Name : <?php echo $_POST("name");?> </br>
    Comment: <?php echo $_POST["comment"];?>
    </center>
</body>
</html>    


