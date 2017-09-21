<?php
define("DB_HOST",  "localhost");
define("DB_LOGIN", "root");
define("DB_PASS",  "");
define("DB_NAME",  "php20");
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
if (!$link){
	die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
echo 'Соединение установлено... ' . mysqli_get_host_info($link) . "\n";

$query = "SELECT name, email FROM users";
$res = mysqli_query($link, $query);
$error = mysqli_error($link);
//print_r($res);
//print_r($error);

/*while ($row = mysqli_fetch_assoc($res)) {
	$results[] = $row;
}
print_r($results);*/

while ($row = mysqli_fetch_object($res)) {
	$resultsObj[] = $row;
}
print_r($resultsObj);