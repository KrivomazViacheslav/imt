<?php

// Задача 1
echo '<h1>Задача 1</h1>';

$i = 0;
while ($i < 101) {
 	echo "$i ";
 	$i += 2;
 } 

// Задача 2
echo '<h1>Задача 2</h1>';

for ($i=200;$i>=0;$i--) { 
	echo "$i ";
}

// Задача 3
echo '<h1>Задача 3</h1>';

$sum = 0;

for ($i=0;$i<=100;$i++) { 
	$sum += $i;
}

echo $sum;

// Задача 4
echo '<h1>Задача 4</h1>';

$arr = array('html', 'css', 'php', 'js', 'jq');

foreach ($arr as $value) {
	echo "$value<br>";
}

// Задача 5
echo '<h1>Задача 5</h1>';

$str = 'Hello World!';
$cnt = iconv_strlen($str);

for ($i=0;$i<$cnt; $i++) { 
	echo "$str[$i]<br>";
}

// Задача 6
echo '<h1>Задача 6</h1>';

$arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');

foreach ($arr as $key => $value) {
	echo "$key - $value<br>";
}

// Задача 7
echo '<h1>Задача 7</h1>';

$arr = array();

for ($i=100;$i>0;$i--) {
	$arr[$i] = rand(0,100);
}

echo '<pre>';
print_r($arr);
echo '</pre>';

// Задача 8
echo '<h1>Задача 8</h1>';

$colors = array('red','green','pink','orange','yellow', 'purple', 'lime', 'blue', 'brown', 'silver');

echo '<table border = 1>';
for ($i=1;$i<=10;$i++) {
	echo '<tr>';
	for ($j=1;$j<=10;$j++) {
		echo '<td style = "color:'.$colors[rand(0,9)].'">'.$i*$j.'</td>';
	}
	echo '</tr>';
}
echo '</table>';

// Задача 9
echo '<h1>Задача 9</h1>';

$arr = array();
$cnt = 10;

for ($i=0;$i<$cnt;$i++) { 
	$arr[] = rand(0,100);
}

echo '<pre>';
print_r($arr);
echo '</pre>';

for ($i=1;$i<$cnt;$i++) {
	$isSort = true;
	for ($j=0;$j<$cnt-$i;$j++) {
		if ($arr[$j]>$arr[$j+1]) {
			$tmp		= $arr[$j];
			$arr[$j]	= $arr[$j+1];
			$arr[$j+1]	= $tmp;
			$isSort		= false;
		}
	}
	if ($isSort) {
		break;
	}
}

echo '<pre>';
print_r($arr);
echo '</pre>';

?>