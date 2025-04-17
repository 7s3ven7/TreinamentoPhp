<?php
include_once "config/config.php";
$user = new Usuario($_POST["nome"], $_POST["email"], $_POST["senha"]);
echo "In process <br>";
/*$file = $user->GetName() . $user->GetId() . ".json";
$log = fopen($file, "w+");
fwrite($log, json_encode($user->GetAll()));
fclose($log);*/
echo "Finalizado";
