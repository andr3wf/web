<?php
	session_start();
	$result;
	if( $_SESSION['Chp'] <= 0)
	{
		$result = "Ви виграли";
	}
	else if( $_SESSION['Php'] <= 0)
		$result = "Ви програли";
?>
<div style="color: red">
	<center>
		<h1>
			<?php echo $result; ?>
		</h1>
	</center>
</div>
<center>
	<a href="index.php">Зіграти ще раз</a>
</center>