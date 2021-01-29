<?php
    session_start();
    require '../../dbconfig/config.php';
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
  <title>Edit review</title>

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

/* catogery style */
.catogeryHead{
  cursor:pointer;
}

.qSetHide1{  
  height: 0px;
  margin-left: 10px;
  overflow:hidden;
  transition:height 0.8s ease-in;
  display:block;
}
.qSetHide1.clicked1{
  height: 480px;
  transition:height 0.8s ease-out;
}

.qSetHide2{  
  height: 0px;
  margin-left: 10px;
  overflow:hidden;
  transition:height 3.7s ease-in;
  display:block;
}
.qSetHide2.clicked2{
  height: 1750px;
  transition:height 3.7s ease-out;
}

.qSetHide3{  
  height: 0px;
  margin-left: 10px;
  overflow:hidden;
  transition:height 2.2s ease-in;
  display:block;
}
.qSetHide3.clicked3{
  height: 1170px;
  transition:height 2.2s ease-out;
}

.qSetHide4{  
  height: 0px;
  margin-left: 10px;
  overflow:hidden;
  transition:height 2.3s ease-in;
  display:block;
}
.qSetHide4.clicked4{
  height: 1200px;
  transition:height 2.3s ease-out;
}

.qSetHide5{  
  height: 0px;
  margin-left: 10px;
  overflow:hidden;
  transition:height 2.5s ease-in;
  display:block;
}
.qSetHide5.clicked5{
  height: 1560px;
  transition:height 2.5s ease-out;
}

.qSetHide6{  
  height: 0px;
  margin-left: 10px;
  overflow:hidden;
  transition:height 0.8s ease-in;
  display:block;
}
.qSetHide6.clicked6{
  height: 390px;
  transition:height 0.8s ease-out;
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
        <li><a href="paperlist.php">Back to Paper List</a></li>
        <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

      </ul>
</nav>
<br>
<h2 style="color:#2E4053 ;margin-left:40px;">Edit Review</h2>
<br><br>
<!--<h4 style="color:#2874A6 ;margin-left:20px;">Paper ID<span style=margin-left:79px;>:</span ><span style=margin-left:65px;> </span>
<?php 
      //$f_id = $_SESSION['f_id'];
      //echo "$f_id";
?></h4>-->
<h4 style="color:#2874A6 ;margin-left:40px;">Paper Title<span style=margin-left:60px;>:</span><span style=margin-left:65px;> </span>
<?php 
      $f_title = $_SESSION['RPaperTitle'];
      echo "$f_title";
?></h4>
<!--<h4 style="color:#2874A6 ;margin-left:20px;">Track Name<span style=margin-left:48px;>:</span><span style=margin-left:65px;> </span>

</h4>-->
<br><br><br>

<?php
  $rEmail = $_SESSION['r_email'];
  $RPaperId = $_SESSION['RPaperId'];

  $queryResult = mysqli_query($con,"select * from review_form where (emailreviewer = '$rEmail') and (rPaperId = $RPaperId);");

  $row = mysqli_fetch_assoc($queryResult)
?>

<form action="editreview.php" method="post" style="width:1200px;margin:0 auto">
<ul class="form-style-1">
  <h2 class="trigger1 catogeryHead" style="color:#273746;border-bottom: 3px solid dodgerblue;">I. General &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></h2>
  <br>
  <div class="qSetHide1">
    
          <label>1) While performing my duties as a reviewer(including writing reviewes and partcipating in discussion), I have
          and will continue to abide by the xxxx code of conduct <span class="required">*</span ><span style="color:dodgerblue;">(visible to other reviewer)</span></label>
          
          <?php
            if($row['question1'] == "I agree"){
              $showVal = "checked";
            }
            else{
              $showVal = "";
            }
          ?>

          <br>
          <label class="container" style="margin-left:30px;">
              <input name="question1" value="I agree" type="checkbox" <?= $showVal ?>  style="margin-left:35px;">
              <span class="checkmark"></span><span style="margin-left:40px;" >I agree</span>
          </label>
      </li>
      <br>
      <li>
      <label>2) Have you seen this submission online (e.g.arXiv, personal website, social media ) ?<span class="required">*</span><span style="c olor:dodgerblue;">(visible to other reviewer)</span></label><br>
        <?php
          if($row['question2'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question2'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
        <input id="yes" type="radio" name="question2" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question2" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      
      <br><br>

      <label>3) Have you previously reviewed or area chaired ( a version of ) this work for another archival venue ?</label><br>
      <?php
          if($row['question3'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question3'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question3" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question3" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      
      <li>
          <label>4) Reviewer's level of confidence (alignment with your domain of expertise) : </label>
          <?php
            switch($row['question4']){
              case "High":
                $op0 = "";$op1 = "selected";$op2 = "";$op3 = "";
                break;
              case "Medium":
                $op0 = "";$op1 = "";$op2 = "selected";$op3 = "";
                break;
              case "Low":
                $op0 = "";$op1 = "";$op2 = "";$op3 = "selected";
                break;
              default:
                $op0 = "selected";$op1 = "";$op2 = "";$op3 = "";
            }
          ?>
          <select name="question4" class="field-select">
            <option value="" <?= $op0 ?> ></option>
            <option value="High" <?= $op1 ?> >High</option>
            <option value="Medium" <?= $op2 ?> >Medium</option>
            <option value="Low" <?= $op3 ?> >Low</option>
          </select>
      </li>
    </div>
    <br><br>
    <h2 class="trigger2 catogeryHead" style="color:#273746;border-bottom: 3px solid dodgerblue;">II. Subject Treatment  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></h2>
    <br><br>
    <div class="qSetHide2">
      <li>
        <label>5) Relevance : </label><br>
        <?php
          if($row['question5'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question5'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
        <input id="yes" type="radio" name="question5" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question5" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question5_no" id="field5" class="field-long field-textarea" ><?= $row['question5_no'] ?></textarea>
      </li>
      <br>
      <label>6) Novelty or Originality - The paper reflects current information on this topic : </label><br>
      <?php
          if($row['question6'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question6'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question6" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question6" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question6_no" id="field5" class="field-long field-textarea"><?= $row['question6_no'] ?></textarea>
      </li>
      <br>
      <label>7) The title is clear and informative : </label><br>
      <?php
          if($row['question7'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question7'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question7" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question7" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question7_no" id="field5" class="field-long field-textarea"><?= $row['question7_no'] ?></textarea>
      </li>
      <br>
      <label>8) The title reflects the content and purpose of the paper : </label><br>
      <?php
          if($row['question8'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question8'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question8" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question8" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question8_no" id="field5" class="field-long field-textarea"><?= $row['question8_no'] ?></textarea>
      </li>
      <br>
      <label>9) Abstract : </label><br>
      <?php
          if($row['question9'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question9'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question9" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question9" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question9_no" id="field5" class="field-long field-textarea"><?= $row['question9_no'] ?></textarea>
      </li>
      <br>

      <label>10) Keywords : </label><br>
      <?php
          if($row['question10'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question10'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question10" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question10" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question10_no" id="field5" class="field-long field-textarea"><?= $row['question10_no'] ?></textarea>
      </li>
    </div>
    <br><br>

    <h2 class="trigger3 catogeryHead" style="color:#273746;border-bottom: 3px solid dodgerblue;">III. Content  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></h2>
    <br><br>
    <div class="qSetHide3">
        <li>
          <label>11) Content - Introduction : </label><br>
        <?php
            if($row['question11'] == "Yes"){
              $showYes = "checked";
              $showNo = "";
            }
            elseif($row['question11'] == "No"){
              $showYes = "";
              $showNo = "checked";
            }
          ?>
        <input id="yes" type="radio" name="question11" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
          <br><br>
          <input id="no" type="radio"  name="question11" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
        </li>       
        <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question11_no" id="field5" class="field-long field-textarea"><?= $row['question11_no'] ?></textarea>
      </li>
      <br>

      <label>12) Content - Background / Literature Study - The most current references on this topic have been included : </label><br>
      <?php
          if($row['question12'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question12'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question12" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question12" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question12_no" id="field5" class="field-long field-textarea"><?= $row['question12_no'] ?></textarea>
      </li>
      <br>

      <label>13) Content - Background / Literature Study - The most relevant references on this topic have been included : </label><br>
      <?php
          if($row['question13'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question13'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question13" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question13" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question13_no" id="field5" class="field-long field-textarea"><?= $row['question13_no'] ?></textarea>
      </li>
      <br>

      <label>14) Content - Methodology : </label><br>
      <?php
          if($row['question14'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question14'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
    <input id="yes" type="radio" name="question14" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question14" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question14_no" id="field5" class="field-long field-textarea"><?= $row['question14_no'] ?></textarea>
      </li>
    </div>
    <br><br>

    <h2 class="trigger4 catogeryHead" style="color:#273746;border-bottom: 3px solid dodgerblue;">IV. Clarity  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></h2>
    <div class="qSetHide4">
    <br><br>
      <li>
        <label>15) Clarity - There are no any contradictions or inconsistencies: </label><br>
        <?php
            if($row['question15'] == "Yes"){
              $showYes = "checked";
              $showNo = "";
            }
            elseif($row['question15'] == "No"){
              $showYes = "";
              $showNo = "checked";
            }
          ?>
        <input id="yes" type="radio" name="question15" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question15" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question15_no" id="field5" class="field-long field-textarea"><?= $row['question15_no'] ?></textarea>
      </li>
      <br>
      <label>16) Clarity - The paper stays focused : </label><br>
      <?php
          if($row['question16'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question16'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question16" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question16" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question16_no" id="field5" class="field-long field-textarea"><?= $row['question16_no'] ?></textarea>
      </li>
      <br>

      <label>17) Organization - Ideas are developed and related in a logic sequence : </label><br>
      <?php
          if($row['question17'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question17'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question17" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question17" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question17_no" id="field5" class="field-long field-textarea"><?= $row['question17_no'] ?></textarea>
      </li>
      <br>

      <label>18) Organization - Transitions between discussion are smooth and easy to follow : </label><br>
      <?php
          if($row['question18'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question18'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question18" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question18" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question18_no" id="field5" class="field-long field-textarea"><?= $row['question18_no'] ?></textarea>
      </li>
    </div>
    <br><br><br><br>

    <h2 class="trigger5 catogeryHead" style="color:#273746;border-bottom: 3px solid dodgerblue;">V. Accuracy And Quality  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></h2>
    <br><br>
    <div class="qSetHide5">
      <li>
      <label>19) Accuracy - The supporting evidence ( literature referenced ) is appopriately cited : </label><br>
      <?php
          if($row['question19'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question19'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question19" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question19" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question19_no" id="field5" class="field-long field-textarea"><?= $row['question19_no'] ?></textarea>
      </li>
      <br>

      <label>20) Accuracy - Tables and figures are of clear and satisfactory quality : </label><br>
      <?php
          if($row['question20'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question20'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question20" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question20" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question20_no" id="field5" class="field-long field-textarea"><?= $row['question20_no'] ?></textarea>
      </li>
      <br>

      <label>21) Accuracy - There are no math or text errors in tables or figures : </label><br>
      <?php
          if($row['question21'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question21'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question21" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question21" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question21_no" id="field5" class="field-long field-textarea"><?= $row['question21_no'] ?></textarea>
      </li>
      <br>

      <label>22) Accuracy - Legends and titles of tables and figures are clearly given : </label><br>
      <?php
          if($row['question22'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question22'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question22" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question22" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question22_no" id="field5" class="field-long field-textarea"><?= $row['question22_no'] ?></textarea>
      </li>
      <br>

      <label>23) Accuracy - The paper is free from grammatical or spelling errors : </label><br>
      <?php
          if($row['question23'] == "Yes"){
            $showYes = "checked";
            $showNo = "";
          }
          elseif($row['question23'] == "No"){
            $showYes = "";
            $showNo = "checked";
          }
        ?>
      <input id="yes" type="radio" name="question23" value="Yes" style="margin-left:20px;" <?= $showYes ?> required> Yes
        <br><br>
        <input id="no" type="radio"  name="question23" value="No" style="margin-left:20px;" <?= $showNo ?> required> No
      </li>       
      <br><br>
      <li>
          <label>(If 'no', Please give reasons) : </label>
          <textarea name="question23_no" id="field5" class="field-long field-textarea"><?= $row['question23_no'] ?></textarea>
      </li>
      
      <br>
      <li>
          <label>24) Quality of the paper : </label>
          <?php
            switch($row['question24']){
              case "Excellent":
                $op0 = "";$op1 = "selected";$op2 = "";$op3 = "";$op4 = "";$op5 = "";
                break;
              case "Good":
                $op0 = "";$op1 = "";$op2 = "selected";$op3 = "";$op4 = "";$op5 = "";
                break;
              case "Average":
                $op0 = "";$op1 = "";$op2 = "";$op3 = "selected";$op4 = "";$op5 = "";
                break;
              case "Fair":
                $op0 = "";$op1 = "";$op2 = "";$op3 = "";$op4 = "selected";$op5 = "";
                break;
              case "Poor":
                $op0 = "";$op1 = "";$op2 = "";$op3 = "";$op4 = "";$op5 = "selected";
                break;
              default:
                $op0 = "selected";$op1 = "";$op2 = "";$op3 = "";$op4 = "";$op5 = "";
            }
          ?>
          <select name="question24" class="field-select">
            <option value="" <?= $op0 ?> ></option>
            <option value="Excellent" <?= $op1 ?> >Excellent</option>
            <option value="Good" <?= $op2 ?> >Good</option>
            <option value="Average" <?= $op3 ?> >Average</option>
            <option value="Fair" <?= $op4 ?> >Fair</option>
            <option value="Poor" <?= $op5 ?> >Poor</option>
          </select>
      </li>
    </div>
    <br><br>

    <h2 class="trigger6 catogeryHead" style="color:#273746;border-bottom: 3px solid dodgerblue;">VI. Recommendations  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></h2>
    <br><br>
    <div class="qSetHide6">

      <li>
          <label>25) Recommendation : </label>
          <?php
            switch($row['question25']){
              case "Yes - no changes":
                $op0 = "";$op1 = "selected";$op2 = "";$op3 = "";$op4 = "";
                break;
              case "Yes - with minor revisions":
                $op0 = "";$op1 = "";$op2 = "selected";$op3 = "";$op4 = "";
                break;
              case "Yes - with major revisions":
                $op0 = "";$op1 = "";$op2 = "";$op3 = "selected";$op4 = "";
                break;
              case "No":
                $op0 = "";$op1 = "";$op2 = "";$op3 = "";$op4 = "selected";
                break;
              default:
                $op0 = "selected";$op1 = "";$op2 = "";$op3 = "";$op4 = "";
            }
          ?>
            <select name="question25" class="field-select">
            <option value="" <?= $op0 ?> > </option>
            <option value="Yes - no changes" <?= $op1 ?> >Yes - no changes</option>
            <option value="Yes - with minor revisions" <?= $op2 ?> >Yes - with minor revisions</option>
            <option value="Yes - with major revisions" <?= $op3 ?> >Yes - with major revisions</option>
            <option value="No" <?= $op4 ?> >No</option>

          </select>
      </li>
      <br>
      <li>
          <label>26) Overall Recommendation :</label>
          <textarea name="question26" id="field5" class="field-long field-textarea"><?= $row['question26'] ?></textarea>
      </li>
      <br>
      <li>
          <label>27) Comments to author :</label>
          <textarea name="question27" id="field5" class="field-long field-textarea"><?= $row['question27'] ?></textarea>
      </li>
    </div>
    <br>
    <br><br>
   
    <br><br><br>
    <center>
    <li>
        <input name="update_btn" type="submit" value="Update" />
        <input type="submit" style="margin-left:60px;background-color:grey;" value="Cancel" onclick="javascript:window.location='editreview.php'">

    </li>
    </center>
    
</ul>
</form>

<?php
			if(isset($_POST['update_btn']))
			{		
		
        $rEmail = $_SESSION['r_email'];
        $RPaperId = $_SESSION['RPaperId'];
        $question1	=$_POST['question1'];
        $question2	=$_POST['question2'];
        $question3	=$_POST['question3'];
        $question4	=$_POST['question4'];
        $question5	=$_POST['question5'];
        $question5_no =$_POST['question5_no'];
        $question6	=$_POST['question6'];
        $question6_no	=$_POST['question6_no'];
        $question7 =$_POST['question7'];
        $question7_no	=$_POST['question7_no'];
        $question8	=$_POST['question8'];
        $question8_no	=$_POST['question8_no'];
        $question9	=$_POST['question9'];
        $question9_no =$_POST['question9_no'];
        $question10	=$_POST['question10'];
        $question10_no	=$_POST['question10_no'];
        $question11	=$_POST['question11'];
        $question11_no	=$_POST['question11_no'];
        $question12	=$_POST['question12'];
        $question12_no =$_POST['question12_no'];
        $question13 =$_POST['question13'];	
        $question13_no	=$_POST['question13_no'];
        $question14	=$_POST['question14'];
        $question14_no =$_POST['question14_no'];
        $question15	=$_POST['question15'];
        $question15_no	=$_POST['question15_no'];
        $question16	=$_POST['question16'];
        $question16_no	=$_POST['question16_no'];
        $question17	=$_POST['question17'];
        $question17_no	=$_POST['question17_no'];
        $question18	=$_POST['question18'];
        $question18_no	=$_POST['question18_no'];
        $question19	=$_POST['question19'];
        $question19_no	=$_POST['question19_no'];
        $question20	=$_POST['question20'];
        $question20_no	=$_POST['question20_no'];
        $question21	=$_POST['question21'];
        $question21_no	=$_POST['question21_no'];
        $question22	=$_POST['question22'];
        $question22_no =$_POST['question22_no'];
        $question23	=$_POST['question23'];
        $question23_no	=$_POST['question23_no'];
        $question24	=$_POST['question24'];
        $question25	=$_POST['question25'];
        $question26	=$_POST['question26'];
        $question27	=$_POST['question27'];
					
        $query="update review_form set question1='$question1', question2='$question2',	question3='$question3',
          question4='$question4',	question5='$question5',question5_no='$question5_no',	question6='$question6',
          question6_no='$question6_no', question7='$question7', question7_no='$question7_no', question8='$question8', 
          question8_no='$question8_no', question9='$question9', question9_no='$question9_no',
          question10='$question10', question10_no='$question10_no', question11='$question11', question11_no='$question11_no',
          question12='$question12', question12_no='$question12_no', question13='$question13', question13_no='$question13_no',
          question14='$question14', question14_no='$question14_no', question15='$question15',
          question15_no='$question15_no', question16='$question16', question16_no='$question16_no', question17='$question17',
          question17_no='$question17_no', question18='$question18', question18_no='$question18_no', question19='$question19',
          question19_no='$question19_no', question20='$question20', question20_no='$question20_no', question21='$question21',
          question21_no='$question21_no', question22='$question22', question22_no='$question22_no', question23='$question23',
          question23_no='$question23_no', question24='$question24', question25='$question25', question26='$question26',
          question27='$question27'
          where (emailreviewer = '$rEmail') and (rPaperId = $RPaperId);";
        $query_run = mysqli_query($con,$query);

        
						
				if($query_run)
					{            
              echo '<script type="text/javascript"> 
                    if (window.confirm("Your review is submitted.")) 
                    {
                    window.location.href="editreview.php";
                    };
                  </script>';           
					}
				else
					{
						echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
					}
			}			
		?>

<!-- Footer section -->
        <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


  // add show and hide part to catagory
  $(".trigger1").on("click", function(){
    $(".qSetHide1").toggleClass("clicked1");
  });

  $(".trigger2").on("click", function(){
    $(".qSetHide2").toggleClass("clicked2");
  });

  $(".trigger3").on("click", function(){
    $(".qSetHide3").toggleClass("clicked3");
  });

  $(".trigger4").on("click", function(){
    $(".qSetHide4").toggleClass("clicked4");
  });

  $(".trigger5").on("click", function(){
    $(".qSetHide5").toggleClass("clicked5");
  });

  $(".trigger6").on("click", function(){
    $(".qSetHide6").toggleClass("clicked6");
  });
</script>

</body>
</html>
