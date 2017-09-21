<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'db.php'
?>

<form method="post">
	<lebel>Логин:</lebel>
	<input type="text" name="login">
	<br><br>
	<lebel>Имя:</lebel>
	<input type="text" name="name">
	<br><br>
	<lebel>Email:</lebel>
	<input type="text" name="email">
	<br><br>
	<lebel>Пароль:</lebel>
	<input type="password" name="password">
	<br><br>
	<input type="submit" name="registration" value="Регистрация">
</form>

<?php
if(isset($_POST['registration'])) {

    $arrValues = array();
    $arrValues['login']	   = $_POST['login'];
    $arrValues['name']	   = $_POST['name'];
    $arrValues['email']	   = $_POST['email'];
    $arrValues['password'] = $_POST['password'];
    $errors = validation($arrValues);

    if (count($errors) == 0) {
    	$res = addUser($arrValues['login'], $arrValues['name'], $arrValues['email'], $arrValues['password']);
	    if ($res) {
	    	echo 'Пользователь добавлен';
	    } else {
	    	echo 'Пользователь не добавлен';
	    }
	} else {
		displayErrors($errors);	
	}
}

function validation($arrValues) {

	$errors = array();

	foreach ($arrValues as $type => $value) {
		switch ($type) {
			case 'login':
				$pattern = '/^[a-z0-9]{4,}$/i';
				break;
			case 'name':
				$pattern = '/^[а-я-]+$/ui';
				break;
			case 'email':
				$pattern = '/^[a-z0-9.-]+@[a-z0-9-]+\.[a-z0-9-.]+$/i';
				break;
			case 'password':
				$pattern = '/^[a-z0-9\/*?-]{4,}$/i';
				break;
		}
		if (!preg_match($pattern, $value)) {
    		$errors[$type] = 'incorrect';
    	}
	}

	return $errors; 

}

function displayErrors($errors) {
	foreach ($errors as $type => $value) {
		switch ($type) {
			case 'login':
				echo 'Логин некорректный!<br>';
				break;
			case 'name':
				echo 'Имя некорректно!<br>';
				break;
			case 'email':
				echo 'Email некорректный!<br>';
				break;
			case 'password':
				echo 'Пароль некорректный!<br>';
				break;
			default:
				echo 'Тип ошибки не определен!<br>';
		}
    }
}

function addUser($login, $name, $email, $password) {

    $hash = password_hash($password, PASSWORD_DEFAULT);
	$link = connect();
	$queryText = "INSERT INTO `users`(`login`, `name`, `email`, `password`) VALUES ('$login', '$name', '$email', '$hash')";
	$res = query($link, $queryText);
	disconnect($link);

	return $res;

}
?>