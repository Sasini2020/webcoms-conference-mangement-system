<?php
	session_start();
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

<title>Home Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#bdc3c7">





<ul>
  <li><a class="active" href="conferencechairhomepage.php">WebCOMS</a></li>
  <li><a href="create_conference.php">Create a Conference</a></li>
	<li><a href="#conferences_view.php">Define notification templates</a></li>
	<li><a href="#authordetails.php">Bulk Upload User Details</a></li>
	<li><a href="#help.html">Send messages</a></li>
	<li><a href="#contactUs.html">Add Conference Guideline Details</a></li>
	<li><a href="index.php">Log Out</a></li>
</ul>

</br></br>


	
	
</body>
</html>
