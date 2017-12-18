<?php
//print_r($_POST);

if (isset($_POST['name'])) {
	$array = array();

	$array['res'] = true;
	$array['data'] = 'ajax is alive';

	echo json_encode($array);
	exit();
}