<?php
	session_start();
	if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<body>
   Reviewer Check !! </br>
</body>
</html>    


