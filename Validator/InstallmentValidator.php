<?php

namespace Validator;

require __DIR__ . "/../vendor/autoload.php";

class InstallmentValidator
{

    public function validate(string $money):float
    {

        $money = str_replace('R$', '', $money);
        $money = str_replace('.', '', $money);

        return str_replace(',', '.', $money);

    }

}