#!/usr/bin/php

<?php 
require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');

//Database conenction setup 
 $client_log = new rabbitMQClient("testRabbitMQ.ini", "Logging");
	$dbuser = "red"; 
	$dbpass = "490Pass"; 

	//Creating connection with Database
	try{
	$conn = new PDO('mysql:dbname=it490;host=localhost', $dbuser, $dbpass); 
	}catch (PDOException $e){
	$log = "Error: ". $e->getMessage();
	print $log;
	$client_log->publish($log);
	}


function isInputValid($username, $email, $password) 
{
	try{
	$stmt = $conn->prepare("SELECT UserName, Email, PassWord FROM Users WHERE UserNames = :username && Email=:email Passwords = :password");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $hashedPassword);
		$stmt->execute();
		}catch	(PDOException $e){
	$log = "Error: ". $e->getMessage();
	print $log;
	$client_log->publish($log);
	}
} 

function createUser($username, $email, $password) 
{
	global $conn, $client_log;
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	$client_log->publish($hashedPassword);
	try{
	$stmt = $conn->prepare("INSERT INTO Users (UserNames, Email, Passwords) Values (:username, :email, :password)");
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $hashedPassword);
	$stmt->execute();
	}catch (PDOException $e){
	$log = "Error: ". $e->getMessage();
	print $log;
	$client_log->publish($log);
	}
} 
?>

