<!DocType html>
<html lang="en">
	<head>
		<title>In & Out Moving</title>
		<meta charset=utf-8>
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
		<meta name="description" content="In and Out Moving Company in Toronto" />
	    <meta name="keywords" content="moving, apartment, condo, office, house, company, toronto"/>

	    <!---->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="apple-touch-icon" href="apple-touch-icon-iphone.png">
	    <link rel="apple-touch-icon" href="apple-touch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">
		<link rel="apple-touch-startup-image" href="/startup-image.png">
		<meta name="apple-mobile-web-app-title" content="In and Out">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<!--font-->
		<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css' >
		<link href='http://fonts.googleapis.com/css?family=verdana' rel='stylesheet' type='text/css' >
		<link href='http://fonts.googleapis.com/css?family=Terminal+Dosis+Light' rel='stylesheet' type='text/css'>
	    
	<!--css-->
		<link href="css/style.css" rel="stylesheet" type="text/css"/><!--Main-->	
	    <link href="css/demo.css" rel="stylesheet" type="text/css"/>
		<link href="css/component.css" rel="stylesheet" type="text/css"/><!--Main Menu-->
		<link href="css/base/jquery.ui.all.css" rel="stylesheet" type="text/css"/><!--Date Picker-->

	<!--script-->
		<script src="js/jquery-1.9.1.js"></script><!--Library-->
		<script src="js/ui/jquery.ui.core.js"></script><!--Library-->
		<script src="js/ui/jquery.ui.datepicker.js"></script><!--Library-->
		<!--Date Picker-->
		<script>
			$(function() {
				$( ".datepicker" ).datepicker();
			});
		</script>
		<script>
			$(document).ready(function() {
			    $('#include_menu').load('header.html');
			});
			$(document).ready(function() {
			    $('#include_footer').load('footer.html');
			});
			$(document).ready(function() {
			    $('#include_above_footer').load('above_footer.html');
			});
		</script>
		<!--GPS-->	
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC3iFuplIPFhd6rhjB620pK7Ywuu5wysQI&sensor=true"></script>
		<script src="js/google-map/custom-gps-map.js"></script>
	</head>
	<body>
		<!--top menu-->
		<!--<div id="include_menu" ></div>-->
		<a href="tel:01234567890">Call Us</a>
		<a href="sms:01234567890">Send SMS</a>
		<a href="http://www.youtube.com/watch?v=VIDEO_ID">Play Video</a>
		<div class="container">
			<div class="column-1_3">
				<div class="Booking_step">
					<div style="float:left; margin:9px;">
						<img src="images/background/in_and_out_quick_quote.png" alt="" width=42 height=42/>
					</div>
					<span style="color: #fb0197;">
						<span style="font-size: 50px;">Quickie Quote<br /></span>
					</span>
					<div>
						<h3 class="Booking" style="padding:15px; font-size:150%;">Welcome to In & Out Moving.</h3>
						<p>Please Fill in this form. &nbsp;(<span class="required">*</span> ) is required.</p>
					</div>
					<?php
					$fnameErr ="";
					$lnameErr ="";
					$emailErr ="";
					$phoneErr = "";
					$dateErr = "";
					$timeErr = "";
					$errMsg = "";
					$temp_fname = $_POST['c_fname'];
					$temp_lname = $_POST['c_lname'];
					$temp_email = $_POST['c_email'];
					$temp_phone = $_POST['C_phone'];
					$temp_date = $_POST['c_date'];
					$temp_time = $_POST['c_time'];

					$charOnly = "/^[a-z]+[a-z]$/i";
					$reg_email = "/^[^0-9~!@#$%^&*()_+=?.,][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,3}$/i";
					$reg_phone = "/^(\d{3}+\d{3}+\d{4}|\d{3}\d{3}+[\s]{1}+\d{4}|\d{3}+[\s]{1}+\d{3}+[\s]{1}+\d{4}||\d{3}+[-]{1}+\d{3}+[-]{1}+\d{4}|\d{3}+[\s]{1}+\d{7}|\(\d{3}\)\s{1}\d{3}[\s-]{1}\d{4})$/";/*"/^(\d{3}|[(]\d{3}[)]|\d{3}[)])[ -]*\d{3}[ -]*\d{4}$/";*/

					$dataValid = true;
					$area = "";
					$local3 = "";
					$local4 = "";
					$phone = $area .''. $local3 .''. $local4;
					$phoneValid = true;
					// If submit with POST
					if ($_POST) { 
						$errMsg = "Debugging";
						$area = $_POST['c_area'];
						$local3 = $_POST['c_local3'];
						$local4 = $_POST['c_local4'];
						
					     // Test for nothing entered in field
						if ($_POST['c_fname'] == "") {
							$fnameErr = "Please enter your first name.";
							$dataValid = false;
						}
						else {	
							if ( preg_match($charOnly, $_POST['c_fname']) ) 
							{
								$fnameErr = "";
							} else {
								$fnameErr = "This is an invalid name.";
								$dataValid = false;
							}
						}
						if ($_POST['c_lname'] == "") {
							$lnameErr = "Please enter your last name.";
							$dataValid = false;
						}
						else {	
							if ( preg_match($charOnly, $_POST['c_lname']) ) 
							{
								$lnameErr = "";
							} else {
								$lnameErr = "This is an invalid name.";
								$dataValid = false;
							}
						}
						if ($_POST['c_email'] == "") {
							$emailErr = "Please enter E-mail address.";
							$dataValid = false;		
						}
						else {	
							if ( preg_match($reg_email, $_POST['c_email']) ) 
							{
								$emailMsg = "";
							} else {
								$emailMsg = "E-mail is not Valid.";
								$dataValid = false;
							}
						}
						if ($_POST['c_area'] == "") {
							$phoneErr = "Please enter phone number.";
							$dataValid = false;	
							$phoneValid = false;	
						}
						if ($_POST['c_local3'] == "") {
							$phoneErr = "Please enter phone number.";
							$dataValid = false;		
							$phoneValid = false;	
						}
						if ($_POST['c_local4'] == "") {
							$phoneErr = "Please enter phone number.";
							$dataValid = false;		
							$phoneValid = false;	
						}
						if( $phoneValid ) {
							$phone = $area . "" . $local3 . "" .$local4;		
							if ( preg_match($reg_phone, $phone) ) {
								$phoneErr = "";
							} else {
								$phoneErr = "Phone number is not Valid.";
								$dataValid = false;
							}
						} else {
							$area = "";
							$local3 = "";
							$local4 = "";
							$phone = "";

						}
						if ($_POST['c_date'] == "") {
							$dateErr = "Please choose a date.";
							$dataValid = false;		
						}
						if ($_POST['c_time'] == "" || $_POST['c_time'] == "Morning" || $_POST['c_time'] == "Afternoon") {
							$timeErr = "Please choose a time.";
							$dataValid = false;
						} else {
							if ("07:00" == $_POST['c_time']){
								$Checked0700 = 'selected';
							}  
							else if ("07:30" == $_POST['c_time']){
								$Checked0730 = 'selected';
							}  
							else if ("08:00" == $_POST['c_time']){
								$Checked0800 = 'selected';
							} 
							else if ("08:30" == $_POST['c_time']){
								$Checked0830 = 'selected';
							} 
							else if ("09:00" == $_POST['c_time']){
								$Checked0900 = 'selected';
							}
							else if ("09:30" == $_POST['c_time']){
								$Checked0930 = 'selected';
							} 
							else if ("10:00" == $_POST['c_time']){
								$Checked1000 = 'selected';
							} 
							else if ("10:30" == $_POST['c_time']){
								$Checked1030 = 'selected';
							} 
							else if ("11:00" == $_POST['c_time']){
								$Checked1100 = 'selected';
							} 
							else if ("11:30" == $_POST['c_time']){
								$Checked1130 = 'selected';
							} 
							else if ("12:00" == $_POST['c_time']){
								$Checked1200 = 'selected';
							} 
							else if ("12:30" == $_POST['c_time']){
								$Checked1230 = 'selected';
							} 
							else if ("13:00" == $_POST['c_time']){
								$Checked1300 = 'selected';
							} 
							else if ("13:30" == $_POST['c_time']){
								$Checked1330 = 'selected';
							} 
							else if ("14:00" == $_POST['c_time']){
								$Checked1400 = 'selected';
							} 
							else if ("14:30" == $_POST['c_time']){
								$Checked1430 = 'selected';
							} 
							else if ("15:00" == $_POST['c_time']){
								$Checked1530 = 'selected';
							} 
							else if ("15:30" == $_POST['c_time']){
								$Checked1530 = 'selected';
							} 
							else if ("16:00" == $_POST['c_time']){
								$Checked1600 = 'selected';
							} 
							else if ("16:30" == $_POST['c_time']){
								$Checked1630 = 'selected';
							} 
							else if ("17:00" == $_POST['c_time']){
								$Checked1700 = 'selected';
							} 
							else if ("after" == $_POST['c_time']){
								$Checkedafter = 'selected';
							} 
						}
					}
					// If the submit button was pressed and something was entered in both fields, process data
					// (we just print a mesg)
					if ($_POST && $dataValid) { 

						session_start();
						$_SESSION['token1'] = "ok";
						$_SESSION['fname'] = $_POST['c_fname'];
						$_SESSION['lname'] = $_POST['c_lname'];
						$_SESSION['email'] = $_POST['c_email'];
						$_SESSION['phone'] = $phone;
						$_SESSION['date'] = $_POST['c_date'];
						$_SESSION['time'] = $_POST['c_time'];

						/*include 'query.php';
						store_booking($temp_fname, $temp_lname, $temp_email, $temp_phone, $temp_date, $temp_time,
						              $temp_pickhome, $temp_pickrooms, $temp_paddress, $temp_punit, $temp_pcity, $temp_ppostal, $temp_pelevator, $temp_pparking,
						              $temp_drophome, $temp_droprooms, $temp_daddress, $temp_dunit, $temp_dcity, $temp_ppostal, $temp_delevator, $temp_dparking,
						              $temp_desc);
						header('Location:innout-summary.php');*/
						header('Location:innout-booking-step2.php');
						exit();
					?>

					<?php
					// If no submit or data is invalid, print form, repopulating fields and printing Msg mesgs
					} else { 
					?>
					<form id="c_quote" name="c_quote" method = "post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'	onreset="" onsubmit="">
						<div class="page_open_booking" id="body-section1"><h2>Contact Details</h2><span></span></div>
						<div class="container1">
							<div class="content1">
								<div><!--Name (required)-->
									<label><span class="required">*</span>First Name :</label>		
									<input type="text" id="c_fname" name="c_fname" value="<?php if (isset($_POST['c_fname'])) echo $_POST['c_fname']; else echo ""; ?>" <?php if (isset($_POST['c_fname'])) echo ""; else echo "autofocus"; ?> />						
									<span class="green-font"><?php echo $fnameErr; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--Name (required)-->									
									<label><span class="required">*</span>Last Name :</label>
									<input type="text" id="c_lname" name="c_lname" value="<?php if (isset($_POST['c_lname'])) echo $_POST['c_lname']; else echo ""; ?>" <?php if (isset($_POST['c_lname'])) echo ""; else echo "autofocus"; ?> />
									<span class="green-font"><?php echo $lnameErr; ?></span>
								</div>								
								<div><p>&nbsp;</p></div>
								<div><!--email (optional)-->
									<label><span class="required">*</span>E-mail :</label>
									<input type="email" id="c_email" name="c_email" value="<?php if (isset($_POST['c_email'])) echo $_POST['c_email']; ?>" <?php if (isset($_POST['c_email'])) echo ""; else echo "autofocus"; ?> />
									<span class="green-font"><?php echo $emailErr; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--phone Number (required)-->
									<label><span class="required"></span>&nbsp;</label>
									<span style="color:#aaa; margin-left:17px">Area</span> 
									<span style="width:27px;"></span> 
									<span style="color:#aaa; margin-left:15px">Local</span> 
								</div>
								<div><!--phone Number (required)-->
									<label><span class="required"></span>&nbsp;</label>
									<span style="color:#aaa; margin-left:17px">Code</span> 
									<span style="width:27px;"></span> 
									<span style="color:#aaa; margin-left:11px">Number</span> 
								</div>
								<div><!--phone Number (required)-->
									<label><span class="required">*</span>Phone :</label>								
									<input style="width: 30px;" type="text" maxlength="3" name="c_area" value="<?php if (isset($_POST['c_area'])) echo $_POST['c_area']; else echo""; ?>" <?php if (isset($_POST['c_fname'])) echo ""; else echo "autofocus"; ?> />
									<input style="width: 30px; margin-left: 15px;" type="text" maxlength="3" name="c_local3" value="<?php if (isset($_POST['c_local3'])) echo $_POST['c_local3']; else echo""; ?>" <?php if (isset($_POST['c_fname'])) echo ""; else echo "autofocus"; ?> />
									<input style="width: 35px; margin-left: 10px;:;" type="text" maxlength="4" name="c_local4" value="<?php if (isset($_POST['c_local4'])) echo $_POST['c_local4']; else echo""; ?>" <?php if (isset($_POST['c_fname'])) echo ""; else echo "autofocus"; ?> />								
									<script type="text/javascript">
										$('input').bind('keyup',function(event){
											var maxlen = $(this).attr('maxlength');
											if($(this).val().length >= parseInt(maxlen))
											{
												var next = $(this).next();
												if(next){
													
													next.focus();
												}
											}
										});
								    </script>
								    <span class="green-font"><?php echo $phoneErr; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--date (required)-->
									<label><span class="required">*</span>Date :</label>
									<input type="text" name="c_date" class="datepicker" value="<?php if (isset($_POST['c_date'])) echo $_POST['c_date']; ?>" <?php if (isset($_POST['c_fname'])) echo ""; else echo "autofocus"; ?> />
									<span class="green-font"><?php echo $dateErr; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--date (required)-->
									<label><span class="required">*</span>Time :</label>
									<select id="c_time" name="c_time" <?php if (isset($_POST['c_fname'])) echo ""; else echo "autofocus"; ?> />
										<option >Morning</option>
										<option value="07:00" <?php echo $Checked0700;?>>07:00</option>
										<option value="07:30" <?php echo $Checked0730;?>>07:30</option>
										<option value="08:00" <?php echo $Checked0800;?>>08:00</option>
										<option value="08:30" <?php echo $Checked0830;?>>08:30</option>
										<option value="09:00" <?php echo $Checked0900;?>>09:00</option>
										<option value="09:30" <?php echo $Checked0930;?>>09:30</option>
										<option value="10:00" <?php echo $Checked1000;?>>10:00</option>
										<option value="10:30" <?php echo $Checked1030;?>>10:30</option>
										<option value="11:00" <?php echo $Checked1100;?>>11:00</option>
										<option value="11:30" <?php echo $Checked1130;?>>11:30</option>
										<option >Afternoon</option>
										<option value="12:00" <?php echo $Checked1200;?>>12:00</option>
										<option value="12:00" <?php echo $Checked1230;?>>12:30</option>
										<option value="13:00" <?php echo $Checked1300;?>>01:00</option>
										<option value="13:30" <?php echo $Checked1330;?>>01:30</option>
										<option value="14:00" <?php echo $Checked1400;?>>02:00</option>
										<option value="14:30" <?php echo $Checked1430;?>>02:30</option>
										<option value="15:30" <?php echo $Checked1500;?>>03:00</option>
										<option value="15:30" <?php echo $Checked1530;?>>03:30</option>
										<option value="16:00" <?php echo $Checked1600;?>>04:00</option>
										<option value="16:30" <?php echo $Checked1630;?>>04:30</option>
										<option value="17:00" <?php echo $Checked1700;?>>05:00</option>
										<option value="after" <?php echo $CheckedAfter;?>>After</option>
									</select>
									<span class="green-font"><?php echo $timeErr; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
							</div>
						</div>
						<!-- end collapsible -->
						
						<!--Buttons-->						
						<div class="button">
							<button type="submit">Continue</button>
							<button type="reset">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		

		<!--Footer-->
		<!--<div id="include_above_footer" ></div>-->
		<!--footer-->
		<div id="include_footer" ></div>
		
		<!-- The JavaScript -->
		<!-- the mousewheel plugin - optional to provide mousewheel support-->
		<script src="js/jquery.mousewheel.js" type="text/javascript"></script> 

		<!--page Collapse-->
		<script src="js/page-collapse/highlight.pack.js" type="text/javascript"></script>
		<script src="js/page-collapse/jquery.cookie.js" type="text/javascript" ></script>
		<script src="js/page-collapse/jquery.collapsible.js" type="text/javascript" ></script>
		<script src="js/page-collapse/custom-collapse.js" type="text/javascript"></script>

<?php
}
?>
	</body>
</html>