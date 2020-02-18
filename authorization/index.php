<?php
	if( !isset($_COOKIE['USER']))
		echo "<div>
		<center>
			<a href=\"login.php\">Увійти</a><br>
			<a href=\"signup.php\">Зареєструватися</a>
		</center>
	</div>";
	else 
	{
		echo "<div>
			<center>
				Ви ввійшли як " . $_COOKIE['USER'] . "!
			</center>
		</div>";
		echo "<div>
			<center>
				<a href=\"quit.php\">Вийти</a>
			</center>
		</div>";
	}
?>