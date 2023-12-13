#!/usr/bin/php

<?php

require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');
require_once('UserLogic.inc');

$client_front = new rabbitMQServer("testRabbitMQ.ini", "Frontend");

?>
