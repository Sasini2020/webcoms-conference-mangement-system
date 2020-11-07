<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/main_style.css">
<link rel="stylesheet" href="../../css/sty.css">
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


<body style="background-color:#bdc3c7">

<nav>
    <ul>
      <li><a href="trackchairhomepage.php">Back</a></li>
    </ul>
  </nav>

 <center>
    <h1> Assign reviewers for papers </h1>
 </center>
 

<br><br>

<div id="main-wrapper">

  <form action="assignreviewrs.php">
     <label for="no">select paper</label>
  
       <select name="papers" id="cars">
         <option value="paper1">paper1</option>
       </select>  
       <br><br>

     <label for="no">select reviewrs</label>
       <select name="reviewrs" id="reviewrs">
         <option value="rev1">reviewrs1</option>
       </select>  
       <br><br>

     <input type="submit" value="Save">
     <input type="submit" value="cancel"><br><br>
  </form>
 </div>
 </body>

</html>
