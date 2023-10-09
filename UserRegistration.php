<?php 
session_start(); 

//Include necessary files for RabbitMQ and database connections
require_once 'db.php'; //Contains database conenction code 
require_once 'rabbitmqphp'; //Contains RabbitMQ connection code

if ($_SERVER['REQUEST_METHOD'] === 'POST')

	{	
		$username = $_POST['username']; 
		$email = $_POST['email'];
		$password = $_POST['password']; 

		//Perform input validation (e.g., check for valid email format strong password)
	
		if(isInputValid($username, $email, $password)) {
			//Hash the password for secure storage
			$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
	
			//Insert the new user into the database
			$inserted = createUser($username, $email, $hashedPassword);

			if($inserted) { 
				//Send a message to RabbitNQ for email confirmation or other tasks
				sendRegistrationConfirmation($username); 
				//Redirect to a success page or login page
				header('Location: registration_success.php'); 
				exit; 
			}	
		}			else {
					$error = "User registration failed. Please try again later."; 
			}
	}

?>
