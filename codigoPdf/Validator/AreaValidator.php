<?php

declare(strict_types=1);

namespace Validator;

require __DIR__ . '/../vendor/autoload.php';

class AreaValidator
{

    public function validator($front,$back,$right,$left): float|string
    {

        if($front == $left)
        {

            return $this->square($front);

        }elseif($front == $back && $right == $left)
        {

            return $this->rectangle($front,$right);

        }else {

            return 'não foi possível verificar a forma das medidas definidas';

        }

    }

    private function square($side): float
    {

        return $side * $side;

    }

    private function rectangle($front, $right): float
    {

        return $front * $right;

    }

}