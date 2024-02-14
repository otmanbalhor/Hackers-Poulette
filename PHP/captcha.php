<?php
session_start();

//mt_rand est une fonction plus rapide que rand
$_SESSION['captcha'] = mt_rand(1000,9999);

$captcha = $_SESSION['captcha'];

$img = imagecreate(100,30);

$font ='font/FiraSans-Light.ttf';

$bg = imagecolorallocate($img,100,100,100);
$textcolor = imagecolorallocate($img,255,255,255);

imagettftext($img,20,0,23,25,$textcolor,$font,$captcha);

header('Content-type:image/jpeg');
imagejpeg($img);
imagedestroy($img);


?>