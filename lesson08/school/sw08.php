<?php
//$h = fopen('data.txt', 'r');
//echo fread($h, 8);
//echo fread($h, filesize('data.txt'));

/*$file = fopen('data.txt', 'r');
$txt = array();
while ($line = fgets($file)) {
	$txt[] = $line;
}
fclose($file);
print_r($txt);*/

/*$file = fopen('data.txt', 'r');
$txt = array();
while ($line = fgetc($file)) {
	$txt[] = $line;
}
fclose($file);
print_r($txt);*/

/*$file = fopen('data.txt', 'w+');
fwrite($file, "\n test22");
fclose($file);*/

/*$file = fopen('data.txt', 'a+');
fwrite($file, "\n testa+");
fclose($file);*/

//readfile('data.txt');
/*$test = file('data.txt');
print_r($test);*/

/*$test = file_get_contents('data.txt');
print_r($test);*/
/*$rozetka = file_get_contents('http://php.net');
print_r($rozetka);*/

//file_put_contents('put.txt', 'data test');
//file_put_contents('put.txt', print_r($_SERVER,true), FILE_APPEND);

/*$h = opendir(".");
while ($item = readdir($h)) {
	if ($item == '.' || $item == '..') {
		continue;
	}
	if (is_file($item)) {
		echo "<b>file: $item</b><br>";	
	} elseif (is_dir($item)) {
		echo "<b>dir: $item</b><br>";
	} else {
		echo $item."<br>";
	}
}
closedir($h);*/
?>

<form method="post" enctype="multipart/form-data">
	<input type="file" name="filename">
	<input type="submit" name="go" value="upload">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	print_r($_FILES);

	$name = $_FILES['filename']['name'];
	$file = $_FILES['filename']['tmp_name'];

	$res = move_uploaded_file($file, 'download/'.$name);
	if ($res) {
		echo "ok";
	} else {
		echo "false";
	}
}