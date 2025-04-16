<?php

function trataNome($nome)
{
    if (!$nome) {
        throw new Exception("Nenhum nome encontrado", 1);
    }

    echo ucfirst($nome);
}
try
{
    trataNome();

} catch (Exception $e) {

    echo json_encode(array(
        "message" => $e->getMessage(),
       "line" => $e->getLine(),
        "file" => $e->getFile(),
        "code" => $e->getCode()
    ));

} finally {

    echo "ok";

}