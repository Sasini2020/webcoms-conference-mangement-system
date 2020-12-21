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

    <title>Reviewer Registration</title>
	
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style>
	/* The message box is shown when the user clicks on the password field */
		#message {
		display:none;
		background: #f1f1f1;
		color: #000;
		position: relative;
		padding: 20px;
		margin-top: 10px;
		
		}

		#message p {
		padding: 10px 35px;
		font-size: 18px;
		}

		/* Add a green text color and a checkmark when the requirements are right */
		.valid {
		color: green;
		}

		.valid:before {
		position: relative;
		left: -35px;
		content: "✔";
		}

		/* Add a red text color and an "x" when the requirements are wrong */
		.invalid {
		color: red;
		}

		.invalid:before {
		position: relative;
		left: -35px;
		content: "✖";
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
      <li><a href="create_conference.php">Request a Conf</a></li>
      <!--<li><a href="viewConferencesForCC.php">View Conf</a></li>-->
      <li><a href="addnotemplates.php">Add notifi templates</a></li>
      <li><a href="upudetauls.php">Upload User Details</a></li>
	  <li><a class="active" href="registerUsers.php">Register Users</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>
  <br><br>

	<!--Conference Chair Registration form-->
	<div id="main-wrapper">
		<!-- <center>
			<h2>Conference Chair Registration Form</br><br><br></h2>	
		</center> -->
	
		<form action="registerUsers.php" method="post">
		<br><br>
			<h1>User Registration</h1>
			<fieldset>
      		<legend><span class="number">1</span>Personal Information</legend><br>

			  <label for="actor">Select User Type:</label><br>
				<select id="actor" class="" name="usertype">
  					<option value="">- Select User Type -</option>
					<option value="Reviewer">Reviewer</option>
					<option value="TrackChair">Track Chair</option>
					<option value="PublicationChair">Publication Chair</option>
				</select><br>
		
			  <label for="aTitle">Title:</label><br>
					<select name="acTitle" id="aTitle">
						<option value="Mr">Mr.</option>
						<option value="Ms">Ms.</option>
						<option value="Mrs">Mrs.</option>
						<option value="Miss">Miss.</option>
						<option value="Prof">Prof.</option>
						<option value="Dr">Dr.</option>
					</select>
      
      <label for="fname">Full Name:</label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<!--<label>Gender:</label><br>
			<input id="Gmale" type="radio" name="gender" value="male" checked required><label for="Gmale" class="light">Male</label><br><br>
			<input id="GFemale" type="radio"  name="gender" value="female" required><label for="GFemale" class="light">Female</label>
			<br><br>
			-->

      <label for="aOrganization">Organization:</label><br>
			<input id="aOrganization" name="Organization" type="text" class="inputvalues" placeholder="Type your Organization" /><br>

			<label for="country">Country:</label><br>
				<select id="country" class="" name="country">
                <option value="">- Select Your Country -</option>
				        <option value="Afghanistan">Afghanistan</option>
                <option value="Aland Islands">Åland Islands</option>
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
			
			<!-- Used input type as tel -->
			<label for="ContactDetails">Contact No:</label><br>
			<input id="ContactDetails"  name="ContactDetails" type="tel" class="inputvalues" pattern="[0-9]{1}[0-9]{9}" placeholder="Type your Contact Number" title="Phone number with 0-9 and remaing 9 digit with 0-9"required/>
      
      <!--<br><br>
			<label for="ContactLinks">Contact Links:</label><br>
			<input id="ContactLinks" name="ContactLinks" type="url" pattern="https://.*" size="50"class="inputvalues" placeholder="Enter an https:// URL" title="Enter an https:// URL" required/>-->
      <br>
		</fieldset>
		<fieldset>
      	<legend><span class="number">2</span>Your Login Information</legend><br>
			<label for="Email">Email:</label><br>
			<!-- Validate uni emails as well -->
			<input id='email' name="email" type="text" class="inputvalues" placeholder="Type your email"   required/><br>

			<label for="passW">Password:</label><br>
			<input id="passW" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"class="inputvalues" placeholder="Your password" required/><br>
              <!-- Validations passwod -->
				<div id="message">
				<h3>Password must contain the following:</h3>
				<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
				<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
				<p id="number" class="invalid">A <b>number</b></p>
				<p id="length" class="invalid">Minimum <b>8 characters</b></p>
				</div>
			<label for="CpassW">Confirm Password:</label><br>
			<input id="CpassW" name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
		</fieldset>
	
			<button name="submit_btn" type="submit" id='btnValidate' value="Sign Up" >Register</button><br>
			<!--<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>-->
		</form>



		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
				$usertype = $_POST['usertype'];;
				$aTitle = $_POST['acTitle'];
				$fullname =$_POST['fullname'];
				$aCountry = $_POST['country'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				//$gender = $_POST['gender'];				
				$Organization = $_POST['Organization'];
				$ContactDetails = $_POST['ContactDetails'];
				//$ContactLinks = $_POST['ContactLinks'];

				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$fullname.' ---'.$username.' --- '.$password.' --- '.$gender.' --- '.$qualification.'"  ) </script>';

				if($password==$cpassword)
				{
					$encrypted_pass = md5($password);	//password encrypted

					$query= "select * from userinfotable WHERE email='$email'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
            // there is already a user with the same email
            $checkDublicate = 0;
            //avoid same password duplication in same user
            while($row = mysqli_fetch_assoc($query_run)){
              if($encrypted_pass==$row['password']){
                $checkDublicate = 1;
              }
            }
            if($checkDublicate == 1){
              echo '<script type="text/javascript"> 
									alert("You entered password is can not use with this user email. please use another password"); 
								</script>';
            }
						elseif($usertype=="Reviewer"){
							$query= "select * from reviewer WHERE emailreviewer='$email'";
							$query_run = mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0){
								echo '<script type="text/javascript"> 
									alert("This user allready registred as Reviewer in the system therefor you can add this user to conference."); 
								</script>';
							}
							else{
								$query= "insert into userinfotable (email, title, full_name, country, user_type, password, organization, contactdetails) 
						    values('$email', '$aTitle', '$fullname', '$aCountry', '$usertype', '$encrypted_pass', '$Organization','$ContactDetails')";
                $query_run = mysqli_query($con,$query);
                
                $query2= "insert into reviewer 
                values('$email', '$aTitle','$fullname', '$aCountry', '$Organization', '$ContactDetails', '$encrypted_pass', '$email')";
                $query_run2 = mysqli_query($con,$query2);

                if($query_run and $query_run2)
                {
                  echo '<script type="text/javascript"> 
                     alert("Registration Successfully.");
                  </script>';
                }
                else
                {
                  echo  '<script type="text/javascript">alert("'.mysqli_error($con).'")</script>';
                }
							}
            }
            elseif($usertype=="TrackChair"){
              $query= "select * from trackchair WHERE emailtrackchair='$email'";
              $query_run = mysqli_query($con,$query);
              if(mysqli_num_rows($query_run)>0){
								echo '<script type="text/javascript"> 
									alert("This user allready registred as TrackChair in the system therefor you can add this user to conference."); 
								</script>';
              }
              else{
                $query= "insert into userinfotable (email, title, full_name, country, user_type, password, organization, contactdetails) 
						    values('$email', '$aTitle', '$fullname', '$aCountry', '$usertype', '$encrypted_pass', '$Organization','$ContactDetails')";
                $query_run = mysqli_query($con,$query);

                $query2= "insert into trackchair 
									values('$email', '$aTitle','$fullname', '$aCountry', '$Organization', '$ContactDetails', '$encrypted_pass', '$email')";
                $query_run2 = mysqli_query($con,$query2);
                
                if($query_run and $query_run2)
                {
                  echo '<script type="text/javascript"> 
                    alert("Registration Successfully.");
                  </script>';
                }
                else
                {
                  echo '<script type="text/javascript">alert("'.mysqli_error($con).'")</script>';
                }
              }
            }
            elseif($usertype=="PublicationChair"){
              $query= "select * from publicationchair WHERE emailpubchair='$email'";
              $query_run = mysqli_query($con,$query);
              if(mysqli_num_rows($query_run)>0){
								echo '<script type="text/javascript"> 
									alert("This user allready registred as Publication Chair in the system therefor you can add this user to conference."); 
								</script>';
              }
              else{
                $query= "insert into userinfotable (email, title, full_name, country, user_type, password, organization, contactdetails) 
						    values('$email', '$aTitle', '$fullname', '$aCountry', '$usertype', '$encrypted_pass', '$Organization','$ContactDetails')";
                $query_run = mysqli_query($con,$query);
                $query2= "insert into publicationchair 
                values('$email', '$aTitle','$fullname', '$aCountry', '$Organization', '$ContactDetails', '$encrypted_pass', '$email')";
                $query_run2 = mysqli_query($con,$query2);

                if($query_run and $query_run2)
                {
                  echo '<script type="text/javascript"> 
                    alert("Registration Successfully.");
                  </script>';
                }
                else
                {
                  echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
                }
              }
            }
            
					}
					else
					{
						$query= "insert into userinfotable (email, title, full_name, country, user_type, password, organization, contactdetails) 
						values('$email', '$aTitle', '$fullname', '$aCountry', '$usertype', '$encrypted_pass', '$Organization','$ContactDetails')";
						$query_run = mysqli_query($con,$query);

						switch($usertype){
							case "Reviewer":
								$query2= "insert into reviewer 
									values('$email', '$aTitle','$fullname', '$aCountry', '$Organization', '$ContactDetails', '$encrypted_pass', '$email')";
								$query_run2 = mysqli_query($con,$query2);
								break;
							case "TrackChair":
								$query2= "insert into trackchair 
									values('$email', '$aTitle','$fullname', '$aCountry', '$Organization', '$ContactDetails', '$encrypted_pass', '$email')";
								$query_run2 = mysqli_query($con,$query2);
								break;
							case "PublicationChair":
								$query2= "insert into publicationchair 
									values('$email', '$aTitle','$fullname', '$aCountry', '$Organization', '$ContactDetails', '$encrypted_pass', '$email')";
								$query_run2 = mysqli_query($con,$query2);
								break;
							default:
								$query_run2 = false;
						}

						
						if($query_run and $query_run2)
						{
							echo '<script type="text/javascript"> 
								alert("Registration Successfully.");
							</script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}
				
				
				
				
			}
		?>
	</div>

	
				
<script>
var myInput = document.getElementById("passW");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>


<!-- Footer section -->
<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>

</html>
