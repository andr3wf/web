<?php
	require_once("DataBase.php");
	$settings = array(
		'host' => 'localhost',
		'dbname' => 'author',
		'user' => 'Andrew',
		'password' => '1234'
	);
	$dataBase = new Authorization\DataBase($settings);
	