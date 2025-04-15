<?php

$file = "testes.txt";

if(file_exists($file)){
    $file = fopen($file, "r");
    $header = fgets($file);

    var_dump($header);

    while ($row = fgets($file)) {
        var_dump($row);
    }
}
fclose($file);

