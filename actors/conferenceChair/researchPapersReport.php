<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '4'){
    header('location:../../login.php');
  }
?>
<!DOCTYPE html>
<head>

    <title>Research Papers Report</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/sty.css">
  <link rel="stylesheet" href="../../css/new_table_and_button.css">
</head>

<style>
#heading1{
    text-align:center;
    margin-top:30px;
    font-size:25px;
    color:black;
    text-decoration: underline;
}

#conNameH{
  margin-left:30px;
  margin-top:20px;
  font-size:22px;
}
#conuntRP{
  margin-left:60px;
  margin-top:30px;
}
#conuntRP td{
  padding:20px;
}
</style>
	

<body>


	<nav>
	
	  <div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
	
		<ul>
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
			<li><a href="conferencechairhomepage.php">Back</a></li>
		</ul>

	</nav>


    <?php
      $c_id = $_SESSION['c_id'];
      $c_name = $_SESSION['c_name']; 

      $sql = "select acceptancy from researchpaper where conferenceId = $c_id";
      $result = mysqli_query($con,$sql);
      
      $pendingC = 0;
      $acceptC = 0;
      $rejectC = 0;

      while($row = mysqli_fetch_assoc($result)){
        if($row['acceptancy'] == 0){
          $pendingC++;
        }
        else if($row['acceptancy'] == 1){
          $acceptC++;
        }
        else if($row['acceptancy'] == 2){
          $rejectC++;
        }
      }
    ?>

    
    <h2 id="conNameH">Conference Name -: <?= $c_name ?></h2> 

    <h2 id="heading1">Research papers status</h2>

    <div id="conuntRP">
      <table>
        <tr>
          <td>
            <p>Pending Research Papers Count -: </p> 
          </td>
          <td>
            <?= $pendingC ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>Accepted Research Papers Count -: </p> 
          </td>
          <td>
            <?= $acceptC ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>Rejected Research Papers Count -: </p>
          </td>
          <td> 
            <?= $rejectC ?>
          </td>
        </tr>
      <table>
    </div>

    <div id="piechart" align="center"></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Research papers status'],
  ['Pending', <?= $pendingC ?>],
  ['Accepted', <?= $acceptC ?>],
  ['Rejected', <?= $rejectC ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'width':850, 'height':700};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
    
    
    
    
    <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>


</body>
</html>