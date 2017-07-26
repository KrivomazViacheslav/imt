<?php

/*
* Задача 2
* Создать массив из 1000 чисел каждый элемент которого равен квадрату своего номера.
* Результат вывести в виде таблицы (оформить ее рамкой).
*/
echo '<h1>Задача 2</h1>';


$arr = array();

for ($i=0; $i<1000; $i++) {
	$arr[$i] = $i * $i;
}

echo '<table border = 1>';
foreach ($arr as $key => $value) {
	echo '<tr>';
		echo '<td>'.$key.'</td><td>'.$value.'</td>';
	echo '</tr>';
}
echo '</table>';

/*
* Задача 3
* Создайте массив из 1000 случайных чисел. Определите, есть ли в массиве повторяющиеся элементы.
*/
echo '<h1>Задача 3</h1>';

$arr = array();

for ($i=0; $i<1000; $i++) {
	$arr[$i] = rand(0,999);
}

$arrRepeat = array_diff(array_count_values($arr), array(1));

echo '<table border = 1>';
echo '<caption>Таблица повторяющихся элементов</caption>';
echo '<tr><td>Значение</td><td>Количество</td></tr>';
foreach ($arrRepeat as $key => $value) {
	echo '<tr>';
		echo '<td>'.$key.'</td><td>'.$value.'</td>';
	echo '</tr>';
}
echo '</table>';

/*
* Задача 4
* Создать массив из 100 случайных чисел. Найти сумму чисел, которые кратны 5-ти (пяти).
*/
echo '<h1>Задача 4</h1>';

$arr = array();
$sum = 0;

for ($i=0; $i<100; $i++) {
	$arr[$i] = rand(0,999);
}

foreach ($arr as $value) {
	if ($value % 5 == 0) {
		$sum += $value;
	}
}

echo "Сумма = $sum";

/*
* Задача 5
* Дана строка.
* Если ее длина больше 10 символов, то оставить в строке только первые 6 символов,
* иначе дополнить строку символами 'o' до длины 12.
*/
echo '<h1>Задача 5</h1>';

if (rand(1,2) == 1) {
	$str = 'good day';
} else {
	$str = 'good afternoon';
} 

echo $str.'<br>';

if (iconv_strlen($str) > 10) {
	echo mb_strimwidth($str, 0, 6);
} else {
	echo mb_strimwidth($str.'oooooooooo', 0, 12);
}

/*
* Задача 6
* Сгенерировать массив из 10-ти случайных чисел.
* После этого, сгенерировать одно случайно число и проверить, входит ли оно в данный массив.
*/
echo '<h1>Задача 6</h1>';

$arr = array();

for ($i=0; $i<10; $i++) {
	$arr[$i] = rand(0,99);
}

echo '<pre>';
print_r($arr);
echo '</pre>';

$num = rand(0,99);

if (in_array($num, $arr)) {
    echo "Число $num входит в массив";
} else {
	echo "Число $num не входит в массив";	
}

/*
* Задача 7
* Создать массив из 100 случайных как чисел так и ключей. После этого выполнить:
* сортировку массива по значению, сортировку массива по ключу.
*/
echo '<h1>Задача 7</h1>';

$arr = array();

for ($i=0; $i<100; $i++) {
	do {
		$key = rand(0,999);
	} while (array_key_exists($key, $arr));
	$arr[$key] = rand(0,999);
}

asort($arr);
echo '<pre>';
print_r($arr);
echo '</pre>';

ksort($arr);
echo '<pre>';
print_r($arr);
echo '</pre>';

/*
* Задача 8
* Создать два массива из 10-ти случайных чисел.
* Выполнить сравнения массивов по двум критериям: вычислить схождение массива, вычислить расхождение массива.
*/
echo '<h1>Задача 8</h1>';

$arr1 = array();
$arr2 = array();

for ($i=0; $i<10; $i++) {
	$arr1[] = rand(0,99);
	$arr2[] = rand(0,99);
}

echo '<pre>';
print_r(array_intersect($arr1, $arr2));
echo '</pre>';

echo '<pre>';
print_r(array_diff($arr1, $arr2));
echo '</pre>';

/*
* Задача 9
* Создать массив из 50-ти случайных чисел. Генерируя случайно число, проверять есть ли такой ключ в данном массив.
*/
echo '<h1>Задача 9</h1>';

$arr = array();

for ($i=0; $i<50; $i++) {
	$num = rand(0,99);
	if (array_key_exists($num, $arr)) {
		echo "Есть ключ $num<br>";
	}
	$arr[] = $num;
}

/*
* Задача 10
* Создать массив из 100 случайных чисел.
* Создать еще один массив, ключами которого будут значения первого массива. Использовать функции php, не писать «велосипед».
*/
echo '<h1>Задача 10</h1>';

$arr1 = array();

for ($i=0; $i<100; $i++) {
	$arr1[] = rand(100,999);
}

echo '<pre>';
print_r($arr1);
echo '</pre>';

$arr2 = array_flip($arr1);

echo '<pre>';
print_r($arr2);
echo '</pre>';

/*
* Задача 11
* Создать массива из 10-ти чисел. Вычислить произведение значений массива. Не использовать для решения задачи циклы.
*/
echo '<h1>Задача 11</h1>';

$arr = array();

for ($i=0; $i<10; $i++) {
	$arr[] = rand(1,9);
}

echo '<pre>';
print_r($arr);
echo '</pre>';

$prod = array_product($arr);

echo "Произведение = $prod";

/*
* Задача 12
* Нарисовать треугольник из числ при помощи php. 
*/
echo '<h1>Задача 12</h1>';

$strCurrent	 = '';
$strTriangle = '';

for ($i=1; $i<=10; $i++) {
	$strCurrent	 .= 1;
	$strTriangle .= $strCurrent.'<br>';
}

echo '<p align="center">'.$strTriangle.'</p>';

/*
* Задача 13
* Нарисовать ромб из чисел, используя php. 
*/
echo '<h1>Задача 13</h1>';

$strCurrent = '';
$strRhombus = '';

for ($i=1; $i<20; $i++) {
	if ($i <= 10 ) {
		$strCurrent	.= 1;
	} else {
		$strCurrent = mb_strimwidth($strCurrent, 0, strlen($strCurrent)-1);	
	}
	$strRhombus .= $strCurrent.'<br>';
}

echo '<p align="center">'.$strRhombus.'</p>';

?>