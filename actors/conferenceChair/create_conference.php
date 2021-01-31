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
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Request new conference</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">
  <link rel="stylesheet" href="../../css/DropDownListToNav.css">

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- JQuery UI -->
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/hot-sneaks/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  

 <!-- styles for dots in paragraphs -->
 <style>
.dot {
  height: 8px;
  width: 8px;
  background-color: #86B0DD;
  border-radius: 50%;
  margin-bottom:2px;
  margin-left:28px;
  margin-right:5px;
  display: inline-block;
}
</style>
</head>
<body>

	<nav>
  <div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    <ul>
	  <li><a href="conferencechairhomepage.php">Home</a></li>
      <li><a class="active" href="create_conference.php">Request Conference</a></li>
      <!--<li><a href="viewConferencesForCC.php">View Conf</a></li>
      <li><a href="addnotemplates.php">Add notification templates</a></li>
      <li><a href="upudetauls.php">Upload User Details</a></li>-->
      <li><a href="registerUsers.php">User Registration</a></li>
      <li class="dropdown">				
					<a href="#" class="dropdown">Conference Chair <i class="fa fa-caret-down"></i></a>
					
					<div class="dropdown-content">
						<a href="updateprofile.php">Update profile</a>
						<a href="con_change_password.php">Change Password</a>
						<a href="../logout.php">Log Out</a>
					</div>
			</li>

    </ul>
  </nav>

	<br>
	<div id="main-wrapper">
		
		<h2 style="margin-left:25px;color:dodgerblue;">New Conference Request</h2><br>
		<p style="margin-left:25px;margin-bottom:29px;color:#283747;font-weight:400;">In order to have a conference site in Web-COMS, you will need to request one.
		Once you submit the request for your conference, it can take up to 72 hours for the conference site to be created.
		Once the request is approved and the conference site created, you will receive an email with all the information pertaining to your conference. </p>

		<h3 style="margin-left:25px;color:dodgerblue;">Criteria For Submission</h3><br>
		
		<p style="margin-left:25px;margin-bottom:15px;color:#283747;font-weight:500;">
		Before clicking "Submit" to save your request, please make sure that you use the correct information in the correct format for the conference.
		</p>

		<p style="margin-left:25px;color:#283747;font-weight:400;">
		
			<span class="dot"></span>
			Enter the <span style='color: dodgerblue;font-weight:500;'>full title</span> of the conference
			<br>
			<span class="dot"></span>
			<!-- I used span for color words in p tag -->
			Use <span style='color: dodgerblue;font-weight:500;'>mm/dd/yyyy</span> format for dates (Start Date, End Date, Paper Submission Due Date) for site request.
			For example, Feb 1st, 2021 would be 02/01/2021.
		</p>
		<br>

		<h3 style="margin-left:25px;color:dodgerblue;">Request Form</h3>

		<form action="create_conference.php"method="post">
			<br><h1>Request Conference</h1>

			<label><b>Conference Title <span style="color:red;"> * </span></b></label><br>
			<input name="name" type="text" class="inputvalues" placeholder="Type your conference's title" required/><br>
			
			<label><b>City<span style="color:red;"> * </span></b></label><br>
			<input name="venue" type="text" class="inputvalues" placeholder="City" required/><br>
			
			<label><b>Country  <span style="color:red;">*</span></b></label><br>
				<select name="country" class="" name="country">
				<option value=""></option>
				<option value="Afghanistan">Afghanistan</option>
                <option value="Aland Islands">Aland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
				</select><br>
			
			<label><b>Conference Start Date <span style="color:red;">*</span></b></label><br>
			<input name="start_date" required type="text" class="inputvalues" placeholder="dd-M-yy" id="dt1"  required/><br>
			
			<label><b>Conference End Date <span style="color:red;">*</span></b></label><br>
			<input name="end_date" type="text" class="inputvalues" placeholder="dd-M-yy" id="dt2" required/><br>
			
			<label><b>Paper Submission Due Date <span style="color:red;">*</span></b></label><br>
			<input name="deadline" type="text" class="inputvalues" placeholder="dd-M-yy"  id="dt3" required/><br>

      <label><b>Sponsor Details </b></label><br>
			<input name="sponserD" type="text" class="inputvalues" placeholder="Type Sponsers Details"/><br>
		

			<!-- <input name="create_btn" type="submit" id="register_btn" value="CREATE"/><br> -->
			<button name="create_btn" type="submit" id="register_btn" value="CREATE">Submit</button>
			<button type="cancel" class="button" onclick="javascript:window.location='create_conference.php'">Cancel</button>

		</form>
		
  <!-- Datepicker code for Fromdate Todate -->
  <script>
      $(document).ready(function () {

      $("#dt1").datepicker({
          dateFormat: "dd-M-yy",
          minDate: 0,
          onSelect: function () {
              var dt2 = $('#dt2');
              var dt3 = $('#dt3');
              var startDate = $(this).datepicker('getDate');
              var minDate = $(this).datepicker('getDate');
              var dt2Date = dt2.datepicker('getDate');
              //difference in days. 86400 seconds in day, 1000 ms in second
              var dateDiff = (dt2Date - minDate)/(86400 * 1000);
              
              startDate.setDate(startDate.getDate() + 30);
              if (dt2Date == null || dateDiff < 0) {
                  dt2.datepicker('setDate', minDate);
              }
              else if (dateDiff > 30){
                  dt2.datepicker('setDate', startDate);
              }
              //sets dt2 maxDate to the last day of 30 days window
              dt2.datepicker('option', 'maxDate', startDate);
              dt2.datepicker('option', 'minDate', minDate);
          }
      });
      $('#dt2').datepicker({
          dateFormat: "dd-M-yy",
          minDate: 0
      });

      //For dt3
      $('#dt3').datepicker({
          dateFormat: "dd-M-yy",
          minDate: 0
      });

      });
  </script>


		<?php
			if(isset($_POST['create_btn']))
			{				
				$name =$_POST['name'];
				$venue = $_POST['venue'];
				$country = $_POST['country'];
				$start_date = $_POST['start_date'];
				$end_date = $_POST['end_date'];
        $deadline = $_POST['deadline'];
        $sponserD = $_POST['sponserD'];
				$c_Email = $_SESSION['c_email'];			
		
				//$query= "select * from conferences '";
				//$query_run = mysqli_query($con,$query);					
					
				$query= "insert into conferences values(NULL,'$name','$venue','$country','$start_date','$end_date','$deadline','$sponserD','0','$c_Email')";
				$query_run = mysqli_query($con,$query);
						
				if($query_run)
					{
						echo '<script type="text/javascript"> alert("Your conference was created..Admin will inform you more details") </script>';
					}
				else
					{
						echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
					}
			}			
		?>
	</div>
	<!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>

</html>
