#!/usr/bin/php

<?php 

require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');
require_once('login.php.inc'); 

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
	//$password_hashed = password_hash($password, PASSWORD_DEFAULT);
	//$query = "SELECT Username, Password FROM Users where Username = ? && Password = ?"
	$conn = mysqli_connect('localhost', 'yessica', 'NJITserver2024@!', 'IT490'); 
	$stmt = $conn->prepare("SELECT UserNames, Passwords FROM Users WHERE UserNames = ? && Passwords = ?");
	$stmt->bind_param('ss', $user, $password); 
	$stmt->execute();
	$stmt->bind_result($n1, $p1);
	$stmt->fetch();
	

	//if (password_verify($password, $p1))
	//{
		//return "allow";//}
	//else  {

	if (password_verify($password, $p1)){
			$newhash=password_hash($p1, PASSWORD_DEFAULT);
			return "allow";
		}
		else {
			return "deny";
		}
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
