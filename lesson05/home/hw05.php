<?php

/*
* Задача 1
* Создайте функцию drawTable() или Table().
* Задайте для функции три аргумента: $col, $row, $color.
* Отрисуйте таблицу умножения 3 раза с разным цветом, вызывая свою функцию с произвольными параметрами.
*/
echo '<h1>Задача 1</h1>';

function drawTable($col, $row, $color) {
	echo '<table border = 1>';
	for ($i=1;$i<=$row;$i++) {
		echo '<tr>';
		for ($j=1;$j<=$col;$j++) {
			echo '<td style = "color:'.$color.'">'.$i*$j.'</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}

drawTable(10, 10, 'green');
drawTable(8, 3, 'red');
drawTable(10, 2, 'blue');

/*
* Создайте функцию MainMenu() с двумя аргументами.
* Первый аргумент $menu - в него будет передаваться массив, содержащий структуру меню.
* Второй аргумент $type со значением по умолчанию равным true. 
* Данный параметр указывает, каким образом будет отрисовано меню - вертикально или горизонтально.
* Измените код таким образом, чтобы меню отрисовывалось в зависимости от входящего параметра $type -
* либо вертикально, либо горизонтально. Отрисуйте оба таких меню.
*/
echo '<h1>Задача 2</h1>';

function MainMenu($menu, $type = true) {
	if ($menu) {
		foreach ($menu as $name => $link) {
			if ($type) {
				echo "<li style = 'display: inline; padding: 5px'><a href='$name'>$link</a></li>";	
			} else {
				echo "<li><a href='$name'>$link</a></li>";
			}
			
		}
	}
} 

$menu = array(
	'home'=>'index.php', 
	'about'=>'about.php', 
	'contacts'=>'contact.php',
	'table'=>'table.php',
	'calc'=>'calc.php'
);

MainMenu($menu);
MainMenu($menu, false);

?>