
	<?php
	$custnameMsg ="";
	$emailMsg ="";
	$phoneMsg = "";
	$dateMsg = "";
	$timeMsg = "";
	$pick_homeMsg = "";
	$pick_roomsMsg = "";
	$p_addressMsg = "";
	$p_unitMsg = "";
	$p_cityMsg = "";
	$p_postalcodeMsg ="";
	$drop_homeMsg = "";
	$drop_roomsMsg = "";
	$d_addressMsg = "";
	$d_unitMsg = "";
	$d_cityMsg = "";
	$d_postalcodeMsg ="";

	$pick_elevator_y = "";
	$pick_elevator_n = "";
	$pick_parking_y = "";
	$pick_parking_n = "";

	$drop_elevator_y = "";
	$drop_elevator_n = "";
	$drop_parking_y = "";
	$drop_parking_n = "";

	$temp_fname = $_POST['c_fname'];
	$temp_lname = $_POST['c_lname'];
	$temp_email = $_POST['c_email'];
	$temp_phone = $_POST['C_phone'];
	$temp_date = $_POST['c_date'];
	$temp_time = $_POST['c_time'];

	$temp_pickhome = $_POST['pick_home'];
	$temp_pickrooms = $_POST['pick_rooms'];
	$temp_paddress = $_POST['p_address'];
	$temp_punit = $_POST['p_unit'];
	$temp_pcity = $_POST['p_city'];
	$temp_ppostal = $_POST['p_postalcode'];
	$temp_pelevator = $_POST['pick_elevator'];
	$temp_pparking = $_POST['pick_parking'];

	$temp_drophome = $_POST['drop_home'];
	$temp_droprooms = $_POST['drop_rooms'];
	$temp_daddress = $_POST['d_address'];
	$temp_dunit = $_POST['d_unit'];
	$temp_dcity = $_POST['d_city'];
	$temp_dpostal = $_POST['d_postalcode'];
	$temp_delevator = $_POST['drop_elevator'];
	$temp_dparking = $_POST['drop_parking'];

	$temp_desc = $_POST['description'];

	$dataValid = true;

	// If submit with POST
	if ($_POST) { 
	     // Test for nothing entered in field
		if ($_POST['c_fname'] == "") {
			$custnameMsg = "Msgor - you must fill in a first name";
			$dataValid = false;
		}
		if ($_POST['c_lname'] == "") {
			$custnameMsg = "Msgor - you must fill in a last name";
			$dataValid = false;
		}
		/*if ($_POST['c_email'] == "") {
			$emailMsg = "Msgor - you must fill in an e-mail";
			$dataValid = false;		
		}*/
		if ($_POST['c_phone'] == "") {
			$phoneMsg = "Msgor - you must fill in a phone number";
			$dataValid = false;		
		}
		if ($_POST['c_date'] == "") {
			$dateMsg = "Msgor - you must fill in a date of moving";
			$dataValid = false;		
		}
		if ($_POST['c_time'] == "" || $_POST['c_time'] == "Morning" || $_POST['c_time'] == "Afternoon") {
			$timeMsg = "Please fill in this blank.";
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
		if ($_POST['pick_home'] == "" || $_POST['pick_home'] == "Select type of home") {
			$pick_homeMsg = "Please fill in this blank.";
			$dataValid = false;
		} else {
			if ("Apartment" == $_POST['pick_home']){
				$CheckedApt_pick = 'selected';
			}  
			else if ("Condo" == $_POST['pick_home']){
				$CheckedCondo_pick = 'selected';
			}  
			else if ("House" == $_POST['pick_home']){
				$CheckedHouse_pick = 'selected';
			}
		}
		if ($_POST['pick_rooms'] == "" || $_POST['pick_rooms'] == "Select numbers of room") {
			$pick_roomsMsg = "Please fill in this blank.";
			$dataValid = false;
		} else {
			if ("Studio/Bachelor" == $_POST['pick_rooms']){
				$CheckedStudio_pick = 'selected';
			}  
			else if ("1Bedroom" == $_POST['pick_rooms']){
				$Checked1_pick = 'selected';
			}  
			else if ("2Bedrooms" == $_POST['pick_rooms']){
				$Checked2_pick = 'selected';
			}
			else if ("3Bedrooms" == $_POST['pick_rooms']){
				$Checked3_pick = 'selected';
			}
			else if ("3moreRooms" == $_POST['pick_rooms']){
				$Checked4_pick = 'selected';
			}
		}
		if ($_POST['p_address'] == "" && $_POST['p_address'] == "Street Number & Street Name") {
			$p_addressMsg = "Msgor - you must fill in an address";
			$dataValid = false;		
		}
		/*if ($_POST['p_unit'] == "Unit or Suite") {
			$p_unitMsg = "Msgor - you must fill in a unit number";
			$dataValid = false;		
		}*/
		if ($_POST['p_city'] == "" || $_POST['p_city'] == "Select city") {
			$p_cityMsg = "Please fill in this blank.";
			$dataValid = false;
		} else {
			if ("Toronto" == $_POST['p_city']){
				$CheckedToro_pick = 'selected';
			}  
			else if ("Mississauga" == $_POST['p_city']){
				$CheckedMiss_pick = 'selected';
			}
			else if ("Markham" == $_POST['p_city']){
				$CheckedMark_pick = 'selected';
			}  
			else if ("Scarborough" == $_POST['p_city']){
				$CheckedScar_pick = 'selected';
			}
			else if ("Vaughan" == $_POST['p_city']){
				$CheckedVaug_pick = 'selected';
			}
			else if ("Richmond Hill" == $_POST['p_city']){
				$CheckedRich_pick = 'selected';
			}
			else if ("others" == $_POST['p_city']){
				$Checkedothers_pick = 'selected';
			}
		}
		if (isset($_POST['pick_elevator']) == "y" || isset($_POST['pick_elevator']) == "n") {
			if ('y' == $_POST['pick_elevator']){
				$pick_elevator_y = 'checked="checked"';
			}  
			else if ('n' == $_POST['pick_elevator']){
				$pick_elevator_n = 'checked="checked"';
			}  
		} 
		else {
			
		}
		if (isset($_POST['pick_parking']) == "y" || isset($_POST['pick_parking']) == "n") {
			if ('y' == $_POST['pick_parking']){
				$pick_parking_y = 'checked="checked"';
			}  
			else if ('n' == $_POST['pick_parking']){
				$pick_parking_n = 'checked="checked"';
			}  
		} 
		else {
			
		}
		/*if ($_POST['p_postalcode'] == "") {
			$p_postalcodeMsg = "Msgor - you must fill in a last name";
			$dataValid = false;		
		}*/

		if ($_POST['drop_home'] == "" || $_POST['drop_home'] == "Select type of home") {
			$drop_homeMsg = "Please fill in this blank.";
			$dataValid = false;
		} else {
			if ("Apartment" == $_POST['drop_home']){
				$CheckedApt_drop = 'selected';
			}  
			else if ("Condo" == $_POST['drop_home']){
				$CheckedCondo_drop = 'selected';
			}  
			else if ("House" == $_POST['drop_home']){
				$CheckedHouse_drop = 'selected';
			}
		}
		if ($_POST['drop_rooms'] == "" || $_POST['drop_rooms'] == "Select numbers of room") {
			$drop_roomsMsg = "Please fill in this blank.";
			$dataValid = false;
		} else {
			if ("Studio/Bachelor" == $_POST['drop_rooms']){
				$CheckedStudio_drop = 'selected';
			}  
			else if ("1Bedroom" == $_POST['drop_rooms']){
				$Checked1_drop = 'selected';
			}  
			else if ("2Bedrooms" == $_POST['drop_rooms']){
				$Checked2_drop = 'selected';
			}
			else if ("3Bedrooms" == $_POST['drop_rooms']){
				$Checked3_drop = 'selected';
			}
			else if ("3moreRooms" == $_POST['drop_rooms']){
				$Checked4_drop = 'selected';
			}
		}

		if ($_POST['d_address'] == "" && $_POST['d_address'] == "Street Number & Street Name") {
			$d_addressMsg = "Msgor - you must fill in an address";
			$dataValid = false;		
		}
		/*if ($_POST['d_unit'] == "Unit or Suite") {
			$d_unitMsg = "Msgor - you must fill in a unit number";
			$dataValid = false;		
		}*/
		if ($_POST['d_city'] == "" || $_POST['d_city'] == "Select city") {
			$d_cityMsg = "Please fill in this blank.";
			$dataValid = false;
		} else {
			if ("Toronto" == $_POST['d_city']){
				$CheckedToro_drop = 'selected';
			}  
			else if ("Mississauga" == $_POST['d_city']){
				$CheckedMiss_drop = 'selected';
			}
			else if ("Markham" == $_POST['d_city']){
				$CheckedMark_drop = 'selected';
			}  
			else if ("Scarborough" == $_POST['d_city']){
				$CheckedScar_drop = 'selected';
			}
			else if ("Vaughan" == $_POST['d_city']){
				$CheckedVaug_drop = 'selected';
			}
			else if ("Richmond Hill" == $_POST['d_city']){
				$CheckedRich_drop = 'selected';
			}
			else if ("others" == $_POST['d_city']){
				$Checkedothers_drop = 'selected';
			}
		}
		if (isset($_POST['drop_elevator']) == "y" || isset($_POST['drop_elevator']) == "n") {
			if ('y' == $_POST['drop_elevator']){
				$drop_elevator_y = 'checked="checked"';
			}  
			else if ('n' == $_POST['drop_elevator']){
				$drop_elevator_n = 'checked="checked"';
			}  
		} 
		else {
			
		}
		if (isset($_POST['drop_parking']) == "y" || isset($_POST['drop_parking']) == "n") {
			if ('y' == $_POST['drop_parking']){
				$drop_parking_y = 'checked="checked"';
			}  
			else if ('n' == $_POST['drop_parking']){
				$drop_parking_n = 'checked="checked"';
			}  
		} 
		else {
			
		}
		/*if ($_POST['d_postalcode'] == "") {
			$d_postalcodeMsg = "Msgor - you must fill in a last name";
			$dataValid = false;		
		}*/
	}
	// If the submit button was pressed and something was entered in both fields, process data
	// (we just print a mesg)
	if ($_POST && $dataValid) { 
		session_start();

		$_SESSION['fname'] = $_POST['c_fname'];
		$_SESSION['lname'] = $_POST['c_lname'];
		$_SESSION['c_email'] = $_POST['c_email'];
		$_SESSION['c_phone'] = $_POST['c_phone'];
		$_SESSION['c_date'] = $_POST['c_date'];
		$_SESSION['c_time'] = $_POST['c_time'];

		$_SESSION['pick_home'] = $_POST['pick_home'];
		$_SESSION['pick_rooms'] = $_POST['pick_rooms'];
		$_SESSION['p_address'] = $_POST['p_address'];
		if($_POST['p_unit'] == "" || $_POST['p_unit'] == "Unit or Suite Number") {
			$_SESSION['p_unit'] = "";
		} else {
			$_SESSION['p_unit'] = $_POST['p_unit'];
		}

		$_SESSION['p_city'] = $_POST['p_city'];
		$_SESSION['p_postalcode'] = $_POST['p_postalcode'];
		$_SESSION['pick_elevator'] = $_POST['pick_elevator'];
		$_SESSION['pick_parking'] = $_POST['pick_parking'];
		


		$_SESSION['drop_home'] = $_POST['drop_home'];
		$_SESSION['drop_rooms'] = $_POST['drop_rooms'];
		$_SESSION['d_address'] = $_POST['d_address'];
		if($_POST['d_unit'] == "" || $_POST['d_unit'] == "Unit or Suite Number") {
			$_SESSION['d_unit'] = "";
		} else {
			$_SESSION['d_unit'] = $_POST['d_unit'];
		}
		$_SESSION['d_city'] = $_POST['d_city'];
		$_SESSION['d_postalcode'] = $_POST['d_postalcode'];
		$_SESSION['drop_elevator'] = $_POST['drop_elevator'];
		$_SESSION['drop_parking'] = $_POST['drop_parking'];
		
		$_SESSION['description'] = $_POST['description'];

		include 'query.php';
		store_booking($temp_fname, $temp_lname, $temp_email, $temp_phone, $temp_date, $temp_time,
		              $temp_pickhome, $temp_pickrooms, $temp_paddress, $temp_punit, $temp_pcity, $temp_ppostal, $temp_pelevator, $temp_pparking,
		              $temp_drophome, $temp_droprooms, $temp_daddress, $temp_dunit, $temp_dcity, $temp_ppostal, $temp_delevator, $temp_dparking,
		              $temp_desc);
		header('Location:innout-summary.php');
		
		exit();
	?>

	<?php
	// If no submit or data is invalid, print form, repopulating fields and printing Msg mesgs
	} else { 
	?>
<!DocType html>
<html lang="en">
	<head>
		<title>In & Out Moving</title>
		<meta charset=utf-8>
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
		<meta name="description" content="In and Out Moving Company in Toronto" />
        <meta name="keywords" content="moving, apartment, condo, office, house, company, toronto"/>
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
		<div id="include_menu" ></div>			
		<div class=container>
			<div class="column-1_3">
				<div class=Booking_info>
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
					<div class=title><!--<img src="images/background/awesome-graphic.jpg" alt="In n Out Moving"/>--></div>
					<!-- collapsible -->
					<form id="c_quote" name="c_quote" method = "post" action=''	onreset="" onsubmit="">
						
						<!-- collapsible -->
						<div class="page_open_booking" id="body-section1"><h3>Your Details</h3><span></span></div>
						<div class="container1">
							<div class="content1">
								<div><p>&nbsp;</p></div>
								<div><!--Name (required)-->
									<label for="firstName">First Name :<span class="required">*</span></label>
									<label for="lastName">Last Name :<span class="required">*</span></label>
								</div>
								<div>
									<input type="text" id="c_fname" name="c_fname" 
										onfocus="if (this.value=='First Name') this.value = ''" 
										value="<?php if (isset($_POST['c_fname'])) echo $_POST['c_fname']; else echo "First Name"; ?>"required/>
									<input type="text" id="c_lname" name="c_lname" 
										onfocus="if (this.value=='Last Name') this.value = ''" 
										value="<?php if (isset($_POST['c_lname'])) echo $_POST['c_lname']; else echo "Last Name"; ?>"required/>
								</div>
								<div><!--email (optional)--><!--phone Number (required)-->
									<label for="mail">E-mail :<span class="optional" ></span></label>
									<label for="phone">Phone :<span class="required">*</span></label>
								</div>
								<div>
									<input type="email" id="c_email" name="c_email" value="<?php if (isset($_POST['c_email'])) echo $_POST['c_email']; ?>"/>
									<input type="tel" id="c_phone" name="c_phone" 
										onfocus="if (this.value=='eg) 6470123456') this.value = ''" 
										value="<?php if (isset($_POST['c_phone'])) echo $_POST['c_phone']; else echo"eg) 6470123456"; ?>"required/>
								</div>
								<div><!--date (required)-->
									<label for="date">Date :<span class="required">*</span></label>
									<label for="date">Time :<span class="required">*</span></label>
								</div>
								<div>
									<input type="text" name="c_date" class="datepicker" value="<?php if (isset($_POST['c_date'])) echo $_POST['c_date']; ?>" />
									<select id="c_time" name="c_time" required>
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
								</div>
							</div>
						</div>
						<!-- end collapsible -->
						<div class="page_collapsible_booking" id="body-section2"><h3>Pick-up Information</h3><span></span></div>
						<div class="container1">
							<div class="content1">
								<div><p>&nbsp;</p></div>
								<div><!--Type of home (required)-->
									<label for="home">Type of Home :<span class="required">*</span></label>
									<label for="rooms">Bedrooms :<span class="required">*</span></label>
								</div>
								<div>
									<select id="pick_home" name="pick_home" required>
										<option value="Select type of home">Select type of home</option>
										<option value="Apartment" <?php echo $CheckedApt_pick;?>>Apartment</option>
										<option value="Condo" <?php echo $CheckedCondo_pick;?>>Condo</option>
										<option value="House" <?php echo $CheckedHouse_pick;?>>House</option>
									</select>
									<select id="pick_rooms" name="pick_rooms" required>
										<option value="Select numbers of room">Select numbers of room</option>
										<option value="Studio/Bachelor" <?php echo $CheckedStudio_pick;?>>Studio</option>
										<option value="1Bedroom" <?php echo $Checked1_pick;?>>1 Bedroom</option>
										<option value="2Bedrooms" <?php echo $Checked2_pick;?>>2 Bedrooms</option>
										<option value="3Bedrooms" <?php echo $Checked3_pick;?>>3 Bedrooms</option>
										<option value="3moreRooms" <?php echo $Checked4_pick;?>>more than 3 bedrooms</option>
									</select>
								</div>
								<div><!--current address (required)-->
									<label for="p_address">Street Address :<span class="required">*</span></label>
									<label for="p_unit">Unit/Suite :<span class="optional"></span></label>
								</div>
								<div>
									<input type="text" id="p_address" name="p_address" 
										onfocus="if (this.value=='Street Number & Street Name') this.value = ''" 
										value="<?php if (isset($_POST['p_address'])) echo $_POST['p_address']; else echo"Street Number & Street Name"; ?>"required/>
									<input type="text" id="p_unit" name="p_unit" 
										onfocus="if (this.value=='Unit or Suite Number') this.value = ''" 
										value="<?php if (isset($_POST['p_unit'])) echo $_POST['p_unit']; else echo"Unit or Suite Number"; ?>"/>
								</div>
								<div><!--current city (required)-->
									<label for="p_city">City :<span class="required">*</span></label>
									<label for="p_postalcode">Postal Code :<span class="optional"></span></label>
								</div>
								<div>
									<select name="p_city" id="p_city" required>
										<option value="Select city">Select city</option>
										<option value="Mississauga" <?php echo $CheckedMiss_pick;?>>Mississauga</option>
										<option value="Toronto" 	<?php echo $CheckedToro_pick;?>>Toronto</option>
										<option value="Markham" 	<?php echo $CheckedMark_pick;?>>Markham</option>
										<option value="Scarborough" <?php echo $CheckedScar_pick;?>>Scarborough</option>
										<option value="Vaughan" 	<?php echo $CheckedVaug_pick;?>>Vaughan</option>
										<option value="Richmond Hill" <?php echo $CheckedRich_pick;?>>Richmond Hill</option>
										<option value="others" 		<?php echo $Checkedothers_pick;?>>Others</option>
									</select>
									<input type="text" id="p_postalcode" name="p_postalcode" 
										onfocus="if (this.value=='eg)M6L 5H7') this.value = ''" 
										value="<?php if (isset($_POST['p_postalcode'])) echo $_POST['p_postalcode']; else echo"eg)M6L 5H7";?>"/>
								</div>
								<div>
									<label for="">Elevator :<span class="ontional"></span></label>	
									<label for="">Parking lot :<span class="ontional"></span></label>							
								</div>
								<div>
									<span style="width:200px;">
										<input type="radio" name="pick_elevator" value="y" style="width:30px;" <?php echo $pick_elevator_y;?>>Yes
										<input type="radio" name="pick_elevator" value="n" style="width:30px;" <?php echo $pick_elevator_n;?>>No
									</span>
									<span style="width:200px; margin-left:90px;">
										<input type="radio" name="pick_parking" value="y" style="width:30px;" <?php echo $pick_parking_y;?>>Yes
										<input type="radio" name="pick_parking" value="n" style="width:30px;" <?php echo $pick_parking_n;?>>No
									</span>
								</div>
							</div>
						</div>
						<!-- end collapsible -->
						<!-- collapsible -->
						<div class="page_collapsible_booking" id="body-section3"><h3>Delivery Information</h3><span></span></div>
						<div class="container1">
							<div class="content1">
								<div><p>&nbsp;</p></div>
								<div><!--Type of home (required)-->
									<label for="home">Type of Home :<span class="required">*</span></label>
									<label for="rooms">Bedrooms :<span class="required">*</span></label>
								</div>
								<div>
									<select id="drop_home" name="drop_home" required>
										<option value="Select type of home">Select type of home</option>
										<option value="Apartment" <?php echo $CheckedApt_drop;?>>Apartment</option>
										<option value="Condo" <?php echo $CheckedCondo_drop;?>>Condo</option>
										<option value="House" <?php echo $CheckedHouse_drop;?>>House</option>
									</select>
									<select id="drop_rooms" name="drop_rooms" required>
										<option value="Select numbers of room">Select numbers of room</option>
										<option value="Studio/Bachelor" <?php echo $CheckedStudio_drop;?>>Studio</option>
										<option value="1Bedroom" <?php echo $Checked1_drop?>>1 Bedroom</option>
										<option value="2Bedrooms" <?php echo $Checked2_drop;?>>2 Bedrooms</option>
										<option value="3Bedrooms" <?php echo $Checked3_drop;?>>3 Bedrooms</option>
										<option value="3moreRooms" <?php echo $Checked4_drop;?>>more than 3 bedrooms</option>
									</select>
								</div>
								<div><!--current address (required)-->
									<label for="d_address">Street Address :<span class="required">*</span></label>
									<label for="d_unit#">Unit/Suite :<span class="optional"></span></label>
								</div>
								<div>
									<input type="text" id="d_address" name="d_address" 
										onfocus="if (this.value=='Street Number & Street Name') this.value = ''" 
										value="<?php if (isset($_POST['d_address'])) echo $_POST['d_address']; else echo"Street Number & Street Name"; ?>"required/>
									<input type="text" id="d_unit" name="d_unit" 
										onfocus="if (this.value=='Unit or Suite Number') this.value = ''" 
										value="<?php if (isset($_POST['d_unit'])) echo $_POST['d_unit']; else echo"Unit or Suite Number"; ?>"/>
								</div>
								<div><!--current city (required)-->
									<label for="d_city">City :<span class="required">*</span></label>
									<label for="d_postalcode">Postal Code :<span class="optional"></label>
								</div>
								<div>
									<select name="d_city" id="d_city" onblur="calcRoute();" required>
										<option>Select your city</option>
										<option value="Mississauga" <?php echo $CheckedMiss_drop;?>>Mississauga</option>
										<option value="Toronto"		<?php echo $CheckedToro_drop;?>>Toronto</option>
										<option value="Markham"		<?php echo $CheckedMark_drop;?>>Markham</option>
										<option value="Scarborough" <?php echo $CheckedScar_drop;?>>Scarborough</option>
										<option value="Vaughan"		<?php echo $CheckedVaug_drop;?>>Vaughan</option>
										<option value="Richmond Hill" <?php echo $CheckedRich_drop;?>>Richmond Hill</option>
										<option value="others"		<?php echo $Checkedothers_drop;?>>Others</option>
									</select>
									<input type="text" id="d_postalcode" name="d_postalcode" 
										onfocus="if (this.value=='eg)M6L 5H7') this.value = ''" 
										value="<?php if (isset($_POST['d_postalcode'])) echo $_POST['d_postalcode']; else echo"eg)M6L 5H7";?>"/>
								</div>
								<div>
									<label for="">Elevator :<span class="ontional"></span></label>	
									<label for="">Parking lot :<span class="ontional"></span></label>							
								</div>
								<div>
									<span style="width:200px;">
										<input type="radio" name="drop_elevator" value="y" style="width:30px;" <?php echo $drop_elevator_y;?>>Yes
										<input type="radio" name="drop_elevator" value="n" style="width:30px;" <?php echo $drop_elevator_n;?>>No
									</span>
									<span style="width:200px; margin-left:90px;">
										<input type="radio" name="drop_parking" value="y" style="width:30px;" <?php echo $drop_parking_y;?>>Yes
										<input type="radio" name="drop_parking" value="n" style="width:30px;" <?php echo $drop_parking_n;?>>No
									</span>
								</div>
							</div>
						</div>
						<!-- end collapsible -->
						<!-- collapsible -->
						<div class="page_collapsible_booking" id="body-section4"><h3>Additional Information</h3><span></span></div>
						<div class="container1">
							<div class="content1">
								<div><!--notes duty (optional)-->
									<label for="notes">Description :</label><span class="required"></span>
								</div>
								<div>
									<textarea name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>" rows="5" ></textarea>
								</div>
							</div>
						</div>
						<!-- end collapsible -->
						<!--Buttons-->
						<a href="#" id="closeAll" title="Close all">Close All</a> | <a href="#" id="openAll" title="Open All">Open All</a>
						<div class="button">
							<button type="submit">Quote Now</button>
							<button type="reset">Reset</button>
						</div>
					</form>
				</div>
			</div>
			<div class=map-blocks>
				<div class=block>
					<div id="map-canvas"></div>
					&nbsp;
					<div id="panel">
						<div>
							<p style="font-size:80%; color:#aaa; margin:0;">Once you fill out pick-up address, city and delivery address, city, then you will see your direction.</p>
							<p>&nbsp;</p>
							<p style="font-size:80%; color:#aaa; margin:0;">If you want to try again, please click the "Get direction" button at the bottom after you give right address.</p>
						</div>
						<input name="submit" id="getdirections" type="submit" value="Get Directions" 
							onclick="calcRoute();"/>
						<div class=clear></div>
					</div>
					<div id="warnings_panel" style="width:100%;height:10%;text-align:center"></div>
				</div>
			</div>
		</div>
		

		<!--Footer-->
		<div id="include_above_footer" ></div>
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