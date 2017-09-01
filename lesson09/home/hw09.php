<?php header('Content-Type: text/html; charset=utf-8'); ?>

<form method="post">
	<lebel>Логин:</lebel>
	<input type="text" name="login">
	<br><br>
	<lebel>Имя:</lebel>
	<input type="text" name="name">
	<br><br>
	<lebel>Email:</lebel>
	<input type="text" name="email">
	<br><br>
	<lebel>Пароль:</lebel>
	<input type="password" name="password">
	<br><br>
	<input type="submit" name="registration" value="Отправить">
</form>

<?php
if(isset($_POST['registration']) && $_POST['registration']) {

    $login    = $_POST['login'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if (!preg_match('/^[a-z0-9]{4,}$/i', $login)) {
    	echo 'Логин не прошел проверку!<br>';
    }
    if (!preg_match('/^[а-я-]+$/ui', $name)) {
    	echo 'Имя не прошело проверку!<br>';
    }
    if (!preg_match('/^[a-z0-9.-]+@[a-z0-9-]+\.[a-z0-9-.]+$/i', $email)) {
    	echo 'Email не прошел проверку!<br>';
    }
    if (!preg_match('/^[a-z0-9\/*?-]{4,}$/i', $password)) {
    	echo 'Пароль не прошел проверку!<br>';
    }

}
?>

<form method="post">
    <lebel>Ссылка:</lebel>
    <input type="text" name="linkText">
    <input type="submit" name="link" value="Отправить">
</form>

<?php
if(isset($_POST['link']) && $_POST['link']) {

    $linkText = $_POST['linkText'];
    $linkText = translit($linkText);
    $linkText = mb_strtolower($linkText);
    $linkText = preg_replace('/^-?\/?/', '', $linkText);
    $linkText = preg_replace('/-?\/?$/', '', $linkText); 

    echo $linkText;

}

function translit($str) {
    $rus = array(' ', 'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф',
                 'Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й',
                 'к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я');
    $lat = array('-', 'A','B','V','G','D','E','E','Gh','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F',
                 'H','C','Ch','Sh','Sch','Y','Y','Y','E','Yu','Ya','a','b','v','g','d','e','e','gh','z','i','y',
                 'k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya');
    return str_replace($rus, $lat, $str);
}
?>