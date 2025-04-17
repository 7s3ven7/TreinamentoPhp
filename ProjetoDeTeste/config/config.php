<?php

$classMap = array(
    'Usuario' => 'class/Usuario.php'
);

foreach ($classMap as $class => $file) {
    require_once "$file";
}