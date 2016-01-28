<?php
function store_email($tempcust, $tempemail, $tempphone, $tempdate, $tempdesc)
{                                    /* Function that accept the value from add.php */                                         
	//$data = file('/home/secret/topsecret');
	$uid = 'root';
	$pw = 'adminuser';             /* Getting mysql data from topsecret file */
	$dbserver = 'localhost';      /* Initializing the file in different variables */
	$dbname = 'inandout';

	$connect = mysqli_connect($dbserver, $uid, $pw, $dbname) or die('Could not connect: ' . mysql_error());

	$custname = mysqli_real_escape_string($connect, trim($tempcust));
	$email = mysqli_real_escape_string($connect, trim($tempemail));
	$phone = mysqli_real_escape_string($connect, trim($tempphone));                                  /* This will insert the value that been enter from add.php to mysql table inventory */  
	$desc = mysqli_real_escape_string($connect, trim($tempdesc));
	$date = mysqli_real_escape_string($connect, trim($tempdate));
	$mgrcomment = "";
	$status = "n";

	$sql_query = "INSERT INTO emailus VALUES ('auto','$custname','$email','$phone', '$date', '$desc', '$mgrcomment', '$status')";

	$run = mysqli_query($connect, $sql_query) or die('query failed inserting'. mysql_error());   /* run it after the insert */

	mysqli_close($connect);   /* and close the connection soon it updated */
}
function store_booking($temp_fname, $temp_lname, $temp_email, $temp_phone, $temp_date, $temp_time,
		              $temp_pickhome, $temp_pickrooms, $temp_paddress, $temp_punit, $temp_pcity, $temp_ppostal, $temp_pelevator, $temp_pparking,
		              $temp_drophome, $temp_droprooms, $temp_daddress, $temp_dunit, $temp_dcity, $temp_ppostal, $temp_delevator, $temp_dparking,
		              $temp_desc)
{
    /* Function that accept the value from add.php */                                         
	//$data = file('/home/secret/topsecret');
	$uid = 'root';
	$pw = 'adminuser';             /* Getting mysql data from topsecret file */
	$dbserver = 'localhost';      /* Initializing the file in different variables */
	$dbname = 'inandout';

	$connect = mysqli_connect($dbserver, $uid, $pw, $dbname) or die('Could not connect: ' . mysql_error());

	$fname =  mysqli_real_escape_string($connect, trim($temp_fname));
	$lname = mysqli_real_escape_string($connect, trim($temp_lname));
	$email = mysqli_real_escape_string($connect, trim($temp_email));                                  /* This will insert the value that been enter from add.php to mysql table inventory */  
	$phone = mysqli_real_escape_string($connect, trim($temp_phone));
	$date = mysqli_real_escape_string($connect, trim($temp_date));
	$time = mysqli_real_escape_string($connect, trim($temp_time));

	$pickhome =  mysqli_real_escape_string($connect, trim($temp_pickhome));
	$pickrooms = mysqli_real_escape_string($connect, trim($temp_pickrooms));
	$paddress = mysqli_real_escape_string($connect, trim($temp_paddress));                                  /* This will insert the value that been enter from add.php to mysql table inventory */  
	$punit = mysqli_real_escape_string($connect, trim($temp_punit));
	$pcity = mysqli_real_escape_string($connect, trim($temp_pcity));
	$ppostal = mysqli_real_escape_string($connect, trim($temp_ppostal));
	$pelevator = mysqli_real_escape_string($connect, trim($temp_pelevator));
	$pparking = mysqli_real_escape_string($connect, trim($temp_pparking));

	$drophome =  mysqli_real_escape_string($connect, trim($temp_drophome));
	$droprooms = mysqli_real_escape_string($connect, trim($temp_droprooms));
	$daddress = mysqli_real_escape_string($connect, trim($temp_daddress));                                  /* This will insert the value that been enter from add.php to mysql table inventory */  
	$dunit = mysqli_real_escape_string($connect, trim($temp_dunit));
	$dcity = mysqli_real_escape_string($connect, trim($temp_dcity));
	$dpostal = mysqli_real_escape_string($connect, trim($temp_dpostal));
	$delevator = mysqli_real_escape_string($connect, trim($temp_delevator));
	$dparking = mysqli_real_escape_string($connect, trim($temp_dparking));

	$desc = mysqli_real_escape_string($connect, trim($temp_desc));
	$status = "n";

	$sql_query = "INSERT INTO booking VALUES ('auto','$fname','$lname','$email', '$phone', '$date', '$time',
												'$pickhome', '$pickrooms', '$paddress', '$punit', '$pcity', '$ppostal', '$pelevator', '$pparking',
												'$drophome', '$droprooms', '$daddress', '$dunit', '$dcity', '$dpostal', '$delevator', '$dparking',
												'$desc', '$status')";

	$run = mysqli_query($connect, $sql_query) or die('query failed inserting'. mysql_error());   /* run it after the insert */

	mysqli_close($connect);   /* and close the connection soon it updated */
}
?>