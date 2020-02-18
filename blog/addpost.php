<?php
	$articles = fopen('articles.txt', 'a') or die("Не можливо відкрити файл");
	$title = filter_var(str_replace(" ", "-", $_POST['title']), FILTER_SANITIZE_STRING);
	fputs($articles, filter_var($_POST['title'], FILTER_SANITIZE_STRING) . "\n");
	fclose($articles);
	$body = fopen("articles/" . $title . ".txt", "w") or die("Не можливо відкрити файл");
	fputs($body, filter_var($_POST['body'], FILTER_SANITIZE_STRING)) or die();
	fclose($body);
	echo "Стаття збережена.\nПерейти на <a href=\"index.php\">головну</a>.";