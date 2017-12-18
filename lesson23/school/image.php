<?php
session_start();
$f = imagecreatetruecolor(500, 500);
$red = imagecolorallocate($f, 255, 0, 0);
$font = 'georgia-bold.ttf';
$captcha = substr(md5(rand(10,1000)), 0, 5);
$_SESSION['code'] = $captcha;
imagettftext($f, 36, rand(-10,10), 50, 50, $red, $font, $captcha);

imagejpeg($f);
header("Content-Type: image/jpg");