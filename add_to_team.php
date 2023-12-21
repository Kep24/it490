<?php
//Your database connection code here

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


$pokemon_id = $_GET['id']; // Assuming you pass the Pokémon ID through the URL
$team_name = $_POST['team_name'];

// Check if the Pokémon and team exist in the database, then insert into the teams table
?>
