<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <title>Add review</title>

  <style type="text/css">
.form-style-1 {
	margin:10px auto;
	max-width: 1600px;
	padding: 20px 12px 10px 20px;
	font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
	padding: 0;
	display: block;
	list-style: none;
	margin: 10px 0 0 0;
}
.form-style-1 label{
	margin:0 0 3px 0;
	padding:0px;
    display:block;
    color:#2E4053;
    font-size:15px;
	font-weight: bold;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	border:1px solid #BEBEBE;
	padding: 7px;
	margin:0px;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	-o-transition: all 0.30s ease-in-out;
	outline: none;	
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
	-moz-box-shadow: 0 0 8px #88D5E9;
	-webkit-box-shadow: 0 0 8px #88D5E9;
	box-shadow: 0 0 8px #88D5E9;
	border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
	width: 49%;
}

.form-style-1 .field-long{
	width: 100%;
}
.form-style-1 .field-select{
	width: 100%;
}
.form-style-1 .field-textarea{
	height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
	background: dodgerblue;
	padding: 8px 15px 8px 15px;
    border: none;
    border-radius:5px;
    color: #fff;
    cursor:pointer;
    margin-left:70px;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
	background: #4691A4;
	box-shadow:none;
	-moz-box-shadow:none;
	-webkit-box-shadow:none;
}
.form-style-1 .required{
	color:red;
}



/* The container -check boxes,radio buttons*/
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 7px;
  top: 4px;
  width: 4px;
  height: 9px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>

</head>
<body>
<!-- navbar -->
<nav>
<div class="logo">Web-COMS</div>
        <input type="checkbox" id="click">
              <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
              </label>
      <ul>
      <!--<li><a href="reviewform.php">Submit paper review comment</a></li>-->
        <li><a class="active" href="addreview.php">Add Review</a></li>
        <li><a href="../../About.php">About</a></li>
        <li><a href="../../help.php">Help</a></li>
        <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

        <!--<li><a href="reviewerhomepagenew.php">Back</a></li>-->

      </ul>
</nav>
<br>
<h2 style="color:#2E4053 ;margin-left:20px;">Add Review</h2>
<br><br>
<h4 style="color:#2874A6 ;margin-left:20px;">Paper ID<span style=margin-left:79px;>:</span ><span style=margin-left:65px;> </span>
<?php 
      $f_id = $_GET['f_id'];
      echo "$f_id";
?></h4>
<h4 style="color:#2874A6 ;margin-left:20px;">Paper Title<span style=margin-left:60px;>:</span><span style=margin-left:65px;> </span>
<?php 
      $f_title = $_GET['f_title'];
      echo "$f_title";
?></h4>
<h4 style="color:#2874A6 ;margin-left:20px;">Track Name<span style=margin-left:48px;>:</span><span style=margin-left:65px;> </span>

</h4>
<br><br><br>

<form>
<ul class="form-style-1">
    
        <label>1) While performing my duties as a reviewer(including writing reviewes and partcipating in discussion), I have
        and will continue to abide by the xxxx code of conduct <span class="required">*</span ><span style="color:dodgerblue;">(visible to other reviewer)</span></label>
        <!-- <input type="email" name="field3" class="field-long" /> -->
        
        <br>
        <label class="container" style="margin-left:30px;">
            <input type="checkbox" checked="checked" style="margin-left:35px;">
            <span class="checkmark"></span><span style="margin-left:40px;" >I agree</span>
        </label>
    </li>
    <br>
    <li>
    <label>2) Have you seen this submission online (e.g.arXiv, personal website, social media ) ?<span class="required">*</span><span style="color:dodgerblue;">(visible to other reviewer)</span></label><br>
			<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    
    <br><br>

    <label>3) Have you previously reviewed or area chaired ( a version of ) this work for another archival venue ?</label><br>
    <input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    
     <li>
        <label>4) Reviewer's level of confidence (alignment with your domain of expertise) : </label>
        <select name="field4" class="field-select">
        <option value="Advertise"></option>
        <option value="Advertise">High</option>
        <option value="Partnership">Medium</option>
        <option value="General Question">Low</option>
        </select>
    </li>
    <br>
    <label>5) Relevance : </label><br>
    <input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <label>6) Novelty or Originality - The paper reflects current information on this topic : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <label>7) The title is clear and informative : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <label>8) The title reflects the content and purpose of the paper : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <label>9) Abstract : </label><br>
    <input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>10) Keywords : </label><br>
    <input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>11) Content - Introduction : </label><br>
	<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>12) Content - Background / Literature Study - The most current references on this topic have been included : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>13) Content - Background / Literature Study - The most relevant references on this topic have been included : </label><br>
    <input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>14) Content - Methodology : </label><br>
   <input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>15) Clarity - There are no any contradictions or inconsistencies: </label><br>
    <input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <label>16) Clarity - The paper stays focused : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>17) Organization - Ideas are developed and related in a logic sequence : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>18) Organization - Transitions between discussion are smooth and easy to follow : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>19) Accuracy - The supporting evidence ( literature referenced ) is appopriately cited : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>20) Accuracy - Tables and figures are of clear and satisfactory quality : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>21) Accuracy - There are no math or text errors in tables or figures : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>22) Accuracy - Legends and titles of tables and figures are clearly given : </label><br>
		<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>

    <label>23) Accuracy - The paper is free from grammatical or spelling errors : </label><br>
	<input id="yes" type="radio" name="rad" value="yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="rad" value="no" style="margin-left:20px;"required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    
    <br>
    <li>
        <label>24) Quality of the paper : </label>
        <select name="field4" class="field-select">
        <option value="Advertise"></option>
        <option value="Advertise">Excellent</option>
        <option value="Partnership">Good</option>
        <option value="General Question">Average</option>
        <option value="General Question">Fair</option>
        <option value="General Question">Poor</option>

        </select>
    </li>
    <br>
    <li>
        <label>25) Recommendation : </label>
        <select name="field4" class="field-select">
        <option value="Advertise"> </option>
        <option value="Advertise">Yes - no changes </option>
        <option value="Partnership">Yes - with minor revisions</option>
        <option value="General Question">Yes - with major revisions</option>
        <option value="General Question">No</option>

        </select>
    </li>
    <br>
    <li>
        <label>26) Overall Recommendation :</label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
        <label>27) Comments to author :</label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <br><br>
    <li>
        <input type="submit" value=" + Add a new question"/>
    </li>
    <br><br><br>
    <center>
    <li>
        <input type="submit" value="Submit" />
        <input type="submit" style="margin-left:60px;background-color:grey;"value="Cancel">
    </li>
    </center>
    
</ul>
</form>

<!-- Footer section -->
        <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>
</html>
