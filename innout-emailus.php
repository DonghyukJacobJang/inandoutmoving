
<?php
$custnameMsg ="";
$emailMsg ="";
$phoneMsg = "";
$dateMsg = "";
$descMsg = "";
$phone = "";
$area = "";
$local3 = "";
$local4 = "";
$tempcust = $_POST['custname'];
$tempemail = $_POST['email'];
$tempphone = $phone;
$tempdate = $_POST['cdate'];
$tempdesc = $_POST['description'];
$followMsg = "";
$dataValid = true;
$phoneValid = true;

$charOnly = "/^[a-z\s]+[a-z]$/i";
$reg_email = "/^[^0-9~!@#$%^&*()_+=?.,][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,3}$/i";
$reg_phone = "/^(\d{3}+\d{3}+\d{4}|\d{3}\d{3}+[\s]{1}+\d{4}|\d{3}+[\s]{1}+\d{3}+[\s]{1}+\d{4}||\d{3}+[-]{1}+\d{3}+[-]{1}+\d{4}|\d{3}+[\s]{1}+\d{7}|\(\d{3}\)\s{1}\d{3}[\s-]{1}\d{4})$/";/*"/^(\d{3}|[(]\d{3}[)]|\d{3}[)])[ -]*\d{3}[ -]*\d{4}$/";*/

// If submit with POST
if ($_POST) { 
	$area = $_POST['c_area'];
	$local3 = $_POST['c_local3'];
	$local4 = $_POST['c_local4'];
        // Test for nothing entered in field
	if ($_POST['custname'] == "") {
		$custnameMsg = "Please enter your full name.";
		$dataValid = false;
	}
	else {	
		if ( preg_match($charOnly, $_POST['custname']) ) 
		{
			$custnameMsg = "";
		} else {
			$custnameMsg = "This is an invalid name.";
			$dataValid = false;
		}
	}
	if ($_POST['email'] == "") {
		$emailMsg = "Please enter E-mail address.";
		$dataValid = false;		
	}
	else {	
		if ( preg_match($reg_email, $_POST['email']) ) 
		{
			$emailMsg = "";
		} else {
			$emailMsg = "E-mail is not Valid.";
			$dataValid = false;
		}
	}
	if ($_POST['cdate'] == "") {
		$dateMsg = "Please choose a date.";
		$dataValid = false;		
	}
	if ($_POST['c_area'] == "") {
		$phoneMsg = "Please enter phone number.";
		$dataValid = false;	
		$phoneValid = false;	
	}
	if ($_POST['c_local3'] == "") {
		$phoneMsg = "Please enter phone number.";
		$dataValid = false;		
		$phoneValid = false;	
	}
	if ($_POST['c_local4'] == "") {
		$phoneMsg = "Please enter phone number.";
		$dataValid = false;		
		$phoneValid = false;	
	}
	if( $phoneValid ) {
		$phone = $area . "" . $local3 . "" .$local4;
		if ( preg_match($reg_phone, $phone) ) {
			$phoneMsg = "";
		} else {
			$phoneMsg = "Phone number is not Valid.";
			$dataValid = false;
		}		
	} else {
		$area = "";
		$local3 = "";
		$local4 = "";
		$phone = "";
	}
}
// If the submit button was pressed and something was entered in both fields, process data
// (we just print a mesg)
if ($_POST && $dataValid) { 

	session_start();

	$_SESSION['custname'] = $_POST['custname'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['phone'] = $phone;
	$tempphone = $phone;
	$_SESSION['cdate'] = $_POST['cdate'];
	$_SESSION['description'] = $_POST['description'];

	header('Location:emailus-summary.php');

	include 'query.php';
	store_email($tempcust, $tempemail, $tempphone, $tempdate, $tempdesc);
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
			$(document).ready(function() {
			    $('#include_quickie_quote').load('quickie_quote.php');
			});
		</script>
	</head>
	<body>
		<!-- top menu-->
		<div id="include_menu" ></div>	

		<div class=container>
			<div class="column-1_3">
				<div class=emailus>
					<div class="Booking_step">
						<p style="margin-left:52px;">
							<div style="float:left; margin:9px;">
								<img src="images/background/in_and_out_email.png" alt="" width=42 height=42/>
							</div>
							<span style="color: #fb0197;">
								<span style="font-size: 50px;">Email us<br /></span>
							</span>
						</p>
						<div>
							<form action="" method="post" >
								<div class="container1">
									<div class="content1">
										<div><p>&nbsp;</p></div>
										<div><!--Name (required)-->
											<label for="custname"><span class="required">*</span>Your Name :</label>
											<input type="text" name="custname" value="<?php if (isset($_POST['custname'])) echo $_POST['custname']; ?>" />												<span class="green-font"><?php echo $custnameErr; ?></span>
											<span class="green-font"><?php echo $custnameMsg; ?></span>
										</div>
										<div><p>&nbsp;</p></div>
										<div>
											<label for="mail"><span class="required">*</span>E-mail :</label>
											<input type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
											<span class="green-font"><?php echo $emailMsg; ?></span>
										</div>
										<div><p>&nbsp;</p></div>
										<div><!--email (optional)--><!--phone Number (required)-->
											<label for="date"><span class="required">*</span>Date :</label>
											<input type="text" name="cdate" class="datepicker" value="<?php if (isset($_POST['cdate'])) echo $_POST['cdate']; ?>">
											<span class="green-font"><?php echo $dateMsg; ?></span>
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
											<input style="width: 30px;" type="text" maxlength="3" name="c_area" value="<?php if (isset($_POST['c_area'])) echo $_POST['c_area']; else echo""; ?>" >
											<input style="width: 30px; margin-left: 15px;" type="text" maxlength="3" name="c_local3" value="<?php if (isset($_POST['c_local3'])) echo $_POST['c_local3']; else echo""; ?>" >
											<input style="width: 35px; margin-left: 10px;:;" type="text" maxlength="4" name="c_local4" value="<?php if (isset($_POST['c_local4'])) echo $_POST['c_local4']; else echo""; ?>" >
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
										     <span class="green-font"><?php echo $phoneMsg; ?></span>
										</div>
										<div><p>&nbsp;</p></div>
										<div><!--notes duty (optional)-->
											<label for="notes">Description :</label><span class="required"></span>
										</div>
										<div>
											<textarea name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"rows="5" ></textarea>
										</div>
									</div>
								</div>
								<div class="button">
									<button type="submit">Email Now</button>
									<button type="reset">Reset</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<aside class="column-2_3">
			<p>&nbsp;</p>		
		</aside>
		<div class="column-3_3">
			<p>&nbsp;</p>
		</div>			
		
	</div>

	<!--quickie_quote-->
	<!--<div id="include_quickie_quote" ></div>-->
	<!--footer-->
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