<?php session_start(); 
$area = "";
$local3 ="";
$local4 = "";
$phone = "";
if($_POST) {
	$area = $_POST['c_area'];
	$local3 = $_POST['c_local3'];
	$local4 = $_POST['c_local4'];
	$phone = $area . "" . $local3 . "" .$local4;
	$_SESSION['custname'] = $_POST['custname'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['phone'] = $phone;
	$_SESSION['cdate'] = $_POST['cdate'];
	$_SESSION['description'] = $_POST['description'];

	include 'query.php';
	store_email($_SESSION['custname'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['cdate'], $_SESSION['description']);
}
if(!$_POST && !$_SESSION) {
	header('Location:innout-emailus.php');
}
session_destroy();
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
			    $('#include_quickie_quote').load('quickie_quote.html');
			});
		</script>
	</head>
	<body>
		<!-- top menu-->
		<div id="include_menu" ></div>	

		<div class=container>
			<h2>Contact Information</h2>
			<table>
				<tr>
					<td>Customer name:</td>
					<td><?php echo htmlentities($_SESSION['custname']); ?></td>
				</tr>
				<tr>
					<td>E - mail:</td>
					<td><?php echo htmlentities($_SESSION['email']); ?></td>
				</tr>
				<tr>
					<td>Phone number:</td>
					<td><?php echo htmlentities($_SESSION['phone']); ?></td>
				</tr>
				<tr>
					<td>Date:</td>
					<td><?php echo htmlentities($_SESSION['cdate']); ?></td>
				</tr>
				<tr>
					<td>Decription:</td>
					<td><?php echo htmlentities($_SESSION['description']); ?></td>
				</tr>
			</table>
			
		</div>
		<div style="width:960px; margin:24px auto;">
			<h2><a href="index.html">Go Back to HOME</a></h2>
		</div>
		<aside class="column-2_3">
			<p>&nbsp;</p>		
		</aside>
		<div class="column-3_3">
			<p>&nbsp;</p>
		</div>			
		<?php 
			
		?>
		
		<!--quickie_quote
		<div id="include_quickie_quote" ></div>	-->
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

	</body>
</html>