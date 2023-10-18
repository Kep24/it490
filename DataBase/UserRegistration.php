#!/usr/bin/php

<?php 

include_once('rabbitMQLib.inc');

$client_log = new rabbitMQClient("logging.ini", "Logging");

	$dbhost = "localhost"; 
	$dbuser = "yessica"; 
	$dbpass = "NJITserver2024@!";
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
	$log = "Connection Successful. Red testing";
	$client_log->publish($log);
?>
