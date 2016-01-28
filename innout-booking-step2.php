
<?php
session_start(); 
$pick_homeMsg = "";
$pick_roomsMsg = "";
$p_addressMsg = "";
$p_unitMsg = "";
$p_cityMsg = "";
$p_postalcodeMsg ="";

$pick_elevator_y = "";
$pick_elevator_n = "";
$pick_parking_y = "";
$pick_parking_n = "";

$temp_fname = $_SESSION['fname'];
$temp_lname = $_SESSION['lname'];
$temp_email = $_SESSION['email'];
$temp_phone = $_SESSION['phone'];
$temp_date = $_SESSION['date'];
$temp_time = $_SESSION['time'];

$temp_pickhome = $_POST['pick_home'];
$temp_pickrooms = $_POST['pick_rooms'];
$temp_paddress = $_POST['p_address'];
$temp_punit = $_POST['p_unit'];
$temp_pcity = $_POST['p_city'];
$temp_ppostal = $_POST['p_postalcode'];
$temp_pelevator = $_POST['pick_elevator'];
$temp_pparking = $_POST['pick_parking'];

$reg_number = "/^\d{1,5}$/";
$reg_address = "/^[a-zA-Z0-9]+[\s]*[a-zA-Z0-9.\-\,\#]+[\s]*[a-zA-Z0-9.\-\,\#]+[a-zA-Z0-9\s.\-\,\#]*$/";
$reg_postal = "/^(?<full>(?<part1>[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1})(?:[ ](?=\d))?(?<part2>\d{1}[A-Z]{1}\d{1}))$/i";

$dataValid = true;

// If submit with POST
if ($_POST) { 
	if ($_POST['pick_home'] == "" || $_POST['pick_home'] == "Select type of home") {
		$pick_homeMsg = "Please select one.";
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
		$pick_roomsMsg = "Please select one.";
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
	if ($_POST['p_address'] == "" ) {
		$p_addressMsg = "Please enter an address.";
		$dataValid = false;		
	}
	else {	
		if ( preg_match($reg_address, $_POST['p_address']) ) 
		{
			$p_addressMsg = "";
		} else {
			$p_addressMsg = "inserted invalid charanter.";
			$dataValid = false;
		}
	}
	if ( !empty($_POST['p_unit']) ) {
		if ( preg_match($reg_number, $_POST['p_unit']) ) 
		{
			$p_unitMsg = "";
		} else {
			$p_unitMsg = "inserted invalid charanter.";
			$dataValid = false;
		}
	}
	if ( !empty($_POST['p_postalcode']) ) {
		if ( preg_match($reg_postal, $_POST['p_postalcode']) ) 
		{
			$p_postalcodeMsg = "";
		} else {
			$p_postalcodeMsg = "inserted invalid charanter.";
			$dataValid = false;
		}
	}
	if ($_POST['p_city'] == "" || $_POST['p_city'] == "Select city") {
		$p_cityMsg = "Please select city.";
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
}
if( !isset($_SESSION['token1']) )  {
	header('location:innout-booking-step1.php');
}
// If the submit button was pressed and something was entered in both fields, process data
// (we just print a mesg)
if ($_POST && $dataValid) { 
	session_start();
	$_SESSION['token2'] = 'ok';
	$_SESSION['fname'] = $temp_fname;
	$_SESSION['lname'] = $temp_lname;
	$_SESSION['email'] = $temp_email;
	$_SESSION['phone'] = $temp_phone;
	$_SESSION['date'] = $temp_date;
	$_SESSION['time'] = $temp_time;

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

	/*include 'query.php';
	store_booking($temp_fname, $temp_lname, $temp_email, $temp_phone, $temp_date, $temp_time,
	              $temp_pickhome, $temp_pickrooms, $temp_paddress, $temp_punit, $temp_pcity, $temp_ppostal, $temp_pelevator, $temp_pparking,
	              $temp_drophome, $temp_droprooms, $temp_daddress, $temp_dunit, $temp_dcity, $temp_ppostal, $temp_delevator, $temp_dparking,
	              $temp_desc);
	header('Location:innout-summary.php');*/
	header('Location:innout-booking-step3.php');
	
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
					</div>
					<div class=title><!--<img src="images/background/awesome-graphic.jpg" alt="In n Out Moving"/>--></div>
					<!-- collapsible -->
					<form id="c_quote" name="c_quote" method = "post" action=''	onreset="" onsubmit="">
						<div class="page_open_booking" id="body-section1"><h2>Pick-up Information</h2><span></span></div>
						<p>Please Fill in this form. &nbsp;(<span class="required">*</span> ) is required.</p>
						<div class="container1">
							<div class="content1">
								<div><p>&nbsp;</p></div>
								<div><!--Type of home (required)-->
									<label><span class="required">*</span>Type of Home :</label>
									<select id="pick_home" name="pick_home" >
										<option value="Select type of home"></option>
										<option value="Apartment" <?php echo $CheckedApt_pick;?>>Apartment</option>
										<option value="Condo" <?php echo $CheckedCondo_pick;?>>Condo</option>
										<option value="House" <?php echo $CheckedHouse_pick;?>>House</option>
									</select>
									<span class="green-font"><?php echo $pick_homeMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--Type of home (required)-->
									<label><span class="required">*</span>Bedrooms :</label>
									<select id="pick_rooms" name="pick_rooms" >
										<option value="Select numbers of room"></option>
										<option value="Studio/Bachelor" <?php echo $CheckedStudio_pick;?>>Studio</option>
										<option value="1Bedroom" <?php echo $Checked1_pick;?>>1 Bedroom</option>
										<option value="2Bedrooms" <?php echo $Checked2_pick;?>>2 Bedrooms</option>
										<option value="3Bedrooms" <?php echo $Checked3_pick;?>>3 Bedrooms</option>
										<option value="3moreRooms" <?php echo $Checked4_pick;?>>more than 3</option>
									</select>
									<span class="green-font"><?php echo $pick_roomsMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--current address (required)-->
									<label><span class="required">*</span>Street Address :</label>
									<input type="text" id="p_address" name="p_address" value="<?php if (isset($_POST['p_address'])) echo $_POST['p_address']; else echo""; ?>"/>
									<span class="green-font"><?php echo $p_addressMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--current address (required)-->
									<label><span class="optional"></span>Unit/Suite :</label>
									<input type="text" id="p_unit" name="p_unit" value="<?php if (isset($_POST['p_unit'])) echo $_POST['p_unit']; else echo""; ?>"/>
									<span class="green-font"><?php echo $p_unitMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--current city (required)-->
									<label><span class="required">*</span>City :</label>
									<select name="p_city" id="p_city" >
										<option value="Select city"></option>
										<option value="Mississauga" <?php echo $CheckedMiss_pick;?>>Mississauga</option>
										<option value="Toronto" 	<?php echo $CheckedToro_pick;?>>Toronto</option>
										<option value="Markham" 	<?php echo $CheckedMark_pick;?>>Markham</option>
										<option value="Scarborough" <?php echo $CheckedScar_pick;?>>Scarborough</option>
										<option value="Vaughan" 	<?php echo $CheckedVaug_pick;?>>Vaughan</option>
										<option value="Richmond Hill" <?php echo $CheckedRich_pick;?>>Richmond Hill</option>
										<option value="others" 		<?php echo $Checkedothers_pick;?>>Others</option>
									</select>
									<span class="green-font"><?php echo $p_cityMsg; ?></span>									
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--current city (required)-->
									<label><span class="optional"></span>Postal Code :</label>
									<input type="text" id="p_postalcode" name="p_postalcode" value="<?php if (isset($_POST['p_postalcode'])) echo $_POST['p_postalcode']; else echo"";?>"/>
									<span class="green-font"><?php echo $p_postalcodeMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div>
									<label>Elevator :<span class="ontional"></span></label>	
									<span style="width:200px;">
										<input type="radio" name="pick_elevator" value="y" style="width:30px;" <?php echo $pick_elevator_y;?>>Yes
										<input type="radio" name="pick_elevator" value="n" style="width:30px;" <?php echo $pick_elevator_n;?>>No
									</span>					
								</div>
								<div><p>&nbsp;</p></div>
								<div>
									<label>Parking lot :<span class="ontional"></span></label>	
									<span style="width:200px;">
										<input type="radio" name="pick_parking" value="y" style="width:30px;" <?php echo $pick_parking_y;?>>Yes
										<input type="radio" name="pick_parking" value="n" style="width:30px;" <?php echo $pick_parking_n;?>>No
									</span>						
								</div>
								<div><p>&nbsp;</p></div>
							</div>
						</div>
						<!--Buttons-->						
						<div class="button">
							<button type="submit">Continue</button>
							<button type="reset">Reset</button>
						</div>
					</form>
				</div>
			</div>
			<div class="short-summery">
				<h3 style="padding:5px; font-size:150%;">Summery</h3>
				<div class="container1">
					<div class="content1">
						<div><h3>Contact Information</h3></div>
						<div style="color:#aaa;">
							<div><!--Name (required)-->
								<label>First Name :</label>		
								<label style="text-align: left;"><?php echo $temp_fname; ?></label>
							</div>							
							<div><!--Name (required)-->	
								<label>Last Name :</label>
								<label style="text-align: left;"><?php echo $temp_lname; ?></label>
							</div>								
							<div><!--email (optional)-->
								<label>E-mail :</label>
								<label style="text-align: left; width:250px;"><?php echo $_SESSION['email']; ?></label>
							</div>
							<div><!--phone Number (required)-->
								<label>Phone :</label>
								<label style="text-align: left;"><?php echo $_SESSION['phone']; ?></label>
							</div>
							<div><!--date (required)-->
								<label>Date :</label>
								<label style="text-align: left;"><?php echo $_SESSION['date']; ?></label>
							</div>
							<div><!--date (required)-->
								<label>Time :</label>
								<label style="text-align: left;"><?php echo $_SESSION['time']; ?></label>
							</div>
							<div><p>&nbsp;</p></div>
						</div>
					</div>
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