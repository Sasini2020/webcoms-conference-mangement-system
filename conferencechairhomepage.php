<?php
  session_start();
  if($_SESSION['login_s'] != '4'){
    header('location:login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Conference Chair Home</title>

  <link rel="stylesheet" href="css/main_style.css">
  <!--
  <link rel="stylesheet" href="css/sty.css">
  
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

  <nav>
    <ul>
      <!--<li><a class="active" href="conferencechairhomepage.php">WebCOMS</a></li>-->
      <li><a href="create_conference.php">Create a Conference</a></li>
      <li><a href="#conferences_view.php">Define notification templates</a></li>
      <li><a href="#authordetails.php">Bulk Upload User Details</a></li>
      <!--<li><a href="#help.html">Send messages</a></li>
      <li><a href="#contactUs.html">Add Conference Guideline Details</a></li>
      <li><a href="index.php">Log Out</a></li>-->
    </ul>
  </nav>

  <br><br>

  <div>
    <form action="conferencechairhomepage.php" method="post">
      <input type="submit" name="logout" value="Log out" />
    </form>

    <?php
      if(isset($_POST['logout'])){
        session_destroy();
        header('location:index.php');
       }
    ?>
  </div>

  <br><br>

  <p> Conference chair home page </p>

</body>
</html>
