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

.qSetHide{  
  height: 0px;
  overflow: hidden;
}
.qSetShow{
  height: auto;
  margin-left: 10px;
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
<h2 style="color:#2E4053 ;margin-left:20px;">Add Review</h2>
<br><br>
<!--<h4 style="color:#2874A6 ;margin-left:20px;">Paper ID<span style=margin-left:79px;>:</span ><span style=margin-left:65px;> </span>
<?php 
      //$f_id = $_SESSION['f_id'];
      //echo "$f_id";
?></h4>-->
<h4 style="color:#2874A6 ;margin-left:20px;">Paper Title<span style=margin-left:60px;>:</span><span style=margin-left:65px;> </span>
<?php 
      $f_title = $_SESSION['RPaperTitle'];
      echo "$f_title";
?></h4>
<!--<h4 style="color:#2874A6 ;margin-left:20px;">Track Name<span style=margin-left:48px;>:</span><span style=margin-left:65px;> </span>

</h4>-->
<br><br><br>

<form action="addreview.php" method="post">
<ul class="form-style-1">
  <h2 id="questionSet1-" style="color:#273746;border-bottom: 3px solid dodgerblue;">I. General</h2>
  <br>
  <div class="qSetShow" id="questionSet1Con-">
      <li>
        <label>1) While performing my duties as a reviewer(including writing reviewes and partcipating in discussion), I have
        and will continue to abide by the xxxx code of conduct <span class="required">*</span ><span style="color:dodgerblue;">(visible to other reviewer)</span></label>
        <!-- <input type="email" name="field3" class="field-long" /> -->
        
        <br>
        <label class="container" style="margin-left:30px;">
            <input name="question1" value="I agree" type="checkbox" checked="checked" style="margin-left:35px;">
            <span class="checkmark"></span><span style="margin-left:40px;" >I agree</span>
        </label>
    </li>
    <br>
    <li>
    <label>2) Have you seen this submission online (e.g.arXiv, personal website, social media ) ?<span class="required">*</span><span style="c olor:dodgerblue;">(visible to other reviewer)</span></label><br>
			<input id="yes" type="radio" name="question2" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question2" value="No" style="margin-left:20px;" required> No
    </li>       
    
    <br><br>
    <li>
    <label>3) Have you previously reviewed or area chaired ( a version of ) this work for another archival venue ?</label><br>
    <input id="yes" type="radio" name="question3" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question3" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    
     <li>
        <label>4) Reviewer's level of confidence (alignment with your domain of expertise) : </label>
        <select name="question4" class="field-select">
        <option value=""></option>
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
        </select>
    </li>
  </div>
    <br><br>
    <h2 id="questionSet1-" style="color:#273746;border-bottom: 3px solid dodgerblue;">II. Subject Treatment </h2>
    <br><br>
    <li>
    <label>5) Relevance : </label><br>
    <input id="yes" type="radio" name="question5" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question5" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question5_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>6) Novelty or Originality - The paper reflects current information on this topic : </label><br>
		<input id="yes" type="radio" name="question6" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question6" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question6_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>7) The title is clear and informative : </label><br>
		<input id="yes" type="radio" name="question7" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question7" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question7_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>8) The title reflects the content and purpose of the paper : </label><br>
		<input id="yes" type="radio" name="question8" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question8" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question8_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>9) Abstract : </label><br>
    <input id="yes" type="radio" name="question9" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question9" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question9_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>10) Keywords : </label><br>
    <input id="yes" type="radio" name="question10" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question10" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question10_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br><br>
    <li>
    <h2 id="questionSet1-" style="color:#273746;border-bottom: 3px solid dodgerblue;">III. Content</h2>
    <br><br>
    <label>11) Content - Introduction : </label><br>
	<input id="yes" type="radio" name="question11" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question11" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question11_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>12) Content - Background / Literature Study - The most current references on this topic have been included : </label><br>
		<input id="yes" type="radio" name="question12" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question12" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question12_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>13) Content - Background / Literature Study - The most relevant references on this topic have been included : </label><br>
    <input id="yes" type="radio" name="question13" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question13" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question13_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>14) Content - Methodology : </label><br>
   <input id="yes" type="radio" name="question14" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question14" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question14_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br><br>
    <h2 id="questionSet1-" style="color:#273746;border-bottom: 3px solid dodgerblue;">IV. Clarity</h2>

    <li><br><br>
    <label>15) Clarity - There are no any contradictions or inconsistencies: </label><br>
    <input id="yes" type="radio" name="question15" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question15" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question15_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>16) Clarity - The paper stays focused : </label><br>
		<input id="yes" type="radio" name="question16" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question16" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question16_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>17) Organization - Ideas are developed and related in a logic sequence : </label><br>
		<input id="yes" type="radio" name="question17" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question17" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question17_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>18) Organization - Transitions between discussion are smooth and easy to follow : </label><br>
		<input id="yes" type="radio" name="question18" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question18" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question18_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br><br>
    <h2 id="questionSet1-" style="color:#273746;border-bottom: 3px solid dodgerblue;">V. Accuracy And Quality </h2>
    <br><br>
    <li>
    <label>19) Accuracy - The supporting evidence ( literature referenced ) is appopriately cited : </label><br>
		<input id="yes" type="radio" name="question19" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question19" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question19_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>20) Accuracy - Tables and figures are of clear and satisfactory quality : </label><br>
		<input id="yes" type="radio" name="question20" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question20" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question20_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>21) Accuracy - There are no math or text errors in tables or figures : </label><br>
		<input id="yes" type="radio" name="question21" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question21" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question21_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>22) Accuracy - Legends and titles of tables and figures are clearly given : </label><br>
		<input id="yes" type="radio" name="question22" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question22" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question22_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
    <label>23) Accuracy - The paper is free from grammatical or spelling errors : </label><br>
	<input id="yes" type="radio" name="question23" value="Yes" style="margin-left:20px;" required> Yes
      <br><br>
			<input id="no" type="radio"  name="question23" value="No" style="margin-left:20px;" required> No
    </li>       
    <br><br>
    <li>
        <label>(If 'no', Please give reasons) : </label>
        <textarea name="question23_no" id="field5" class="field-long field-textarea"></textarea>
    </li>
    
    <br>
    <li>
        <label>24) Quality of the paper : </label>
        <select name="question24" class="field-select">
          <option value=""></option>
          <option value="Excellent">Excellent</option>
          <option value="Good">Good</option>
          <option value="Average">Average</option>
          <option value="Fair">Fair</option>
          <option value="Poor">Poor</option>
        </select>
    </li>
    <br><br>
    <h2 id="questionSet1-" style="color:#273746;border-bottom: 3px solid dodgerblue;">VI. Recommendations</h2>
    <br><br>
    <li>
        <label>25) Recommendation : </label>
          <select name="question25" class="field-select">
          <option value=""> </option>
          <option value="Yes - no changes">Yes - no changes</option>
          <option value="Yes - with minor revisions">Yes - with minor revisions</option>
          <option value="Yes - with major revisions">Yes - with major revisions</option>
          <option value="No">No</option>

        </select>
    </li>
    <br>
    <li>
        <label>26) Overall Recommendation :</label>
        <textarea name="question26" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <li>
        <label>27) Comments to author :</label>
        <textarea name="question27" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <br>
    <br><br>
   
    <br><br><br>
    <center>
    <li>
        <input name="submit_btn" type="submit" value="Submit" />
        <input type="submit" style="margin-left:60px;background-color:grey;" value="Cancel" onclick="javascript:window.location='addreview.php'">
        <!-- <button type="cancel" style="margin-left:60px;background-color:grey;" onclick="javascript:window.location='addreview.php'">Cancel</button> -->

    </li>
    </center>
    
</ul>
</form>

<?php
			if(isset($_POST['submit_btn']))
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
					
        $query="insert into review_form values(NULL,'$rEmail',$RPaperId,'$question1','$question2',	'$question3',
          '$question4',	'$question5','$question5_no',	'$question6','$question6_no','$question7',
          '$question7_no','$question8','$question8_no','$question9','$question9_no',
          '$question10','$question10_no','$question11','$question11_no'	,'$question12','$question12_no',
          '$question13','$question13_no',
          '$question14','$question14_no','$question15',
          '$question15_no','$question16','$question16_no','$question17','$question17_no',
          '$question18','$question18_no','$question19',
          '$question19_no','$question20'	,'$question20_no','$question21','$question21_no','$question22',
          '$question22_no','$question23','$question23_no',
          '$question24','$question25','$question26','$question27')";
        $query_run = mysqli_query($con,$query);

        
						
				if($query_run)
					{ 
            $query2 = "update reviewerandpaper set isReviewed=1 where (reviewerEmail='$rEmail') and (paperId=$RPaperId)";
            $query_run2 = mysqli_query($con,$query2);

            if($query_run2){
              echo '<script type="text/javascript"> 
                    if (window.confirm("Your review is submitted.")) 
                    {
                    window.location.href="paperlist.php";
                    };
                  </script>';
            }
            else{
              echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
            }
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

<script>
  var questionSet1 = 0;
  document.getElementById("questionSet1").addEventListener("click",function(){
    if(questionSet1==0){
      document.getElementById("questionSet1Con").className = "qSetShow";
      questionSet1 = 1;
    }
    else{
      document.getElementById("questionSet1Con").className = "qSetHide";
      questionSet1 = 0;
    }
  })
</script>
</body>
</html>
