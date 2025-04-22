<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->get('/', function (){
   echo "<h1>Testes feito pelo </h1>";
});
$app->get('/hello/:name', function ($name){
    echo "hello, $name";
});

$app->run();