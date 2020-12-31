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
  <meta charset="utf-8" />

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<link rel="stylesheet" href="../../css/nav_footer_styles.css">
  <title>View Reviewer Review</title>

  <style>
    .dlStyle{
      margin:10px auto;
	    max-width: 1600px;
	    padding: 20px 12px 10px 20px;
	    font: 15px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
      font-weight: bold;
    }
    .dlStyle dd{
      margin-left:40px;
      margin-top:20px;
      margin-bottom: 20px;
      font-weight: normal;
    }

    .dlStyle .required{
	    color:red;
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
        <li><a href="assignReviewersToRPaper.php">Back to Reviewer List</a></li>
        <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
      </ul>
</nav>
<br>
<h2 style="color:#2E4053 ;margin-left:20px;">View Reviewer Review</h2>
<br>
<h4 style="color:#2E4053 ;margin-left:20px;">Paper Title<span style=margin-left:40px;>: &nbsp;&nbsp;
  <?php 
        $f_title = $_SESSION['rPaperTitle'];
        echo "$f_title";
  ?>
</span></h4>
<br>

<?php
  $rEmail = $_SESSION['showReviewREmail'];
  $RPaperId = $_SESSION['rPaper_id'];

  $queryResult = mysqli_query($con,"select * from review_form where (emailreviewer = '$rEmail') and (rPaperId = $RPaperId);");

  $row = mysqli_fetch_assoc($queryResult)
?>

<dl class="dlStyle">
  <dt>
    1) While performing my duties as a reviewer(including writing reviewes and partcipating in discussion), I have
    and will continue to abide by the xxxx code of conduct <span class="required">*</span ><span style="color:dodgerblue;">
    (visible to other reviewer)</span>
  </dt>
  <dd>
    <?= $row['question1'] ?>
  </dd>

  <dt>
    2) Have you seen this submission online (e.g.arXiv, personal website, social media ) ?
    <span class="required">*</span><span style="color:dodgerblue;">(visible to other reviewer)</span>
  </dt>
  <dd>
    <?= $row['question2'] ?>
  </dd>

  <dt>
    3) Have you previously reviewed or area chaired ( a version of ) this work for another archival venue ?
  </dt> 
  <dd>
    <?= $row['question3'] ?>
  </dd>

  <dt>
    4) Reviewer's level of confidence (alignment with your domain of expertise) :
  </dt> 
  <dd>
    <?= $row['question4'] ?>
  </dd>

  <dt>
    5) Relevance :
  </dt>
  <dd>
    <?= $row['question5'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question5_no'] ?>
  </dd>

  <dt>
    6) Novelty or Originality - The paper reflects current information on this topic :
  </dt>
  <dd>
    <?= $row['question6'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question6_no'] ?>
  </dd>

  <dt>
    7) The title is clear and informative :
  </dt>
  <dd>
    <?= $row['question7'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question7_no'] ?>
  </dd>

  <dt>
    8) The title reflects the content and purpose of the paper :
  </dt>
  <dd>
    <?= $row['question8'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question8_no'] ?>
  </dd>

  <dt>
    9) Abstract :      
  </dt>
  <dd>
    <?= $row['question9'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question9_no'] ?>
  </dd>

  <dt>
    10) Keywords :
  </dt>
  <dd>
    <?= $row['question10'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question10_no'] ?>
  </dd>

  <dt>
    11) Content - Introduction :
  </dt>
  <dd>
    <?= $row['question11'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question11_no'] ?>
  </dd>

  <dt>
    12) Content - Background / Literature Study - The most current references on this topic have been included :
  </dt>
  <dd>
    <?= $row['question12'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question12_no'] ?>
  </dd>

  <dt>
    13) Content - Background / Literature Study - The most relevant references on this topic have been included :
  </dt>
  <dd>
    <?= $row['question13'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question13_no'] ?>
  </dd>

  <dt>
    14) Content - Methodology :
  </dt>
  <dd>
    <?= $row['question14'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question14_no'] ?>
  </dd>

  <dt>
    15) Clarity - There are no any contradictions or inconsistencies:
  </dt>
  <dd>
    <?= $row['question15'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question15_no'] ?>
  </dd>

  <dt>
    16) Clarity - The paper stays focused :
  </dt>
  <dd>
    <?= $row['question16'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question16_no'] ?>
  </dd>

  <dt>
    17) Organization - Ideas are developed and related in a logic sequence :
  </dt>
  <dd>
    <?= $row['question17'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question17_no'] ?>
  </dd>

  <dt>
    18) Organization - Transitions between discussion are smooth and easy to follow :
  </dt>
  <dd>
    <?= $row['question18'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question18_no'] ?>
  </dd>

  <dt>
    19) Accuracy - The supporting evidence ( literature referenced ) is appopriately cited :
  </dt>
  <dd>
    <?= $row['question19'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question19_no'] ?>
  </dd>

  <dt>
    20) Accuracy - Tables and figures are of clear and satisfactory quality :
  </dt>
  <dd>
    <?= $row['question20'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question20_no'] ?>
  </dd>

  <dt>
    21) Accuracy - There are no math or text errors in tables or figures :
  </dt>
  <dd>
    <?= $row['question21'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question21_no'] ?>
  </dd>

  <dt>
    22) Accuracy - Legends and titles of tables and figures are clearly given :
  </dt>
  <dd>
    <?= $row['question22'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question22_no'] ?>
  </dd>

  <dt>
    23) Accuracy - The paper is free from grammatical or spelling errors : 
  </dt>
  <dd>
    <?= $row['question23'] ?>
  </dd>

  <dt>
    (If 'no', Please give reasons) :
  </dt>
  <dd>
    <?= $row['question23_no'] ?>
  </dd>

  <dt>
    24) Quality of the paper :
  </dt>
  <dd>
    <?= $row['question24'] ?>
  </dd>

  <dt>
    25) Recommendation :
  </dt>
  <dd>
    <?= $row['question25'] ?>
  </dd>

  <dt>
    26) Overall Recommendation :
  </dt>
  <dd>
    <?= $row['question26'] ?>
  </dd>

  <dt>
    27) Comments to author :
  </dt>
  <dd>
    <?= $row['question27'] ?>
  </dd>
</dl>


<!-- Footer section -->
        <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>
</html>
