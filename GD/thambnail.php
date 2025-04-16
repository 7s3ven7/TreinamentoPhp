<?php

$file = "imgemNova.jpg";

$new_width = 5000;
$new_height = 5000;

$data = getimagesize($file);

$width = $data[0];
$height = $data[1];

list($old_width, $old_height) = getimagesize($file);

$new_image = imagecreatetruecolor($new_width, $new_height);
$old_image = imagecreatefromjpeg($file);
imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

imagejpeg($new_image, "GdTestes".date("YmdHis").".jpg");
imagedestroy($old_image);
imagedestroy($new_image);