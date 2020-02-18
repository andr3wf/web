<?php
	require_once('db.php');
	$data = $_POST;
	if(isset($data['okbutton']))
	{
		require_once('SignUpErrors.php');
		$errors = Authorization\SignUp_Errors($data);
		if(empty($errors))
		{	
			$countLogins = $dataBase->getLogin(htmlspecialchars(trim($data['login'])));
			$countEmails = $dataBase->getEmail(htmlspecialchars(trim($data['email'])));
			if ( $countLogins === 0 && $countEmails === 0)
				{
					$dataBase->insertIntoDB(array(':login' => htmlspecialchars(trim($data['login'])), ':email' => htmlspecialchars(trim($data['email'])), ':password' => md5(htmlspecialchars($data['password'])), ':data' => date("Y-m-d")));
					header("Location: success.php");
				}
			else
			{
				if($countLogins > 0)
					echo "<div style=\"background: yellow; color: red\"><center>Користувач з таким логіном вже існує<br></center></div>";
				else if($countEmails > 0)
					echo "<div style=\"background: yellow; color: red\"><center>Користувач з таким Email вже існує<br></center></div>";
			}
		}
		else
			echo "<div style=\"background: yellow; color: red\"><center>" . array_shift( $errors) . "</center></div>";
	}
?>


<form method="POST" action="<?= @$_SERVER['SCRIPT_NAME']; ?>">
	<center>
		<h4><b>Ведіть логін</b>:</h4>
		<input type="text" name="login" placeholder="Логін" value=<?php echo @htmlspecialchars(trim($data['login'])); ?>>
		<h4><b>Ведіть Email</b>:</h4>
		<input type="text" name="email" placeholder="Email" value=<?php echo @htmlspecialchars(trim($data['email'])); ?>>
		<h4><b>Ведіть пароль</b>:</h4>
		<input type="password" name="password">
		<h4><b>Повторіть пароль</b>:</h4>
		<input type="password" name="password_2"><br><br>
		<button type="submit" name="okbutton">Зареєструватись</button>
	</center>
</form>