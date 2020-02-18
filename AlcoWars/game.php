<?php
	session_start();
	$images = ['images/bomj1.jpg', 'images/bomj2.jpg', 'images/bomj3.jpg'];
	$history = "";
	if( isset($_POST['button']))
	{
		$_SESSION['raund']++;
		$def = mt_rand(1, 3);
		if( $_POST['button'] != $def)
		{
			$demage = mt_rand(1, 4);
			$_SESSION['Chp'] -= $demage;
			switch( $_POST['button']) 
			{
				case 1:
					$history .= "Ви вдарили по голові<br>"; 
					break;
				case 2:
					$history .= "Ви вдарили по корпусу<br>"; 
					break;
				case 3:
					$history .= "Ви вдарили по ногам<br>"; 
					break;
			}
			$history .= "Ваш опонент отримав " . $demage . " урону";
			if( $_SESSION['Chp'] <= 0)
				header("Location: end.php");
		}
		else
		{
			$demage = mt_rand(1, 4);
			$_SESSION['Php'] -= $demage;
			switch( $def) 
			{
				case 1:
					$history .= "Вас вдарили по голові<br>"; 
					break;
				case 2:
					$history .= "Вас вдарили по корпусу<br>"; 
					break;
				case 3:
					$history .= "Вас вдарили по ногам<br>"; 
					break;
			}
			$history .= "Ви отримали " . $demage . " урону";
			if( $_SESSION['Php'] <= 0)
				header("Location: end.php");
		}
	}
	echo "<center><h2>Raund " . $_SESSION['raund'] . "</h2></center>"; 
?>

<center>
	<div class="player" style="float: left; width: 200px">
	<img src="<?php echo $images[$_SESSION['Pimage']]; ?>" width="200" height="300"><br>
	<?php echo $_SESSION['name'] . " " . $_SESSION['Php'] . " hp"; ?>
</div>
<div class="computer" style="margin-right: 200px">
	<img src="<?php echo $images[$_SESSION['Cimage']]; ?>" width="200" height="300"><br>
	Computer
	<?php echo $_SESSION['Chp'] . " hp"?>
</div>
<div>
	<form method="POST" action="<?php $_SERVER['SCRIPT_NAME']; ?>">
		Виберіть тип удару: <br>
		<button type="submit" name="button" value="1">Удар по голові</button>    
		<button type="submit" name="button" value="2">Удар по корпусу</button>
		<button type="submit" name="button" value="3">Удар по ногам</button>
	</form>
</div>
<?php echo $history; ?>
</center>