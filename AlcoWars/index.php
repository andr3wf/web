<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AlcoWars</title>
</head>
<body>
	<div style="color: red">
		<center>
			<strong><h1>Вас вітає гра Алко Війни!</h1></strong>
		</center>
	</div>
	<div class="choose">
		<form method="POST" action="session.php">
			<center>
				Ведіть ім'я персонажа:<br>
				<input type="text" name="name"><br><br>
				Виберіть аватар пресонажа:<br>
				<img src="images/bomj1.jpg" width="200" height="300">
				<img src="images/bomj2.jpg" width="200" height="300">
				<img src="images/bomj3.jpg" width="200" height="300"><br>
				Персонаж №1<input type="radio" name="image" value="0" checked="">
				Персонаж №2<input type="radio" name="image" value="1">
				Персонаж №3<input type="radio" name="image" value="2"><br><br>
				<button type="submit" name="okbutton">Почати</button>
			</center>
		</form>
	</div>
</body>
</html>