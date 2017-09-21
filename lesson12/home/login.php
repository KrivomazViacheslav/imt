<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require_once 'db.php'
?>

<form method="post">
	<lebel>Логин:</lebel>
	<input type="text" name="login">
	<br><br>
	<lebel>Пароль:</lebel>
	<input type="password" name="password">
	<br><br>
	<input type="submit" name="authorization" value="Авторизация">
</form>

<?php
if(isset($_POST['authorization'])) {

    $arrValues = array();
    $arrValues['login']	   = $_POST['login'];
    $arrValues['password'] = $_POST['password'];
    $errors = validation($arrValues);

    if (count($errors) == 0) {
    	$res = getUser($arrValues['login'], $arrValues['password']);
    	if ($res) {
    		//echo 'Пользователь найден';
    	} else {
    		echo 'Пользователь не найден';
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

function getUser($login, $password) {

	$success = false;

	$link = connect();
	$queryText = "SELECT * FROM `users` WHERE login = '$login'";
	$res = query($link, $queryText);
	$userData = result($res);
	disconnect($link);

	if (!$userData) {
		return $success;	
	}
	
	if (password_verify($password, $userData['password'])) {
		$success = true;
		$_SESSION['id'] = $userData['id'];
		echo 'Здравствуйте ' . $userData['name'] . ', ваш email: ' . $userData['email'];
	}

	return $success;

}
?>