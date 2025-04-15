<?php

$name = "imagens";
if(!is_dir($name)){
    mkdir($name);
    echo "o dietório de imagens foi criado com sucesso!\n";
}else{
    echo "já existe este diretorio, e foi apagado!\n";
}
var_dump(scandir($name));