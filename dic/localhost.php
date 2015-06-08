<?php 
	try
	{
		$dsn = 'mysql:dbname=php;host=localhost;port=3306';
		$db = new PDO($dsn, 'root', '');
	}
	catch (PDOException $ex)
	{
		echo "Error: ". $ex->getMessage();
		die();
	}
?>