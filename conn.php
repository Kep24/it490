<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

$request = array();
$request['type'] = "login";
$request['username'] = $_POST["user"];
$request['password'] = $_POST["password"];
$response = $client->send_request($request);

echo "client received response: ".PHP_EOL;
print_r($response);echo "\n\n";

echo $argv[6]." END".PHP_EOL;
 
?>
