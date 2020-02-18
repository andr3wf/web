<?php
	require_once('db.php');
	$data = $_POST;
	if ( isset($data['okbutton']))
	{
		require_once('LogInErrors.php');
		$errors = Authorization\LogIn_Errors($data);
		if(empty($errors))
		{
			$user = $dataBase->logining(htmlspecialchars(trim($data['login'])));
			if( $user['password'] === md5(htmlspecialchars($data['password'])))
				{
					setcookie('USER', $user['login']);
					header("Location: index.php");
				}
			else
				echo "Неправильний логін або пароль";
			if( isset($_COOKIE['USER']))
				echo $_COOKIE['USER'];
		}
		else
			echo "<div style=\"background: yellow; color: red\"><center>" . array_shift( $errors) . "</center></div>";
	}
?>

<form method="POST" action="<?= @$_SERVER['SCRIPT_NAME']; ?>">
	<center>
		<h4><b>Введіть логін</b>:</h4>
		<input type="text" name="login" placeholder="Логін" value="<?php echo @htmlspecialchars(trim($data['login'])); ?>">
		<h4><b>Введіть пароль</b>:</h4>
		<input type="password" name="password" placeholder="Пароль"><br><br>
		<button type="submit" name="okbutton">Увійти</button>
	</center>
</form>