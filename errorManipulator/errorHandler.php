<?php
function errorHandler($code,$msg,$file,$line)
{

    echo json_encode(array(
        'code' => $code,
        'msg' => $msg,
        'file' => $file,
        'line' => $line
    ));

}

set_error_handler("errorHandler");

echo 100 / 0;

