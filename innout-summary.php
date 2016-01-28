<?php session_start(); 
if(!$_POST && !$_SESSION) {
	header('Location:innout-booking-step1.php');
}
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
	</head>
	<body>
		<!-- top menu-->
		<div id="include_menu" ></div>
			
		<div class=container>
			<div style="padding:20px 0px 20px 0px; color:#666;"> Booking comfirmation has sent to <?php echo $_SESSION['email']; ?>.	</div>
			<div class=container>
				<div class="column-1">					
					<div class="customer-info detail">
						<span class="title">Summary:</span>
						<div id="c_name" class="c_name" style="font-wieght:700; font-size:200%; margin-left:10px;">
							<?php echo htmlentities($_SESSION['fname']). ' ' .htmlentities($_SESSION['lname']);?>
						</div>
						<p class="c_date" style="font-wieght:700; font-size:200%;">
							<span id="m_date"><?php echo htmlentities($_SESSION['date']); ?></span>
							@<span id="m_time"><?php echo htmlentities($_SESSION['time']); ?></span>
						</p>
						<div class="contact-info">
							<div style=" margin:0px 16px;">
								<img src="images/background/in_and_out_phone.png" alt="" width=30px height=30px/>
								<span style="margin-top:10px;">cell:</span>
								<span id="c_phone" class="phone_number" style="margin-top:10px;"><?php echo htmlentities($_SESSION['phone']); ?></span>
							</div>
							
							<div style=" margin:0px 16px;">
								<img src="images/background/in_and_out_email.png" alt="" width=30px height=30px/>
								<span id="c_email" class="email_address" style="margin-top:10px;"><?php echo htmlentities($_SESSION['email']); ?></span>
							</div>
							
						</div>
					</div>									
				</div>
				<div class="column-2">
					<span>&nbsp;</span>
				</div>
				<div class="column-3">
					<div class="you_get detail" >
						<div style="width:200px; float:left; margin:0px ;margin-right:5px;">
							<div style="font-size:170%"><?php echo htmlentities($_SESSION['pick_rooms']).' '. htmlentities($_SESSION['pick_home']). ' '; ?>Plan : </div>
						</div>
						<span style="width:64px; float:left; margin:0px;" 
						      class="green-font">You get:</span> 	
						<div style="width:156px; float:left; margin-left: 10px;">
							<div id="you_get">
								<?php
									echo "<p>2 Movers</p>";
									echo "<p>16ft Truck</p>";
									echo "<p>5 Hours of moving</p>";
									echo "<p>50 Boxes</p>";
									echo "<p>2 Wardrobe</p>";
									echo "<p>Box Delivery</p>";
									echo "<p>Mattress Covers</p>";
									echo "<p>Furniture Wrapping</p>";
									echo "<p>Basic Tools</p>";
									echo "<p>Handy Service</p>";
									echo "<p>Fast Friendly Service</p>";
								?>
							</div>
							<div class="pink-font">
								<span>Time additional to "You get hours" is billed at a rate of $65 per half hour.</span>
							</div>
						</div>
						<div class=clear></div>
					</div>
				</div>
				<div class=clear></div>
			</div>
			<!-- pick up -->
			<div class=container>
				<div class="column-1">					
					<div class="start-location">
						<span class="title">Pick-up Location:</span><br/>
						<div id="pick_home" class="type_of_home" style="font-wieght:700; font-size:200%;"><?php echo htmlentities($_SESSION['pick_rooms']).' '. htmlentities($_SESSION['pick_home']); ?></div><br/>
						<div id="pick_address" class="start-address" style="font-size:150%;">
							<?php 
							if($_SESSION['p_unit'] != "") { 
								echo "Unit-". htmlentities($_SESSION['p_unit']). ' '. htmlentities($_SESSION['p_address']). ', '. htmlentities($_SESSION['p_city']);
							} else {
								echo htmlentities($_SESSION['p_address']). ', '. htmlentities($_SESSION['p_city']);
							}
							?>
						</div>
						<div class="detail">
							<span id="pick_desc"><?php echo htmlentities($_SESSION['description']); ?></span>
						</div>
					</div>										
				</div>
				<div class="column-2">
					<span>
						<?php
							if($_SESSION['pick_elevator'] == "y") { 
								echo "E <br/>";
							} else if($_SESSION['pick_elevator'] == "n") {
								echo "NE <br/>";
							} else if($_SESSION['pick_elevator'] == "") {
								echo "NE";
							}
							if($_SESSION['pick_parking'] == "y") { 
								echo "P <br/>";
							} else if($_SESSION['pick_parking'] == "n") {
								echo "NP <br/>";
							} else if($_SESSION['pick_parking'] == "") {
								echo "NP";
							}
						?>
					</span>
				</div>
				<div class="column-3">
					<?php
					$latitude = '';
					$longitude = '';
					$iframe_width = '450px';
					$iframe_height = '300px';
					$address = htmlentities($_SESSION['p_address']). ' '. htmlentities($_SESSION['p_city']);
					$address = urlencode($address);
					$key = "AIzaSyC3iFuplIPFhd6rhjB620pK7Ywuu5wysQI";
					$url = "http://maps.google.com/maps/geo?q=".$address."&output=json&key=".$key;
					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HEADER,0);
					curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
					// Comment out the line below if you receive an error on certain hosts that have security restrictions
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

					$data = curl_exec($ch);
					curl_close($ch);

					$geo_json = json_decode($data, true);

					// Uncomment the line below to see the full output from the API request
					// var_dump($geo_json);

					// If the Json request was successful (status 200) proceed
					//if ($geo_json['Status']['code'] == '200') {

						$latitude = $geo_json['Placemark'][0]['Point']['coordinates'][0];
						echo $latitude;
						$longitude = $geo_json['Placemark'][0]['Point']['coordinates'][1]; 
						echo $longitude;
					?>

					<iframe width="<?php echo $iframe_width; ?>" height="<?php echo $iframe_height; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q
					&amp;source=s_q
					&amp;hl=en
					&amp;geocode=
					&amp;q=<?php echo $address; ?>
					&amp;aq=0
					&amp;ie=UTF8
					&amp;hq=
					&amp;hnear=<?php echo $address; ?>
					&amp;t=m
					&amp;ll=<?php echo $longitude; ?>,<?php echo $latitude; ?>
					&amp;z=16
					&amp;iwloc=
					&amp;output=embed"></iframe>

					<?php

					//}
					// else { echo "<p>No Address Available</p>";}

					?>
				</div>
				<div class=clear></div>
			</div>
			<!-- drop off -->
			<div class=container>
				<div class="column-1">					
					<div class="end-location">
						<span class="title">Drop-off Location:</span><br/>
						<p id="drop_home" class="type_of_home" style="font-wieght:700; font-size:200%;"><?php echo htmlentities($_SESSION['drop_rooms']).' '. htmlentities($_SESSION['drop_home']); ?></p><br/>
						<p id="drop_address" class="end-address" style="font-size:150%;">
							<?php 
							if($_SESSION['d_unit'] != "") { 
								echo "Unit-". htmlentities($_SESSION['d_unit']). ' '. htmlentities($_SESSION['d_address']). ', '. htmlentities($_SESSION['d_city']);
							} else {
								echo htmlentities($_SESSION['d_address']). ', '. htmlentities($_SESSION['d_city']);
							}
							?>
						</p>
						<div class="detail">
							<span id="drop_desc"></span>
						</div>
					</div>							
				</div>
				<div class="column-2">
					<span>
						<?php
							if($_SESSION['drop_elevator'] == "y") { 
								echo "E <br/>";
							} else if($_SESSION['drop_elevator'] == "n") {
								echo "NE <br/>";
							} else if($_SESSION['drop_elevator'] == "") {
								echo "NE";
							}
							if($_SESSION['drop_parking'] == "y") { 
								echo "P <br/>";
							} else if($_SESSION['drop_parking'] == "n") {
								echo "NP <br/>";
							} else if($_SESSION['drop_parking'] == "") {
								echo "NP";
							}
						?>
					</span>
				</div>
				<div class="column-3">
					<?php
					$latitude = '';
					$longitude = '';
					$iframe_width = '450px';
					$iframe_height = '300px';
					$address = htmlentities($_SESSION['d_address']). ' '. htmlentities($_SESSION['d_city']);
					$address = urlencode($address);
					$key = "AIzaSyC3iFuplIPFhd6rhjB620pK7Ywuu5wysQI";
					$url = "http://maps.google.com/maps/geo?q=".$address."&output=json&key=".$key;
					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HEADER,0);
					curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
					// Comment out the line below if you receive an error on certain hosts that have security restrictions
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

					$data = curl_exec($ch);
					curl_close($ch);

					$geo_json = json_decode($data, true);

					// Uncomment the line below to see the full output from the API request
					// var_dump($geo_json);

					// If the Json request was successful (status 200) proceed
					//if ($geo_json['Status']['code'] == '200') {

						$latitude = $geo_json['Placemark'][0]['Point']['coordinates'][0];
						echo $latitude;
						$longitude = $geo_json['Placemark'][0]['Point']['coordinates'][1]; 
						echo $longitude;
					?>

					<iframe width="<?php echo $iframe_width; ?>" height="<?php echo $iframe_height; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q
					&amp;source=s_q
					&amp;hl=en
					&amp;geocode=
					&amp;q=<?php echo $address; ?>
					&amp;aq=0
					&amp;ie=UTF8
					&amp;hq=
					&amp;hnear=<?php echo $address; ?>
					&amp;t=m
					&amp;ll=<?php echo $longitude; ?>,<?php echo $latitude; ?>
					&amp;z=16
					&amp;iwloc=
					&amp;output=embed"></iframe>

					<?php

					//}
					// else { echo "<p>No Address Available</p>";}
					session_destroy();
					?>

				</div>
				<div class=clear></div>
			</div>
		</div>	<div class=clear></div>
		
		<!--footer-->
		<div id="include_above_footer" ></div>
		<!--footer-->
		<div id="include_footer" ></div>

		<!-- The JavaScript -->
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC3iFuplIPFhd6rhjB620pK7Ywuu5wysQI&sensor=true&callback=handleApiReady"></script>
		<!-- the mousewheel plugin - optional to provide mousewheel support-->
		<script src="js/jquery.mousewheel.js" type="text/javascript"></script> 
	</body>
</html>