<?php

// Задача 1
echo 'Задача 1<br><br>';

$measureFrom = 1;
$measureTo = 0;

// 1. Перевод дюймы в сантиметры
$measureTo = $measureFrom * 2.54;
echo "$measureFrom дюйм = $measureTo сантиметр<br>";

// 2. Перевод дюймы в метры
$measureTo = $measureFrom * 0.0254;
echo "$measureFrom дюйм = $measureTo метр<br>";

// 3. Перевод мили в километры
$measureTo = $measureFrom * 1.60934;
echo "$measureFrom миля = $measureTo километр<br>";

// 4. Перевод мили в метры
$measureTo = $measureFrom * 1609.33999997549;
echo "$measureFrom миля = $measureTo метр<br>";

// 5. Перевод градусы цельсия в Фаренгейты
$measureTo = ($measureFrom * 1.8) + 32;
echo "$measureFrom градус Цельсия = $measureTo градус Фаренгейта<br>";

// 6. Перевод Фаренгейты в градусы
$measureTo = ($measureFrom - 32) / 1.8;
echo "$measureFrom градус Фаренгейта = $measureTo градус Цельсия<br>";

// 7. Перевод морские мили в километры
$measureTo = $measureFrom * 1.852;
echo "$measureFrom морская миля = $measureTo километр<br>";

// 8. Перевод километры в сантиметры
$measureTo = $measureFrom * 100000;
echo "$measureFrom километр = $measureTo сантиметр<br>";

// 9. Перевод футы в метры
$measureTo = $measureFrom * 0.3048;
echo "$measureFrom фут = $measureTo метр<br>";

// 10. Перевод галлоны (англ) в литры
$measureTo = $measureFrom * 4.54609;
echo "$measureFrom галлон = $measureTo литр<br>";

// Задача 2
echo '<br>Задача 2<br><br>';

$s = 100; // Пройденный путь в километрах
$t = 2; // Время движения в часах

$v1 = $s / $t;
$v2 = $v1 * 3.6;
echo "Скорость движения составила $v1 км/ч или $v2 м/с<br>";

// Задача 3
echo '<br>Задача 3<br><br>';

$a=10;
$b=3;

$result = $a % $b;
echo "Остаток от деления равен $result<br>";

//Задача 4
echo '<br>Задача 4<br><br>';

$result = pow(2,10); // Возведение в степень
echo "2 в степени 10 = $result<br>";

$result = sqrt(245); // Корень квадратный
echo "Квадратный корень 245 = $result<br>";

//Задача 5
echo '<br>Задача 5<br><br>';

echo 'Текущая дата '.date('Y-m-d').'<br>';

//Задача 6
echo '<br>Задача 6<br><br>';

$result = 100 * 0.1 + 200 * 0.2 + 300 * 0.3 + 400 * 0.4 + 500 * 0.5;
echo "Сумма процентов = $result<br>";

//Задача 7
echo '<br>Задача 7<br><br>';

$num = 20;
$coeff = 1 + $num / 100; // Перевод числа в коэффициент
echo "Коэффициент = $coeff<br>";

$coeff = 1.3;
$num = ($coeff - 1) * 100; // Перевод коэффициента в число
echo "Число = $num<br>";

?>