<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '123456';
	$db   =  'db_hotel';

	try
	{
		$DBH = new pdo("mysql:host=$host; dbname=$db",$user,$pass);
	}catch(PDOException $e)
	{
		echo "Not Connection...".$e->getMessage();
	}
   
?>