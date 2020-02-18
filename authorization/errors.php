<?php namespace Authorization;
	function errors($data)
	{
		$errors = [];
		if(trim($data['login']) == "")
			$errors[] = "Введіть логін";
		if(trim($data['email']) == "")
			$errors[] = "Ведіть email";
		if($data['password'] == "")
			$errors[] = "Пароль пустий";
		if($data['password'] !== $data['password_2'])
			$errors[] = "Паролі не співпадають";
		if(empty($errors))
		{
			echo "OK HOKEY";
		}
		else
		{
			echo array_shift($errors);
		} 
	}