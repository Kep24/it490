<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

try {
    $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

    if (!$client) {
        throw new Exception("Failed to creat RabbitMQ client");

    }


$request = array();
$request['type'] = "registration";
$request['username'] = $_POST["user"];
$request['password'] = $_POST["password"];
$request['email'] = $_POST["email"];

$responce = $client->send_request($request);

echo "client received response: ".PHP_EOL;
print_r($request);echo "\n\n";

echo $argv[6]." END".PHP_EOL;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;

}

?>