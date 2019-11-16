<?php 
		/**
	 * These are the database login details
	 */  
	define("HOST", "localhost");     // The host you want to connect to.
	define("USER", "root");    // The database username. 
	define("PASSWORD", "");    // The database password. 
	define("DATABASE", "manadeeb");    // The database name.	 
	define("CAN_REGISTER", "any");
	define("DEFAULT_ROLE", "member");	 
	define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
	if($dbconn = new mysqli(HOST, USER, PASSWORD, DATABASE)){
	
	}else{
	die("Error: database connection");
	}
		 
	mysqli_query($dbconn,"SET NAMES 'utf8'");
	mysqli_query($dbconn, "SET CHARACTER SET 'utf8mb4'");
	mysqli_set_charset($dbconn, 'utf8mb4');
	

?>