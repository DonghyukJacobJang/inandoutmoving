
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
		$followMsg .= $phoneMsg. ', ';
		$dataValid = false;	
		$phoneValid = false;	
	}
	if ($_POST['c_local3'] == "") {
		$phoneMsg = "Please enter phone number.";
		$followMsg .= $phoneMsg. ', ';
		$dataValid = false;		
		$phoneValid = false;	
	}
	if ($_POST['c_local4'] == "") {
		$phoneMsg = "Please enter phone number.";
		$followMsg .= $phoneMsg. ', ';
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

<!-- collapsible -->
<div class="page_collapsible_quickquote"  id="body-section1"><p class="verticaltext">In & Out Quickie Quote</p><span></span></div>
<div class="container1">
	<div class="content1">
		<div class="quick_info">
			<h1 class="Quick Quote">Quickie Quote</h1>
			<form action="emailus-summary.php" method="post" >
				<div><p>&nbsp;</p></div>
				<div><!--Name (required)-->
					<label style="width:60px;"><span class="required">*</span>Name :</label>
					<input type="text" name="custname" value="<?php if (isset($_POST['custname'])) echo $_POST['custname']; ?>" required/>
				</div>
				<div><p>&nbsp;</p></div>
				<div>
					<label style="width:60px;"><span class="required">*</span>E-mail :</label>
					<input type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required/>
				</div>
				<div><p>&nbsp;</p></div>
				<div><!--email (optional)--><!--phone Number (required)-->
					<label style="width:60px;"><span class="required">*</span>Date :</label>
					<input type="text" name="cdate" class="datepicker" value="<?php if (isset($_POST['cdate'])) echo $_POST['cdate']; ?>" required/>
					<script>
						$(function() {
							$( ".datepicker" ).datepicker();
						});
					</script>
				</div>
				<div><p>&nbsp;</p></div>
				<div><!--phone Number (required)-->
					<label style="width:60px;"><span class="required"></span>&nbsp;</label>
					<span style="color:#eee; margin-left:3px">Area</span> 
					<span style="width:27px;"></span> 
					<span style="color:#eee; margin-left:15px">Local</span> 
				</div>
				<div><!--phone Number (required)-->
					<label style="width:60px;"><span class="required"></span>&nbsp;</label>
					<span style="color:#eee; margin-left:3px">Code</span> 
					<span style="width:27px;"></span> 
					<span style="color:#eee; margin-left:11px">Number</span> 
				</div>
				<div><!--phone Number (required)-->
					<label style="width:60px;"><span class="required">*</span>Phone :</label>								
					<input style="width: 30px;" type="text" maxlength="3" name="c_area" value="<?php if (isset($_POST['c_area'])) echo $_POST['c_area']; else echo""; ?>" required />
					<input style="width: 30px; margin-left: 15px;" type="text" maxlength="3" name="c_local3" value="<?php if (isset($_POST['c_local3'])) echo $_POST['c_local3']; else echo""; ?>" required />
					<input style="width: 35px; margin-left: 10px;:;" type="text" maxlength="4" name="c_local4" value="<?php if (isset($_POST['c_local4'])) echo $_POST['c_local4']; else echo""; ?>" required />
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
				</div>
				<div><p>&nbsp;</p></div>
				<div><!--notes duty (optional)-->
					<label for="notes"><span class="optional">&nbsp;</span>Note :</label>
				</div>
				<div>
					<textarea name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"rows="3" ></textarea>
				</div>
				<div class="button">
					<button type="submit">Email Now</button>
				</div>
			</form>
		</div>
	</div>
</div>	<div class=clear></div>
<?php
}  
?>
<!-- end collapsible -->
<!--page Collapse-->
<script src="js/page-collapse/highlight.pack.js" type="text/javascript"></script>
<script src="js/page-collapse/jquery.cookie.js" type="text/javascript" ></script>
<script src="js/page-collapse/jquery.collapsible.js" type="text/javascript" ></script>
<script src="js/page-collapse/custom-collapse.js" type="text/javascript"></script>