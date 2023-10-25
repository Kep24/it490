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
function doLogin($user, $password){
	$password_hashed = password_hash($password, PASSWORD_DEFAULT);
	$query = "SELECT Username, Password FROM Users where Username = :user && Password = :password_hashed"
	$stmt = $mysqli->prepare($query);
	$stmt->execute();
	$stmt->bind_result($n1, $p1);
	$stmt->fetch();
	if (password_verify($password, $p1)){
		return false;
	} else {
		return true;
	}
}

function requestProcessor($request)
	var_dump($request)
	if(!isset($request['type']))
  {
    $log = "ERROR: unsupported message type";
    $client_log->publish($log);
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
	$client_login = new rabbitMQClient("testRabbitMQ.ini", "Database");
	$client_login->process_requests('requestProcessor'); 
	if $log = null{
	$log = "Connection Successful. Red testing";
	$client_log->publish($log);}
	exit();
	
?>
