<?php

require_once "config.php";

$sql = new Sql();

$users = $sql->select("SELECT * FROM cadastrados");

if(!file_exists("log.json"))
{
    $file = fopen("log.json", "a+");
}else
{
    $file = fopen("log.json", "a");
}
$date = array("date" => date("Y-m-d H:i:s"));

array_push($users, $date);
fwrite($file, "\n".json_encode($users, JSON_PRETTY_PRINT));

fclose($file);
