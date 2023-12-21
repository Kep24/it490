#!/usr/bin/php

<?php 

require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');
require_once('UserLogic.inc');

$client_log = new rabbitMQClient("testRabbitMQ.ini", "Logging");

	$dbuser = "yessica"; 
	$dbpass = "NJITserver2024@!"; 

	//Creating connection with Database
	try{
	$conn = new PDO('mysql:dbname=IT490;host=localhost', $dbuser, $dbpass); 
	new rabbitMQClient("testRabbitMQ.ini", "Logging");}catch (PDOException $e){
	$log = "Error: ". $e->getMessage();
	print $log;
	$client_log->publish($log);
	}

function doLogin($user, $password){
	global $conn, $client_log;
	
	try{
	$stmt = $conn->prepare("SELECT Passwords FROM Users WHERE UserNames = :username");
	$stmt->bindParam(':username', $user);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	catch (PDOException $e){
	$log = "Error: ". $e->getMessage();
	print $log;
	$client_log->publish($log);
	
	}
	$p1 = $result['Passwords'];

	//this is the statement to get a hashed password that needs to be stored in the database!
//	$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); 

	//Gonna comment this out in order to test hashed passwords, UNCOMMENT if code gets broken!!!!!
	if ($p1 == $password){

//	if(password_verify($password, $p1)){
		return "allow";
	}
	else{
		return "deny";
	}
	
	//if (password_verify($password, $p1)){
	//	return "allow";
	//}
	//else{
	//	return "deny";
	//}
}
function requestProcessor($request)
{
	var_dump($request);
	if(!isset($request['type']))
  {
    $log = "ERROR: unsupported message type";
    $client_log->publish($log);
  }
  try{
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
    case "registration":
    	return createUser($request['username'],$request['email'], $request['password']);
  }
  }catch (Exception $e){
  $log = "Error: ". $e->getMessage();
	print $log;
	$client_log->publish($log);}
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
	$client_login = new rabbitMQServer("testRabbitMQ.ini", "Database");
	$client_login->process_requests('requestProcessor'); 
	if ($log = null){
	$log = "NO Errors.";
	$client_log->publish($log);}
?>
