<?php

$images = scandir("images");

foreach($images as $image)
{
    if(!in_array($image,array(".","..")))
    {
     $fileName = "images" . DIRECTORY_SEPARATOR . $image;
     $info = pathinfo($fileName);
     $info["size"] = filesize($fileName);
     var_dump($info);
    }
}