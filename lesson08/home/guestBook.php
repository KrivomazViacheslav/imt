<?php header('Content-Type: text/html; charset=utf-8'); ?>

<!--
	Задача 1
	Создать текстовую гостевую книгу. Сделать на страничке форму, в которой будет одно поле для ввода имени.
	После ввода имени и нажатия кнопки Ок, в файл (название произвольное) записать имя, дату и посещенную страницу в файл.
	Примечание. Файл обязательно дописывать.
 -->
<h1>Задача 1</h1>

<form method="post">
	<lebel>Укажите ваше имя:</lebel>
	<input type="text" name="userName">  
	<input type="submit" name="ok" value="Ok"> 
</form>

<?php
if(isset($_POST) && $_POST['userName']) {
	$userName = $_POST['userName'];
	$time	  = date('m-d-Y:H:i:s');
	$uri	  = '';
	if(isset($_SERVER) && $_SERVER['HTTP_HOST'] && $_SERVER['REQUEST_URI']) {
    	$uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
	$file = fopen('guestBook.txt', 'a+');
	fwrite($file, "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\n".$userName.' | '.$time.' | '.$uri."\r\n");
	fclose($file);
}
?>