<?php

require_once "config.php";

$wesley = new Usuario("Joao","administrador123@gmail.com","Politico");
$wesley->Update("adminNovo@gmail.com", "SenhaNova","WesleyFeio");
