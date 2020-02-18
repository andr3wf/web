<?php
	require_once('alcoholic.php');
	session_start();
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['Pimage'] = $_POST['image'];
	$_SESSION['Cimage'] = mt_rand(0, 2);
	$_SESSION['Php'] = 10;
	$_SESSION['Chp'] = 10;
	$_SESSION['raund'] = 1;
	header("Location: game.php");