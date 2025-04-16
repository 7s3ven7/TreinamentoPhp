<?php

$pokemon = "pikachu";
$link = "https://pokeapi.co/api/v2/pokemon/$pokemon";

$ch = curl_init($link);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response);

print_r($data);