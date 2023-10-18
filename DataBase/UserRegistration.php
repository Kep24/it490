//DataBase Connection

<?php 

session_start();

	$dbhost = "localhost"; 
	$dbuser = "yessica"; 
	$dbpass = "NJIT";
	$dbname = "IT490"; 

	//Creating connection with DataBase
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
		
	
	//Verifying connection
	if (!$conn) 
	{
		die("Connection Failed: " . mysqli_connect_error()); 
	}

	echo "Connection Successful. Welcome!"; 
	
?>
