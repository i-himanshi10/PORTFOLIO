<?php
	//check if the database file exists and create a new if not
	if(!is_file('db/log.db')){
		file_put_contents('db/log.db', null);
	}
	// connecting the database
	$conn = new PDO('sqlite:db/log.db');
	//Setting connection attributes
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//Query for creating reating the member table in the database if not exist yet.
	$query = "CREATE TABLE IF NOT EXISTS DATA(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name TEXT, gender TEXT, mail TEXT, education TEXT, feedback TEXT,  changes TEXT)";
	//Executing the query
	$conn->exec($query);
?>