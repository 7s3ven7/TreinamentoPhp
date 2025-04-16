<?php

$img = imagecreate(256,256);

$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);

imagestring($img, 20, 90, 150, "Ola mundo!", $black);
imagestring($img, 20, 110, 170, "Ola mundo!", $black);

header("Content-type: image/jpeg");
imagepng($img,"GdTestes".date("YmdHis").".png");
imagedestroy($img);