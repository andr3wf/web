<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Головна сторінка</title>
</head>
<body>
	<hav>
		<fieldset>
			<legend>Список статей</legend>
			<?php
				$titles = fopen("articles.txt", "r");
				$data = [];
				while(!feof($titles))
				{
					$data[] = fgets($titles);
				}
				for($i = 0; $i < count($data); $i++)
				{
					$title = $data[$i];
					echo "<a href=\"article.php?id=" . $title . "\">" . $title . "</a><br>";
					$article = trim(str_replace(" ", "-", $title));
					if( $article != "")
					{
						$bodies = fopen("articles/" . $article . ".txt", "r") or exit();
						$body = fgets($bodies, 50);
						echo $body . "...<br>";
						fclose($bodies);
					}
				}
				fclose($titles);
			?>
		</fieldset>
	</hav>
</body>
</html>