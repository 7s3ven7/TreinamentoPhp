<?php

require_once "config.php";

/*$sql = new Sql();
$resultado = $sql->select("SELECT * FROM cadastrados");
echo json_encode($resultado);*/

//$wesley = new Usuario();
//$wesley->LoadById(2);
//echo json_encode(Usuario::getList());

$wesley = new Usuario();
/*$wesley->setId(1);
echo "id:" . $wesley->getId() . "\n";
$wesley->setNome("Wesley");
echo "nome:" . $wesley->getNome() . "\n";
$wesley->setEmail("wesley@gmail.com");
echo "email:" . $wesley->getEmail() . "\n";
$wesley->setSenha("123123");
echo "senha:" . $wesley->getSenha() . "\n";*/
$wesley->login("admin@gmail.com", "wesleys");
/*echo $wesley->loadById(2);
echo json_encode(Usuario::searchPerson("we"));
echo $wesley->__toString();*/