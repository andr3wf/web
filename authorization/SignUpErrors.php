<?php 
	namespace Authorization;
	function SignUp_Errors($data)
	{
		$errors = [];
		if(trim(htmlspecialchars($data['login'])) == "")
			$errors[] = "Введіть логін";
		if(strlen(htmlspecialchars(trim($data['login']))) < 5 || strlen(htmlspecialchars(trim($data['login']))) >= 20)
			$errors[] = "Логін повинен містити від 5 до 20 символів";
		if(htmlspecialchars(trim($data['email'])) == "")
			$errors[] = "Ведіть email";
		if(!filter_var(htmlspecialchars(trim($data['email'])), FILTER_VALIDATE_EMAIL))
			$errors[] = "Не правильний формат email";
		if(htmlspecialchars($data['password']) == "")
			$errors[] = "Пароль пустий";
		if(strlen(htmlspecialchars($data['password'])) < 10 || strlen(htmlspecialchars($data['password'])) >= 30)
			$errors[] = "Пароль повинен містити від 10 до 30 символів";
		if(htmlspecialchars($data['password']) !== htmlspecialchars($data['password_2']))
			$errors[] = "Паролі не співпадають";
		if(empty($errors))
			return null;
		return $errors;

	}