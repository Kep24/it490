#!/usr/bin/php

<?php 

require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');
require_once('login.php.inc'); 

$client_log = new rabbitMQClient("logging.ini", "Logging");

	$dbuser = "yessica"; 
	$dbpass = "NJITserver2024@!"; 

	//Creating connection with DataBase
	try{
	$conn = new PDO('mysql:dbname=IT490;host=localhost', $dbuser, $dbpass); 
	}catch (PDOException $e){
	$log = "Error: ". $e->getMessage();
	print $log;
	$client_log->publish($log);
	}
function doLogin($user, $password){
	//$passwordH = password_hash($password, PASSWORD_DEFAULT);
	global $conn, $client_log;
	$stmt = $conn->prepare("SELECT Passwords FROM Users WHERE UserNames = :username && Passwords = :password");
	$stmt->bindParam(':username', $user);
	$stmt->bindParam(':password', $password); //replace with $passwordH when ready
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	//$client_log->publish($result); FIX THIS
	$p1 = $result['Passwords'];
	if ($p1 != null){
		return "allow";
	}
	else{
		return "deny";
	}
	//if (password_verify($password, $result)){
	//	return "allow";
	//	}
	//else { 
	//	return "deny"
	//	}
	}
function requestProcessor($request)
{
	var_dump($request);
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
	$client_login = new rabbitMQServer("testRabbitMQ.ini", "Database");
	$client_login->process_requests('requestProcessor'); 
	if ($log = null){
	$log = "Connection Successful. Red testing";
	$client_log->publish($log);}
	exit();
	
?>
