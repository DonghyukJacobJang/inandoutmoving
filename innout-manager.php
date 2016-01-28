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

					$sql_query = "SELECT * FROM emailus";   /* passing the value of the update sql data */

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
									<div class="datas"><?php echo $row['custname']; ?></div>
									<div class="datas"><?php echo $row['email']; ?></div>									
								</div> <div class="clear"></div>
								<div>
									<label>Date:</label>
									<label>Phone:</label>
								</div>
								<div>
									<div class="datas"><?php echo $row['date']; ?></div>
									<div class="datas"><?php echo $row['phone']; ?></div>
								</div> <div class="clear"></div>
								<div>
									<label>Description:</label>
									<label>Manager Comment:</label>
								</div>
								<div>
									<div class="datas"><?php echo $row['description']; ?></div>
									<div class="datas"><?php echo $row['mgr_comment']; ?></div>
								</div> <div class="clear"></div>
								<div>
									<label>ADD Comment:</label>
								</div>
								<div>

									<form action="stat-change.php?" method="get">
										<input name="id" type=hidden value="<?php echo $row['id'] ?>"/>
										<textarea name="mgrcomment" value="<?php if (isset($_GET['mgrcomment'])) echo $_GET['mgrcomment']; ?>" rows="5" ></textarea>
										<div style="float:right; margin-right:32px; padding:10px;">
											<button type="submit">Save Comment</button>
										</div>
									</form>
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