<?php

$file = fopen("exemplo.text", "w+");

fwrite($file, "testes de exclusão");
fclose($file);
unlink("exemplo.text");

if(!is_dir("images")) mkdir("images");

foreach(scandir("images") as $image){
    if($image != "." && $image != ".."){
        unlink("images/".$image);
    }
}