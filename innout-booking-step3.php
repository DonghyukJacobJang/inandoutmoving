
<?php
session_start();
$drop_homeMsg = "";
$drop_roomsMsg = "";
$d_addressMsg = "";
$d_unitMsg = "";
$d_cityMsg = "";
$d_postalcodeMsg ="";

$drop_elevator_y = "";
$drop_elevator_n = "";
$drop_parking_y = "";
$drop_parking_n = "";

$temp_fname = $_SESSION['fname'];
$temp_lname = $_SESSION['lname'];
$temp_email = $_SESSION['email'];
$temp_phone = $_SESSION['phone'];
$temp_date = $_SESSION['date'];
$temp_time = $_SESSION['time'];

$temp_pickhome = $_SESSION['pick_home'];
$temp_pickrooms = $_SESSION['pick_rooms'];
$temp_paddress = $_SESSION['p_address'];
$temp_punit = $_SESSION['p_unit'];
$temp_pcity = $_SESSION['p_city'];
$temp_ppostal = $_SESSION['p_postalcode'];
$temp_pelevator = $_SESSION['pick_elevator'];
$temp_pparking = $_SESSION['pick_parking'];

$temp_drophome = $_POST['drop_home'];
$temp_droprooms = $_POST['drop_rooms'];
$temp_daddress = $_POST['d_address'];
$temp_dunit = $_POST['d_unit'];
$temp_dcity = $_POST['d_city'];
$temp_dpostal = $_POST['d_postalcode'];
$temp_delevator = $_POST['drop_elevator'];
$temp_dparking = $_POST['drop_parking'];

$temp_desc = $_POST['description'];

$reg_number = "/^\d{1,5}$/";
$reg_address = "/^[a-zA-Z0-9]+[\s]*[a-zA-Z0-9.\-\,\#]+[\s]*[a-zA-Z0-9.\-\,\#]+[a-zA-Z0-9\s.\-\,\#]*$/";
$reg_postal = "/^(?<full>(?<part1>[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1})(?:[ ](?=\d))?(?<part2>\d{1}[A-Z]{1}\d{1}))$/i";

$to = "";
$headers = "";
$subject = "";
$message = "";

$dataValid = true;

// If submit with POST
if ($_POST) { 
	if ($_POST['drop_home'] == "" || $_POST['drop_home'] == "Select type of home") {
		$drop_homeMsg = "Please select one.";
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
		$drop_roomsMsg = "Please select one.";
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

	if ($_POST['d_address'] == "") {
		$d_addressMsg = "Please enter an address.";
		$dataValid = false;		
	}
	else {	
		if ( preg_match($reg_address, $_POST['d_address']) ) 
		{
			$d_addressMsg = "";
		} else {
			$d_addressMsg = "inserted invalid charanter.";
			$dataValid = false;
		}
	}
	if ( !empty($_POST['d_unit']) ) {
		if ( preg_match($reg_number, $_POST['d_unit']) ) 
		{
			$d_unitMsg = "";
		} else {
			$d_unitMsg = "inserted invalid charanter.";
			$dataValid = false;
		}
	}
	if ( !empty($_POST['d_postalcode']) ) {
		if ( preg_match($reg_postal, $_POST['d_postalcode']) ) 
		{
			$d_postalcodeMsg = "";
		} else {
			$d_postalcodeMsg = "inserted invalid charanter.";
			$dataValid = false;
		}
	}
	if ($_POST['d_city'] == "" || $_POST['d_city'] == "Select city") {
		$d_cityMsg = "Please select city.";
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
if( !isset($_SESSION['token2']) )  {
	header('location:innout-booking-step2.php');
}
// If the submit button was pressed and something was entered in both fields, process data
// (we just print a mesg)
if ($_POST && $dataValid) { 
	session_start();

	$_SESSION['fname'] = $temp_fname;
	$_SESSION['lname'] = $temp_lname;
	$_SESSION['email'] = $temp_email;
	$_SESSION['phone'] = $temp_phone;
	$_SESSION['date'] = $temp_date;
	$_SESSION['time'] = $temp_time;

	$_SESSION['pick_home'] = $temp_pickhome;
	$_SESSION['pick_rooms'] = $temp_pickrooms;
	$_SESSION['p_address'] = $temp_paddress;
	$_SESSION['p_unit'] = $temp_punit;
	$_SESSION['p_city'] = $temp_pcity;
	$_SESSION['p_postalcode'] = $temp_ppostal;
	$_SESSION['pick_elevator'] = $temp_pelevator;
	$_SESSION['pick_parking'] = $temp_pparking;

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
	$to = $_SESSION['email'];
	$headers = "From : In and out Movers.";
	$subject = "In and Out Moving : Booking Comfirmation.";
	$message = "<html><body>";
	$message .= '"<div><img src="http://inandoutmoving.ca/wp-content/uploads/2012/01/toronto-mover.jpg" alt=""/></div>"';
	$message .= '<h2>Hello,'.$_SESSION['fname'].'"</h2>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr><td><strong>Name:</strong> </td><td>" .$_SESSION['fname']. " " .$_SESSION['lname']. "</td></tr>";
	$message .= "<tr><td><strong>Phone:</strong> </td><td>" .$_SESSION['phone']. "</td></tr>";
	$message .= "<tr><td><strong>Date:</strong> </td><td>" .$_SESSION['date']. "</td></tr>";
	$message .= "<tr><td><strong>time:</strong> </td><td>" .$_SESSION['time']. "</td></tr>";
	$message .= "</table>";
	$message .= '<h3>Pick-up Information</h3>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr><td><strong>Address</strong> </td><td>".$_SESSION['p_unit']." ".$_SESSION['p_address'].", ".$_SESSION['p_city']. "</td></tr>";
	$message .= "</table>";
	$message .= '<h3>Drop-off Information</h3>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr><td><strong>Address</strong> </td><td>".$_SESSION['d_unit']." ".$_SESSION['d_address'].", ".$_SESSION['d_city']. "</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";
	mail($to, $subject, $message, $headers);
	
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
					<div class=title></div>					
					<form id="c_quote" name="c_quote" method = "post" action=''	onreset="" onsubmit="">
						<div class="page_open_booking" id="body-section3"><h2>Delivery Information</h2><span></span></div>
						<p>Please Fill in this form. &nbsp;(<span class="required">*</span> ) is required.</p>
						<div class="container1">
							<div class="content1">
								<div><p>&nbsp;</p></div>
								<div><!--Type of home (required)-->
									<label><span class="required">*</span>Type of Home :</label>
									<select id="drop_home" name="drop_home" >
										<option value="Select type of home"></option>
										<option value="Apartment" <?php echo $CheckedApt_drop;?>>Apartment</option>
										<option value="Condo" <?php echo $CheckedCondo_drop;?>>Condo</option>
										<option value="House" <?php echo $CheckedHouse_drop;?>>House</option>
									</select>
									<span class="green-font"><?php echo $drop_homeMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--Type of home (required)-->
									<label><span class="required">*</span>Bedrooms :</label>
									<select id="drop_rooms" name="drop_rooms" >
										<option value="Select numbers of room"></option>
										<option value="Studio/Bachelor" <?php echo $CheckedStudio_pick;?>>Studio</option>
										<option value="1Bedroom" <?php echo $Checked1_drop;?>>1 Bedroom</option>
										<option value="2Bedrooms" <?php echo $Checked2_drop;?>>2 Bedrooms</option>
										<option value="3Bedrooms" <?php echo $Checked3_drop;?>>3 Bedrooms</option>
										<option value="3moreRooms" <?php echo $Checked4_drop;?>>more than 3</option>
									</select>
									<span class="green-font"><?php echo $drop_roomsMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--current address (required)-->
									<label><span class="required">*</span>Street Address :</label>
									<input type="text" id="d_address" name="d_address" value="<?php if (isset($_POST['d_address'])) echo $_POST['d_address']; else echo""; ?>"/>
									<input type="hidden" id="p_address" name="p_address" value="<?php echo $temp_paddress; ?>"required/>
									<span class="green-font"><?php echo $d_addressMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--current address (required)-->
									<label><span class="optional"></span>Unit/Suite :</label>
									<input type="text" id="d_unit" name="d_unit" value="<?php if (isset($_POST['d_unit'])) echo $_POST['d_unit']; else echo""; ?>"/>
									<span class="green-font"><?php echo $d_unitMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--current city (required)-->
									<label><span class="required">*</span>City :</label>
									<select name="d_city" id="d_city" onblur="calcRoute();" >
										<option value="Select city"></option>
										<option value="Mississauga" <?php echo $CheckedMiss_drop;?>>Mississauga</option>
										<option value="Toronto" 	<?php echo $CheckedToro_drop;?>>Toronto</option>
										<option value="Markham" 	<?php echo $CheckedMark_drop;?>>Markham</option>
										<option value="Scarborough" <?php echo $CheckedScar_drop;?>>Scarborough</option>
										<option value="Vaughan" 	<?php echo $CheckedVaug_drop;?>>Vaughan</option>
										<option value="Richmond Hill" <?php echo $CheckedRich_drop;?>>Richmond Hill</option>
										<option value="others" 		<?php echo $Checkedothers_drop;?>>Others</option>
									</select>
									<input type="hidden" id="p_city" name="p_city" value="<?php echo $temp_pcity; ?>"/>									
									<span class="green-font"><?php echo $d_cityMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div><!--current city (required)-->
									<label><span class="optional"></span>Postal Code :</label>
									<input type="text" id="p_postalcode" name="d_postalcode" value="<?php if (isset($_POST['d_postalcode'])) echo $_POST['d_postalcode']; else echo"";?>"/>
									<span class="green-font"><?php echo $d_postalcodeMsg; ?></span>
								</div>
								<div><p>&nbsp;</p></div>
								<div>
									<label>Elevator :<span class="ontional"></span></label>	
									<span style="width:200px;">
										<input type="radio" name="drop_elevator" value="y" style="width:30px;" <?php echo $drop_elevator_y;?>>Yes
										<input type="radio" name="drop_elevator" value="n" style="width:30px;" <?php echo $drop_elevator_n;?>>No
									</span>						
								</div>
								<div><p>&nbsp;</p></div>
								<div>
									<label>Parking lot :<span class="ontional"></span></label>	
									<span style="width:200px;">
										<input type="radio" name="drop_parking" value="y" style="width:30px;" <?php echo $drop_parking_y;?>>Yes
										<input type="radio" name="drop_parking" value="n" style="width:30px;" <?php echo $drop_parking_n;?>>No
									</span>						
								</div>
								<div><p>&nbsp;</p></div>						
								<div class="page_open_booking" id="body-section4">
									<h2>Additional Information</h2><span></span>
								</div>
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
								<!--Buttons-->						
								<div class="button">
									<button type="submit">Quote Now</button>
									<button type="reset">Reset</button>
								</div>
							</form>
						</div>
					</div>
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
							<div><h3>Pick-up Information</h3></div>
							<div><!--Name (required)-->
								<label>House :</label>		
								<label style="text-align: left;"><?php echo $temp_pickhome; ?></label>
							</div>								
							<div><!--Name (required)-->	
								<label>Bedrooms :</label>
								<label style="text-align: left;"><?php echo $temp_pickrooms; ?></label>
							</div>								
							<div><!--email (optional)-->
								<label>Street Address :</label>
								<label style="text-align: left; width:250px;"><?php echo $temp_paddress; ?></label>
							</div>
							<?php 
							if(!empty($temp_punit)) { 
							?>
							<div><!--phone Number (required)-->
								<label>Unit :</label>
								<label style="text-align: left;"><?php echo $temp_punit; ?></label>
							</div>
							<?php 
							}
							?>
							<div><!--date (required)-->
								<label>City :</label>
								<label style="text-align: left;"><?php echo $temp_pcity; ?></label>
							</div>
							<?php 
							if(!empty($temp_ppostal)) { 
							?>
							<div><!--date (required)-->
								<label>Postal Code :</label>
								<label style="text-align: left;"><?php echo $temp_ppostal; ?></label>
							</div>
							<?php 
							}
							?>
							<?php 
							if(!empty($temp_pelevator)) { 
							?>
							<div><!--date (required)-->
								<label>Elevator :</label>
								<label style="text-align: left;"><?php echo $temp_pelevator; ?></label>
							</div>
							<?php 
							}
							?>
							<?php 
							if(!empty($temp_pparking)) { 
							?>
							<div><!--date (required)-->
								<label>Parking lot :</label>
								<label style="text-align: left;"><?php echo $temp_pparking; ?></label>
							</div>
							<?php 
							}
							?>
							<div><p>&nbsp;</p></div>
						</div>
					</div>
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