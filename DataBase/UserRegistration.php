//DataBase Connection

<?php 
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$client_log = new rabbitMQClient("logging.ini", "Logging");



	$dbhost = "localhost"; 
	$dbuser = "yessica"; 
	$dbpass = "NJIT";
	$dbname = "IT490"; 

	//Creating connection with DataBase
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
		
	
	//Verifying connection
	if (!$conn) 
	{
	$log = "Connection Failed: " . mysqli_connect_error();
	$client_log->publish($log);
		die("Connection Failed: " . mysqli_connect_error()); 
	}

	echo "Connection Successful. Welcome!"; 
	
?>
