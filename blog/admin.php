<?php
	$data = $_POST;
	if( isset( $data['okbutton']))
	{
		$authorization = fopen("login.txt", "r");
		if(htmlspecialchars(trim($data['login'])) == trim(fgets($authorization)))
		{
			if( md5(htmlspecialchars($data['pass'])) == fgets($authorization))
			{
				header("Location: logining.php");
			}
			else
				echo "<center style=\"color: red\">" . "Ви ввели не правильний пароль" . "</center><tr>";
		}	
		else
		{
			echo "<center style=\"color: red\">" . "Ви ввели не правильний логін " . "</center><tr>";
		}
		fclose($authorization);
	}
?>
<?php if( !@$_COOKIE['admin']) : ?>
<form method="POST" action=<?= $_SERVER['SCRIPT_NAME']; ?>>
	<center>
		<h2>Сторінка авторизації адміна</h2>
		<fieldset style="width: 200px">
			<legend>Введіть данні:</legend>
			<p>
				Введіть логін:<br>
				<input type="text" name="login" required pattern="\[^!@#$%^&*()_]\" minlength="5" maxlength="30" placeholder="Логін">
			</p>
			<p>
				Введіть пароль:<br>
				<input type="password" name="pass" required pattern="\[a-zA-Z0-9@#$&*]\" minlength="10" maxlength="50" placeholder="Пароль">
			</p>
			<p>
				<button type="submit" name="okbutton">Увійти</button>
			</p>
		</fieldset>
	</center>
</form>
<?php else: ?>
<form>
	<center>
		<p>
			Щоб вийти натисніть <a href="quit.php">тут</a>.
		</p>
		<fieldset style="width: 450px">
			<legend">Створення статті:</legend>
			<p>
				<input style="width: 400px" type="text" name="title" required placeholder="Заголовок" formmethod="POST" formaction="addpost.php">
			</p>
			<p>
				<textarea style="width: 400px; height: 600px" name="body" required placeholder="Стаття" formmethod="POST" formaction="addpost.php"></textarea>
			</p>
			<p>
				<button type="submit" name="send" formmethod="POST" formaction="addpost.php">Зберегти</button>
				<button tupe="reset" name="reset">Очистити</button>
			</p>
		</fieldset>	
	</center>
</form>
<?php endif; ?> 