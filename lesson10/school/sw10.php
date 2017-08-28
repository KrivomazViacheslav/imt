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

    $login    = $_POST['login'];
    $password = $_POST['password'];

    if (!preg_match('/^[a-z0-9]{4,}$/i', $login)) {
    	echo 'Логин не прошел проверку!<br>';
    }
    if (!preg_match('/^[a-z0-9\/*?-]{4,}$/i', $password)) {
    	echo 'Пароль не прошел проверку!<br>';
    }

    $res = addUser($login, $password);

    if ($res) {
    	echo 'Пользователь добавлен';
    } else {
    	echo 'Пользователь не добавлен';
    }
}

if(isset($_POST['authorization'])) {

	$login    = $_POST['login'];
    $password = $_POST['password'];

    if (!preg_match('/^[a-z0-9]{4,}$/i', $login)) {
    	echo 'Логин не прошел проверку!<br>';
    }
    if (!preg_match('/^[a-z0-9\/*?-]{4,}$/i', $password)) {
    	echo 'Пароль не прошел проверку!<br>';
    }

    $res = getUser($login, $password);

    if ($res) {
    	echo 'Пользователь найден';
    } else {
    	echo 'Пользователь не найден';
    }

}    

function addUser($login, $pass) {

    $hash = password_hash($password, PASSWORD_DEFAULT);
	/*$file = fopen('pass.txt', 'a+');
	fwrite($file, $login.'|||'.$hash.'|||'."\r\n");
	fclose($file);*/
	$data = $login.'|||'.$hash.'|||'."\n";
	file_put_contents('pass.txt', $data, FILE_APPEND | LOCK_EX);

	return true;

}

function getUser($login, $pass) {

	$file = fopen('pass.txt', 'r');
	$txt = array();
	while ($line = fgets($file)) {
		   $txt[] = explode('|||', $line);
	}
	fclose($file);

	//var_dump($txt);

	$success = false;
	foreach ($txt as $userData) {
		if ($userData[0] == $login) {
			//print_r($pass);
			if (password_verify($pass, trim($userData[1]))) {
				$success = true;
				//print_r($pass);
			}
		}
	}

	return $success;
}
?>


<?php
/*session_name(md5($_SERVER['HTTP_USER_AGENT']));
session_start();
$_SESSION['admin'] = true;
$_SESSION['test'] = 'test';*/

/*$hash = password_hash('test', PASSWORD_DEFAULT);
echo $hash;
$pass = password_verify('test', $hash);
var_dump($pass);*/


?>