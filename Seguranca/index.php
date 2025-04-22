<?php
$data = [
    "nome"=>"Wesley"
];

define('SECRET', pack("a16", 'senha'));
define('SECRET_IV', pack("a16", 'senha'));
$openssl = openssl_encrypt(
    json_encode($data),
    'aes-128-cbc',
    SECRET,
    0,
    SECRET_IV
);

echo $openssl . '<br>';
$string = openssl_decrypt($openssl, 'aes-128-cbc', SECRET, 0, SECRET_IV);
var_dump(json_encode($string, true));