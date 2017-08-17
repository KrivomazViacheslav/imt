<?php
header('Content-Type: text/html; charset=utf-8');

/*
* Задача 2
* Создать текстовый файл, записать в него 1000 случайных чисел в диапазоне от 1 до 500 (столбиком).
* Прочитать файл в массив и записать два разных файла. В одном файле записать только парные числа,
* в другом файле записать только непарные числа. Писать в формате ключ массива => число.
*/
echo '<h1>Задача 2</h1>';

$file = fopen('randomNumbers.txt','w+');
for ($i=0; $i < 1000; $i++) { 
	$num = rand(1,500);
	fwrite($file, $num."\r\n");
}
fclose($file);

$file = fopen('randomNumbers.txt', 'r');
$txt = array();
while ($line = fgets($file)) {
    $txt[] = $line;
}
fclose($file);

$fileEven = fopen('evenNumbers.txt','w+');
$fileOdd  = fopen('oddNumbers.txt','w+');
foreach ($txt as $key => $value) {
	if ($value % 2 == 0) {
		fwrite($fileEven, $key.' => '.$value);
	} else {
		fwrite($fileOdd, $key.' => '.$value);	
	}
}
fclose($fileEven);
fclose($fileOdd);