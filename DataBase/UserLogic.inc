#!/usr/bin/php

<?php 
require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');

//Database conenction setup 
 $client_log = new rabbitMQClient("testRabbitMQ.ini", "Logging");
	$dbuser = "yessica"; 
	$dbpass = "NJITserver2024@!"; 

	//Creating connection with Database
	try{
	$conn = new PDO('mysql:dbname=IT490;host=10.147.20.57', $dbuser, $dbpass); 
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
	try{
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	}catch (Exception $e){ 
	$log = "Caught Exception: ". $e->getMessage();
	$client_log->publish($log);}
	$client_log->publish($hashedPassword);
	try{
	$stmt = $conn->prepare("INSERT INTO Users (UserNames, Email, Passwords) Values (:username, :email, :password)");
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $hashedPassword);
	$stmt->execute();
	}catch (PDOException $e){
	$log = "Caught Exception: ". $e->getMessage();
	print $log;
	$client_log->publish($log);
	}
} 
?>

