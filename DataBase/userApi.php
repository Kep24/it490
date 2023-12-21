#!/usr/bin/php

<?php

require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');
require_once('UserLogic.inc');
	

$client_api = new rabbitMQClient("testRabbitMQ.ini", "API");

$api_client = new rabbitMQServer("testRabbitMQ.ini", "Frontend"); 



       $dbuser = "yessica";
       $dbpass = "NJITserver2024@!";

       try{
       	       $conn = new PDO('mysql:dbname=IT490;host=10.147.20.57', $dbuser, $dbpass);
	       new rabbitMQClient("testRabbitMQ.ini", "API");
       }catch (PDOException $e){
       $log = "Error: ". $e->getMessage();
       print $log;
       $client_api->publish($log);
       }
       
       global $conn, $client_log;
       
       function searchPoke($pokeName){
       $request = array();
	$request['type'] = "info";
	$request['message'] = $pokename;
	$response = $client->send_request($request);
	
	return $responce;
      	}
     


?>

