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

			</script>
		</head>
		<body>
			<!-- top menu-->
			<div id="include_menu" ></div>	

			<div class=container>
				<div style="margin-top:32px;">
					<div><h2>Manager Page</h2></div>
					<h2 style="float:left;"><a href="innout-manager.php">Email us</a></h2>
					<span style="float:left; padding-left:12px; padding-right:24px;">&nbsp;</span>
					<h2 style="float:left;"><a href="innout-booking-manager.php">Quickie Quote</a></h2>
					<div class=clear></div>
				</div>
				<div class="column-1_2">
					</br></br>
					<?php

					//$data = file('home/gfencabo/secret/topsecret');
					$uid = 'root';
					$pw = 'adminuser';
					$dbserver = 'localhost';
					$dbname = 'inandout';

					$connect = mysqli_connect($dbserver, $uid, $pw, $dbname) or die('Could not connect: ' . mysql_error());

					$sql_query = "SELECT * FROM booking";   /* passing the value of the update sql data */

					$run = mysqli_query($connect, $sql_query) or die('query failed displaying'. mysql_error());
					?>

					<?php
					while($row = mysqli_fetch_assoc($run))
					{
					?>
					<div class=Booking_info>
						<div class="container1">
							<div class="content1">
								<div>
									<label>Data Base ID:</label>
									<label>Status</label>
								</div>
								<div>
									<div class="datas"><?php echo $row['id']; ?></div>
									<div class="datas_status">
										<a href="stat-change.php?id=<?php echo $row['id'] ?>&status=<?php echo $row['status'] ?>">
											<?php
											if($row['status'] == "n"){
												echo "Unchecked";
											}
											else{
												echo "Checked";
											}
											?>
										</a>
									</div>
								</div> <div class="clear"></div>
								<div>
									<label>Customer Name:</label>
									<label>E-mail:</label>
								</div>
								<div>
									<div class="datas"><?php echo $row['firstname']. " " .$row['lastname']; ?></div>
									<div class="datas"><?php echo $row['email']; ?></div>									
								</div> <div class="clear"></div>
								<div>
									<label>Date:</label>
									<label>Time:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['date']; ?></div>
									<div class="datas"><?php echo $row['time']; ?></div>
									
								</div> <div class="clear"></div>
								<div>
									<label>Description:</label>
									<label>Phone:</label>
								</div>
								<h2>Pick up Detail</h2>
								<div>
									<div class="datas"><?php echo $row['description']; ?></div>
									<div class="datas"><?php echo $row['phone']; ?></div>
								</div> <div class="clear"></div>
								<div>
									<label>Type of home:</label>
									<label>Number of rooms:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['pickhome']; ?></div>
									<div class="datas"><?php echo $row['pickrooms']; ?></div>			
								</div> <div class="clear"></div>
								<div>
									<label>Pick up address:</label>
									<label>Unit#:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['paddress']; ?></div>
									<div class="datas"><?php echo $row['punit']; ?></div>			
								</div> <div class="clear"></div>
								<div>
									<label>Pick up City:</label>
									<label>Postal Code:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['pcity']; ?></div>
									<div class="datas"><?php echo $row['ppostal']; ?></div>			
								</div> <div class="clear"></div>
								<div>
									<label>Pick up Elevator:</label>
									<label>Pick up Parking lot:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['pelevator']; ?></div>
									<div class="datas"><?php echo $row['pparking']; ?></div>			
								</div> <div class="clear"></div>
								<h2>Drop off Detail</h2>
								<div>
									<label>Type of home:</label>
									<label>Number of rooms:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['drophome']; ?></div>
									<div class="datas"><?php echo $row['droprooms']; ?></div>			
								</div> <div class="clear"></div>
								<div>
									<label>Drop off address:</label>
									<label>Unit#:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['daddress']; ?></div>
									<div class="datas"><?php echo $row['dunit']; ?></div>			
								</div> <div class="clear"></div>
								<div>
									<label>Drop off City:</label>
									<label>Postal Code:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['dcity']; ?></div>
									<div class="datas"><?php echo $row['dpostal']; ?></div>			
								</div> <div class="clear"></div>
								<div>
									<label>Drop off Elevator:</label>
									<label>Drop off Parking lot:</label>									
								</div>
								<div>
									<div class="datas"><?php echo $row['delevator']; ?></div>
									<div class="datas"><?php echo $row['dparking']; ?></div>			
								</div> <div class="clear"></div>
								
							</div>
						</div>
					</div> 

					<?php               
					}
					mysqli_close($connect);       /* close the file sql */
					?>
					
				</div>
			</div>
			<aside class="column-2_2">
				<p>&nbsp;</p>		
			</aside>			
		</div>

		
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