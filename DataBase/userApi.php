#!/usr/bin/php

<?php

require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');
require_once('UserLogic.inc');

$client_api = new rabbitMQClient("testRabbitMQ.ini", "API");

       $dbuser = "yessica";
       $dbpass = "NJITserver2024@!";

       try{
       	       $conn = new PDO('mysql:dbname=IT490;host=localhost', $dbuser, $dbpass);
	       new rabbitMQClient("testRabbitMQ.ini", "API");
       }catch (PDOException $e){
       $log = "Error: ". $e->getMessage();
       print $log;
       $client_api->publish($log);
       } 
	
?>

