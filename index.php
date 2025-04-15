<?php

require_once "config.php";

$wesley = new Usuario();
$wesley->login("admin@gmail.com", "wesleys");
$wesley->insert();