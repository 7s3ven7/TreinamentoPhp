<?php

$data = array(
    "nome" => "Joao"
);
setcookie("dadosPessoais", json_encode($data), time() + (86400 * 30), "/");

echo "ok";
