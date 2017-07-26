<?php

// Задача 1
echo '<h1>Задача 1</h1>';

/*
* Получаем текущий час в виде строки от 00 до 23
* и приводим строку к целому числу от 0 до 23
*/
$hour = (int)strftime('%H');
$welcome = ''; // Инициализируем переменную для приветствия

if ($hour < 6) {
	$welcome = 'Доброй ночи';
} elseif ($hour >= 6 && $hour < 12) {
	$welcome = 'Доброе утро';
} elseif ($hour >= 12 && $hour < 18){
	$welcome = 'Добрый день';
} elseif ($hour >= 18 && $hour < 23){
	$welcome = 'Добрый вечер';
} else {
	$welcome = 'Доброй ночи';
}

echo "<h2>$welcome, Гость!</h2>";

// Задача 2
echo '<h1>Задача 2</h1>';

$leftMenu = array(
	'home'=>'index.php', 
	'about'=>'about.php', 
	'contacts'=>'contact.php',
	'table'=>'table.php',
	'calc'=>'calc.php'
);

echo '<ul>';
echo "<li><a href='".$leftMenu['home']."'>Домой</a></li>";
echo "<li><a href='".$leftMenu['about']."'>О нас</a></li>";
echo "<li><a href='".$leftMenu['contacts']."'>Контакты</a></li>";
echo "<li><a href='".$leftMenu['table']."'>Таблица</a></li>";
echo "<li><a href='".$leftMenu['calc']."'>Калькулятор</a></li>";
echo '</ul>';

// Задача 3
echo '<h1>Задача 3</h1>';

$date = mt_rand(1,9);

switch($date){
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
		echo 'Это рабочий день';
		break;
	case 6:
	case 7:
		echo 'Это выходной день';
		break;
	default:
		echo 'День не определен!';
}

// Задача 4
echo '<h1>Задача 4</h1>';

$num1 = mt_rand(0,100);
$num2 = mt_rand(0,100);

echo 'Остаток от деления числа '.$num1.' на 3 = '.($num1 % 3).'<br>';
echo 'Остаток от деления числа '.$num1.' на 5 = '.($num1 % 5).'<br>';
echo 'Число '.$num1.' + 30% = '.($num1 * 1.3).'<br>';
echo 'Число '.$num1.' + 120% = '.($num1 * 2.2).'<br>';
echo '40% от числа '.$num1.' + 84% от числа '.$num2.' = '.($num1 * 0.4 + $num2 * 0.84);

// Задача 5
echo '<h1>Задача 5</h1>';

$num1 = mt_rand(0,100);
$num2 = mt_rand(0,100);

if ($num1 > 10) {
	echo 'Число '.$num1.' + 100 = '.($num1 + 100).'<br>';
} else {
	echo 'Число '.$num1.' - 30 = '.($num1 - 30).'<br>';
}

if ($num1 % 2 == 0) {
	echo 'Число '.$num1.' / 2 = '.($num1 / 2).'<br>';
} else {
	echo 'Число '.$num1.' * 3 = '.($num1 * 3).'<br>';
}

if ($num1 > 10 && $num1 < 30) {
	echo '0<br>';
} elseif ($num1 < 50) {
	echo 'Число '.$num1.' в квадрате = '.($num1 * $num1).'<br>';
} else {
	echo 'Ошибка<br>';
}

if ($num1 > $num2) {
	echo "Число $num1 больше чем число $num2<br>";
} elseif ($num2 > $num1) {
	echo "Число $num2 больше чем число $num1<br>";
} else {
	echo "Число $num1 рано числу $num2<br>";
}

if(abs($num1 - $num2) == 100) {
	echo "Да. Числа $num1 и $num2 отличаются на 100<br>";
} else {
	echo "Нет. Числа $num1 и $num2 не отличаются на 100<br>";	
}

if(abs($num1 - $num2) <= 20) {
	echo "Да. Числа $num1 и $num2 отличаются не более чем на 20<br>";
} else {
	echo "Нет. Числа $num1 и $num2 отличаются более чем на 20<br>";	
}

switch($num1){
	case 1:
	case 2:
	case 12:
		echo 'Зима<br>';
		break;
	case 3:
	case 4:
	case 5:
		echo 'Весна<br>';
		break;
	case 6:
	case 7:
	case 8:
		echo 'Лето<br>';
		break;
	case 9:
	case 10:
	case 11:
		echo 'Осень<br>';
		break;
	default:
		echo 'Ошибка<br>';
}

$denom = sin(2 * $num1) + abs($num1);

if ($denom == 0) {
	echo 'Знаменатель в выражении равен нулю';
} else {
	$rez = $num1 * $num1 - 4 * sqrt($num2 - 1) / $denom;
	echo "Значение выражения = $rez";
}

// Задача 6
echo '<h1>Задача 6</h1>';

echo '<table border = 1>';
echo '<tr>';
	echo '<th>Выражение</th>';
	echo '<th>gettype()</th>';
	echo '<th>empty()</th>';
	echo '<th>isset()</th>';
	echo '<th>boolean:if($x)</th>';
echo '<tr>';
$x = "";
echo '<tr>';
	echo '<td>$x = ""</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = null;
echo '<tr>';
	echo '<td>$x = null</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';

echo '<tr>';
	echo '<td>$x = неопределена</td>';
	echo '<td>'.gettype($y).'</td>';
	echo '<td>'.((empty($y))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($y))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($y)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = array();
echo '<tr>';
	echo '<td>$x = array()</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = false;
echo '<tr>';
	echo '<td>$x = false</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = true;
echo '<tr>';
	echo '<td>$x = true</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = 1;
echo '<tr>';
	echo '<td>$x = 1</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = 42;
echo '<tr>';
	echo '<td>$x = 42</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = 0;
echo '<tr>';
	echo '<td>$x = 0</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = -1;
echo '<tr>';
	echo '<td>$x = -1</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = "1";
echo '<tr>';
	echo '<td>$x = "1"</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = "0";
echo '<tr>';
	echo '<td>$x = "0"</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = "-1";
echo '<tr>';
	echo '<td>$x = "-1"</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = "php";
echo '<tr>';
	echo '<td>$x = "php"</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = "true";
echo '<tr>';
	echo '<td>$x = "true"</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
$x = "false";
echo '<tr>';
	echo '<td>$x = "false"</td>';
	echo '<td>'.gettype($x).'</td>';
	echo '<td>'.((empty($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.((isset($x))?"TRUE":"FALSE").'</td>';
	echo '<td>'.(($x)?"TRUE":"FALSE").'</td>';
echo '<tr>';
echo '</table>';

// Задача 7
echo '<h1>Задача 7</h1>';

$num1 = mt_rand(0,100);
$num2 = mt_rand(0,100);
$num3 = mt_rand(0,100);

if ($num1 >= $num2 && $num1 <= $num3) {
	echo "Число $num1 находится между числами $num2 и $num3";
} elseif ($num1 >= $num3 && $num1 <= $num2) {
	echo "Число $num1 находится между числами $num3 и $num2";
} elseif ($num2 >= $num1 && $num2 <= $num3) {
	echo "Число $num2 находится между числами $num1 и $num3";
} elseif ($num2 >= $num3 && $num2 <= $num1) {
	echo "Число $num2 находится между числами $num3 и $num1";
} elseif ($num3 >= $num1 && $num3 <= $num2) {
	echo "Число $num3 находится между числами $num1 и $num2";
} elseif ($num3 >= $num2 && $num3 <= $num1) {
	echo "Число $num3 находится между числами $num2 и $num1";
}

// Дополнительная задача 1
echo '<h1>Дополнительная задача 1</h1>';

$str = 'test word';
$cnt = iconv_strlen($str);

for ($i=1; $i <= $cnt; $i++) { 
	echo substr($str, -$i, 1);
}

// Дополнительная задача 2
echo '<h1>Дополнительная задача 2</h1>';

$num10 = mt_rand(0,1000);
$num2 = '';
$bit = null;

echo "$num10(10) = ";

while ($num10 != 0) {
	$bit = $num10 % 2;
	$num10 = intval($num10 / 2);
	$num2 = $bit.$num2;
}

echo "$num2(2)";

// Дополнительная задача 3
echo '<h1>Дополнительная задача 3</h1>';

$str = '1234567890';
$arr = array();
$cnt = iconv_strlen($str);
$start = 0;
$length = 1;

while ($start < $cnt) {
	$arr[] = substr($str, $start, $length);
	$start = $start + $length;
	$length += 1;
}

echo '<pre>';
print_r($arr);
echo '</pre>';

?>