<?php
include_once "config.php";

$filename = "log.json";
if(file_exists($filename))
{
    $file = fopen($filename, "r");
    $leiture = fgets($file);
    while ($row = fgets($file))
    {
        echo $row;
    }
}
