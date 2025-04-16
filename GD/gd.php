<?php

header('Content-type: image/png');

$img = imagecreate(256,256);

$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);

imagestring($img, 5, 60, 120, "oi", $black);

imagepng($img,"GdTestes".date("YmdHis").".png");
imagedestroy($img);