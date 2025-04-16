<?php

if(isset($_COOKIE["dadosPessoais"]))
{
    $cookies = json_decode($_COOKIE["dadosPessoais"]);

    var_dump($cookies);
}