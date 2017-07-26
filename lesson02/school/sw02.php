<?php
header('Content-Type: text/html; charset=utf-8');

//$name = 'vasya';
//$age = 19;

//echo gettype($name);
//var_dump($age)

//echo (float)$name;

/*$retVal = ($name = '') ? $name : $age;

if ($age >= 18) {
	echo 'hello';
} else {
	die('error');
}*/

//echo `ping 127.0.0.1`;

/*if ($age > 0) {
	echo $name
} elseif ($age >10) {
	echo $name
}
*/

/*$time = 25;

switch($time){
	case ($time < 12):
		echo 'Доброе утро!';
		break;
	case ($time >= 12 && $time < 18):
		echo 'Добрый день!';
		break;
	case ($time > 18 && $time < 25):
		echo 'Добрый вечер!';
		break;
	default:
		echo 'Время не определено!';
}

if ($time < 12) {
	echo 'Доброе утро!';
} elseif ($time >= 12 && $time < 18) {
	echo 'Добрый день!';
} elseif ($time > 18 && $time < 25){
	echo 'Добрый вечер!';
} elseif ($time >= 25){
	echo 'Время не определено!';
}
*/

$var = 10;

if (!isset($var)) {
	echo 'Переменная не определена';
} elseif(empty($var)) {
	echo 'Не заданно значение переменной';
} else{
	echo $var;
}




?>