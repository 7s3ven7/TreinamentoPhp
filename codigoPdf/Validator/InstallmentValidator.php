<?php

declare(strict_types=1);

namespace Validator;

require __DIR__ . '/../vendor/autoload.php';

class InstallmentValidator
{

    public function validator(string $money,int $installment):array
    {

        $money = str_replace('R$', '', $money);
        $money = str_replace('.', '', $money);
        $moneyOnFloat = (float)str_replace(',', '.', $money);

        return $this->validatorInstallments($moneyOnFloat,$installment);

    }

    public function validatorInstallments(float $total,int $installment):array
    {

        $oneIntallmentNotFiltred = floor(($total/$installment) * 100) / 100;

        $installments = array_fill(0, $installment, $oneIntallmentNotFiltred);

        $totalInstallments = array_sum($installments);

        $difference = round($total - $totalInstallments,2);

        for($i = 0; $difference > 0; $i++)
        {

            $installments[$i] = round($installments[$i] + 0.01,2);
            $difference -= 0.01;

        }

        return $installments;

    }

}