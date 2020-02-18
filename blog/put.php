<?php
	$data = fopen('login.txt', "w");
	fputs($data, 'Andrew');
	fputs($data, "\n");
	fputs($data, md5('qwerty1234'));
	fclose($data);