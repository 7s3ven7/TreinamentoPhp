<?php

$directorName = "imagens";
if(!Is_dir($directorName))
{
    mkdir($directorName);
    echo "Deu bom o MKdir\n";
}else
{
    echo "O arquivo ja existe, nome: $directorName \n";
}

rmdir($directorName);
echo "removido com sucesso";