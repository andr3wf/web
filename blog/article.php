<!DOCTYPE html>
<html>
<head>
	<title><?= $_GET['id']; ?></title>
</head>
<body>
	<header>
		| <a href="index.php">Головна</a> | 
	</header>
	<hav>
		<fieldset style="width: 300px; float: left;">
			<legend>Остані статті</legend>
			<?php
				$titles = fopen("articles.txt", "r");
				for($i = 0; $i < 5 || !feof($titles); $i++)
				{
					$title = fgets($titles);
					echo "<a href=\"article.php?id=" . $title . "\">" . $title . "</a><br>";
				}
				fclose($titles)
			?>
		</fieldset>
	</hav>
	<div>
		<fieldset>
			<legend><?= $_GET['id'] ?></legend>
			<?php
				$article = trim(str_replace(" ", "-", $_GET['id']));
				$data = fopen("articles/" . $article . ".txt", "r");
				while(!feof($data))
				{
					$body = fgets($data);
					echo $body;
				}
				fclose($data);
			?>
		</fieldset>
	</div>
</body>
</html>