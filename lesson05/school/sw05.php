<?php

	//ini_set(display_error, newvalue);
	

	/*function sayHello($a) {
		global $test;
		echo $a;
		//echo $test;
		return $test;
	}

	$test = '123';
	$res = sayHello('hello world');
	echo $res; */

	/*function sayHello(&$a) {
		echo $a++;
	}

	$test = 1;
	sayHello($test);
	echo $test;*/

	/*$arr3 = array(
		'name' => 'test3',
		'price' => 300
	);

	$arr2 = array(
		'name' => 'test2',
		'price' => 200,
		'sub' => $arr3
	);

	$arr = array(
		'name' => 'test',
		'price' => 100,
		'sub' => $arr2
	);

	echo '<pre>';
	print_r($arr);
	echo '</pre>';

	function tree($arr) {
		foreach ($arr as $v) {
			if (is_array($v)) {
				tree($v);
			} else {
				echo $v.'<br>';
			}
		}

	}

	tree($arr);*/

	function counter($i) {
		static $i;
		$i++;
		echo $i;
	}

	for ($i=1; $i < 10; $i++) { 
		counter(1);
	}
?>