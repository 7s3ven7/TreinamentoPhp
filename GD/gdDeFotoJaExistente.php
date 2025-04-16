<?php

$image = imagecreatefromjpeg("imgemNova.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5, 450, 150, "minha foto", $gray);
imagestring($image, 5, 450, 350, "Foto MiNhA", $gray);
imagestring($image, 5, 450, 370, "My Photo", $gray);

header("Content-type: image/jpeg");

imagejpeg($image,"MinhaFoto".date("d-m-Y").".jpg");
imagedestroy($image);