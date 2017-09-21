<?php
define("DB_HOST",  "localhost");
define("DB_LOGIN", "root");
define("DB_PASS",  "");
define("DB_NAME",  "lesson12");
function connect() {
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
	if (!$link) {
    	die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
	}
	return $link;
}

function disconnect($link) {
	$res=mysqli_close($link);
	return $res;
}

function query($link, $queryText) {
	$res = mysqli_query($link, $queryText);
	return $res;
}

function result($res) {
	$row = mysqli_fetch_assoc($res);
	return $row;
}

function results($res) {
	while($row = mysqli_fetch_assoc($res)) {
    	$results[] = $row;
	}
	return $results;
}