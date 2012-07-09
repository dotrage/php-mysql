<?php
	/*

		Before running this script, setup MySQL a database called test and run the following query on it:
		
		CREATE TABLE `users` (
			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			`name` varchar(100) DEFAULT NULL,
			`city` varchar(100) DEFAULT NULL,
			`state` varchar(2) DEFAULT NULL,
			`zip` varchar(10) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	*/

	require_once("php-mysql.php");

	$connection = array(
		"host" => "localhost",
		"username" => "user",
		"password" => "password",
		"database" => "test"
	);

	$db = new DB($connection);
	
	//Check to see if database is online and available
	$check = $db->check();	
	if ($check){
		if (is_array($check)){
			var_dump($check);	
		}
		else{
			echo "This database service is AVAILABLE";
		}
	}
	else{
		echo "This database service is NOT AVAILABLE";
	}
	
	echo "<hr>";
	
	//Get all records for this query
	$users = $db->results("SELECT * FROM users WHERE name = '%s'","John Doe");
	echo "User List: ";
	var_dump($users);
	
	echo "<hr>";
	
	//Get a single record for this query
	$user = $db->row("SELECT * FROM users WHERE name = '%s'","John Doe");
	echo "User: ";	
	var_dump($user);	
	
	echo "<hr>";
	
	//Get record count for this query
	$user_total = $db->count("SELECT * FROM ysers");
	echo "Users Total: ";
	echo $user_total;
	
	echo "<hr>";
	
	//Update an existing record
	$update = $db->query("UPDATE users SET name = '%s' WHERE key = '%s'","Johnny Doe","John Doe");		
	if ($update){
		echo "Record was updated";
	}
	else{
		echo "Record could not be updated";
	}
	
	echo "<hr>";
	
	//Insert new user record into table
	$insert = $db->query("INSERT INTO users (name,city,state,zip) VALUES ('%s','%s','%s','%s')","John Doe","Denver","CO","80238");
	if ($insert){
		echo "Record was inserted";
	}
	else{
		echo "Record could not be inserted";
	}
?>