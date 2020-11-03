<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Author Home</title>
    <link rel="stylesheet" href="../../css/main_style.css">
</head>
<body>
<nav>
    <ul>
      <li><a href="ConferenceListForA.php">Conference List</a></li>
    </ul>
  </nav>

  <br><br>

    <p> Welcome Author </p><br><br>

    <div>
        <form action="author_home.php" method="post">
            <input type="submit" name="logout" value="Log out" />
        </form>

        <?php
            if(isset($_POST['logout'])){
                session_destroy();
                header('location:../../index.php');
            }
        ?>
    </div>  

</body>
</html>
