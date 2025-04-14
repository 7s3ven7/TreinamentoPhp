<?php

require_once "config.php";

/*$sql = new Sql();
$resultado = $sql->select("SELECT * FROM cadastrados");
echo json_encode($resultado);*/

//$wesley = new Usuario();
//$wesley->LoadById(2);
//echo json_encode(Usuario::getList());

echo Usuario::validar("wesley","123123");
