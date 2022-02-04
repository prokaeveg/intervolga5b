<?php
	include 'config.php';
	try
    {
		$dbConnection = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";", DB_USER, DB_PASS);
	}
	catch (PDOException $e)
    {
		print "Error: ". $e->getMessage();
		die();
	}
?>