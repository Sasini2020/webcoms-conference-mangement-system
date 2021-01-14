<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '4'){
    header('location:../../login.php');
  }

?>
<!DOCTYPE html>
<html>
<head>

  <title>Assign Publication Cahir to Conference</title>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/sty.css">
	<link rel="stylesheet" href="../../css/table_style.css">
  <link rel="stylesheet" href="../../css/new_table_and_button.css">

  <!-- import jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/jquery.dropdown.min.css">
  <script src="../../javascript/jquery.dropdown.min.js"></script>

</head>
<body>
<nav>
   <div class="logo">Web-COMS</div>
   <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
          <i class="fas fa-bars"></i>
      </label>
    <ul>
      <li><a href="conferencechairhomepage.php">Back</a></li>
    </ul>
</nav>

<div id="main-wrapper" style="margin:20px auto;height:500px">
        <center>
			<h2>Assign Publication chairs to Conference</h2>
		</center>
    <br>
        <form action="assignPublicationChairToConference.php" class="myform" method="post" style="height:280px;">
            <fieldset>
                <label for="selectPc"><b>Choose Publication Chairs:</b><br>(Hold Ctrl to select multiple tracks)</label><br>
                
                <!-- Drop down list field -->

                <div class="dropDownWithSearch">
                  <select name="selectedPC[]" id="selectPc" multiple="multiple" style="height: 100px;">
                      <?php
                          $query_result = mysqli_query($con,"select * from publicationchair;");
                          while($row = mysqli_fetch_assoc($query_result)){
                      ?>
                      <option value="<?= $row['emailpubchair'] ?>"><?= $row['emailpubchair'] ?></option>
                      <?php 
                          }
                      ?>
                  </select>
                </div>
                <br>
            <button name="addPubC_btn" id='login_btn' value="addTC" >Add Publication Chair</button><br>
            </fieldset>
            <br>
        </form>
        <?php
            if(isset($_POST['addPubC_btn'])){
                $conId = $_SESSION['c_id'];
                $pubChairEmail = $_POST['selectedPC'];
                $checkDTC = 0;

                foreach($pubChairEmail as $pubCE){
                    $query = mysqli_query($con,"select * from conference_and_publicationchair where (publicationChairEmail='$pubCE') and (conferenceId=$conId)");
                    
                    if(mysqli_num_rows($query)>0){
                        $checkDTC++;
                        
                    }
                }

                if($checkDTC>0){
                    echo '<script type="text/javascript"> alert("You selected some Publication Chair is allready added to this conference...!") </script>';
                }
                else{
                    foreach($pubChairEmail as $pubCE){
                        $query1 = mysqli_query($con,"insert into conference_and_publicationchair values(NULL,'$pubCE',$conId)");
                    }
                    if($query1){
                        echo '<script type="text/javascript"> alert("Publication Chair Adding process is successfully..!") </script>';
                    }
                    else{
                        echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
                    }
                }              
            }
        ?>
    </div>
    <hr>

    <div style="margin:20px 40px;">
      <h2>Assigned Publication Chairs Details</h2>

      <table class="content-table" style="">
        <thead>
          <tr>
            <th>Number</th>
            <th>Publication Chair Email</th>
            <th>Title</th>
            <th>Full Name</th>
            <th>Organaization</th>
            <th>Country</th>
            <th>Contact Number</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $conId = $_SESSION['c_id'];
            $count = 1;
            $query_result = mysqli_query($con,"select pc.emailpubchair as pcEmail, pc.title as title
            ,pc.fullname as fullName
            ,pc.organization as  organization
            ,pc.country as country
            ,pc.contactdetails as coNum
            from conference_and_publicationchair as cpc, publicationchair as pc 
            where (cpc.publicationChairEmail = pc.emailpubchair) and (cpc.conferenceId = $conId)  order by cpc.ID DESC")
            or die(mysqli_error($con));
            while($row = mysqli_fetch_assoc($query_result)){
          ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row['pcEmail'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['fullName'] ?></td>
            <td><?= $row['organization'] ?></td>
            <td><?= $row['country'] ?></td>
            <td><?= $row['coNum'] ?></td>
          </tr>
          <?php
            $count++;}
          ?>
        </tbody>
      </table>
    </div>

    <script type="text/javascript">

    $('.dropDownWithSearch').dropdown({
      // options here
      input:'<input type="text" maxLength="20" style="width:370px" placeholder="Search">',
      searchable:true,
      multipleMode: 'label',
      searchNoData: '<li style="color:#ddd">No Results</li>'
    });

  </script>


<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
</div>
</body>
</html>