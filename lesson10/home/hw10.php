<?php header('Content-Type: text/html; charset=utf-8'); ?>

<form method="post">
	<lebel>Логин:</lebel>
	<input type="text" name="login">
	<br><br>
	<lebel>Пароль:</lebel>
	<input type="password" name="password">
	<br><br>
	<input type="submit" name="registration" value="Регистрация">
</form>

<form method="post">
	<lebel>Логин:</lebel>
	<input type="text" name="login">
	<br><br>
	<lebel>Пароль:</lebel>
	<input type="password" name="password">
	<br><br>
	<input type="submit" name="authorization" value="Вход">
</form>

<?php
if(isset($_POST['registration'])) {

    $arrValues = array();
    $arrValues['login']	   = $_POST['login'];
    $arrValues['password'] = $_POST['password'];
    $errors = validation($arrValues);

    if (count($errors) == 0) {
    	$res = addUser($arrValues['login'], $arrValues['password']);
	    if ($res) {
	    	echo 'Пользователь добавлен';
	    } else {
	    	echo 'Пользователь не добавлен';
	    }
	} else {
		displayErrors($errors);	
	}
}

if(isset($_POST['authorization'])) {

    $arrValues = array();
    $arrValues['login']	   = $_POST['login'];
    $arrValues['password'] = $_POST['password'];
    $errors = validation($arrValues);

    if (count($errors) == 0) {
    	$res = getUser($arrValues['login'], $arrValues['password']);
    	if ($res) {
    		echo 'Пользователь найден';
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
				$pattern = '/^[a-z0-9\-]{2,}$/i';
				if (!preg_match($pattern, $value)) {
    				$errors[$type] = 'incorrect';
    			}
				break;
			case 'password':
				$pattern = '/^[a-z0-9]{4,}$/i';
				if (!preg_match($pattern, $value)) {
    				$errors[$type] = 'incorrect';
    			}
				break;
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
			case 'password':
				echo 'Пароль некорректный!<br>';
				break;
			default:
				echo 'Тип ошибки не определен!<br>';
		}
    }
}

function addUser($login, $password) {

    $hash = password_hash($password, PASSWORD_DEFAULT);
	/*$file = fopen('passwords.txt', 'a+');
	fwrite($file, $login.'|||'.$hash.'|||'."\r\n");
	fclose($file);*/
	$data = $login.'|||'.$hash.'|||'."\n";
	$res = file_put_contents('passwords.txt', $data, FILE_APPEND | LOCK_EX);

	return $res;

}

function getUser($login, $password) {

	$file = fopen('passwords.txt', 'r');
	$txt = array();
	while ($line = fgets($file)) {
		   $txt[] = explode('|||', $line);
	}
	fclose($file);

	$success = false;
	foreach ($txt as $userData) {
		if ($userData[0] == $login) {
			if (password_verify($password, $userData[1])) {
				$success = true;
			}
		}
	}

	return $success;

}
?>