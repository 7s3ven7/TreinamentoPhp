<?php

$fileName = "exemplo.text";
if(file_exists($fileName))
{
    $file = fopen($fileName, "a+");
    fwrite($file, "\nTeste\n");
    fclose($file);
    echo "arquivo editado";
}
else
{
    $file = fopen($fileName, "w+");
    echo "arquivo criado";
}