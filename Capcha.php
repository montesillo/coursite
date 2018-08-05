<?php
session_start();
$width = 100;
$height = 30;
$myImage = imagecreate($width, $height);

$colorRed = imagecolorallocate($myImage, 255, 0, 0);
imagefill($myImage, 0, 0, $colorRed);
$colorWhite = imagecolorallocate($myImage, 255, 255, 255);
$number = rand(100000, 999999);
$_SESSION['numero']=$number;
imagestring($myImage, 5, 25, 5, $number, $colorWhite);
for($i=0; $i<5; $i++){
	$x1=rand(0,$width);
	$y1=rand(0,$height);
	$x2=rand(0,$width);
	$y2=rand(0,$height);
	imageline($myImage, $x1, $y1, $x2, $y2, $colorWhite);
}
header("Content-type: image/jpeg");
imagejpeg($myImage);
imagedestroy($myImage);
?>