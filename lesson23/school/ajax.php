<?php
//print_r($_POST);

$res = array();

$categories = array();

for ($i=1;$i<=10;$i++) {
	$categories[] = substr(md5(rand(1,999)), 0, 5);
	$products[] = rand(100,500);
}

$res['categories'] = $categories;
$res['products'] = $products;

exit(print(json_encode($res)));