<?php

namespace Validator;

require __DIR__ . '/../vendor/autoload.php';

class DataPostValidator
{

    public float $front, $back, $leftSide, $rightSide;

    public int $installment;

    public string $property, $plot, $square, $price;

    public array $buyer;

    # array com os dados a serem comparados no getValues.

    private array $comparator = [
            'front',
            'back',
            'leftSide',
            'rightSide',
            'property',
            'plot',
            'square',
            'price',
            'installment',
            'buyer'
        ];

    public function getValues():bool
    {

        # TESTES

        $_POST['front'] = 10;
        $_POST['back'] = 10;
        $_POST['leftSide'] = 10;
        $_POST['rightSide'] = 10;
        $_POST['installment'] = 6;
        $_POST['property'] = 'Residencial Paracatu';
        $_POST['plot'] = '1115';
        $_POST['square'] = 'A12';
        $_POST['price'] = 'R$6.000,00';
        $_POST['buyer'] = [
            'Wesley Gabriel Trentin Rodrigues' => [
                'nationality' => 'Brasileiro',
                'birthDate' => '02/10/2006',
                'civilState' => 'casado',
                'marriageRegime' => 'Comunhão Parcial',
                'identify' => '0',
                'issuingAuthority' => 'SSP/UF',
                'issuingState' => 'SC',
                'cpf' => '111111111-11',
                'profession' => 'carpinteiro',
                'email' => 'wesley@wesley.com',
                'dadName' => "Marcelo Moura Rodrigues",
                'momName' => "Marilene Trentin",
                'spouse' => [
                    'name' => 'Nome Aleatório',
                    'nationality' => 'Brasileiro',
                    'birthDate' => '12/05/2002',
                    'civilState' => 'casado',
                    'marriageRegime' => 'Comunhão Parcial',
                    'identify' => '2',
                    'issuingAuthority' => 'SSP/UF',
                    'issuingState' => 'SC',
                    'cpf' => '222222222-22',
                    'profession' => 'fazendeira',
                    'email' => 'nomerandom@nomerandom.com',
                    'dadName' => "Maria de Fatima",
                    'momName' => "José cordeiro",
                ],
                'residencialAddress' => 'Rua marilho da silva, numero 1892',
                'residencialPhone' => '(47) 999718040',
                'cellPhone' => '(47) 999718040',
                'neighborhood' => 'Santa Aumeida',
                'municipality' => 'BC',
                'state' => 'SC',
                'cep' => '317500-40',
                'locate' => ''
            ],
            'Gabriel' => [
                'nationality' => 'Brasileiro',
                'birthDate' => '17/12/2001',
                'civilState' => 'solteiro',
                'marriageRegime' => 'Nenhuma',
                'identify' => '1',
                'issuingAuthority' => 'SSP/UF',
                'issuingState' => 'SC',
                'cpf' => '222222222-22',
                'profession' => 'mecânico',
                'email' => 'gabriel@gabriel.com',
                'dadName' => "Maria de Fatima",
                'momName' => "José cordeiro",
                'spouse' => [],
                'residencialAddress' => 'Rua marilho da silva, numero 1892',
                'residencialPhone' => '(47) 99995412',
                'cellPhone' => '(47) 9997180123',
                'neighborhood' => 'Santa Aumeida da Silveira',
                'municipality' => 'CB',
                'state' => 'CS',
                'cep' => '328665-40'
            ]
        ];

        # TESTES

        # valida se existe ou não os valores no post, se não existir algum, ele retorna a mensagem falando qual variável não existe

        if (array_any($this->comparator, fn($variableComparator) => !isset($_POST[$variableComparator]))) {

            return false;

        }

        # depois de validar os valores no post, se todos existirem, ele salva nas variáveis do objeto.

            # dados da área do local a ser vendido.

        $this->front = $_POST['front'];
        $this->back = $_POST['back'];
        $this->leftSide = $_POST['leftSide'];
        $this->rightSide = $_POST['rightSide'];

            # dados da propriedade.

        $this->property = $_POST['property'];
        $this->plot = $_POST['plot'];
        $this->square = $_POST['square'];
        $this->price = $_POST['price'];
        $this->installment = $_POST['installment'];

            # dados do comprador(es) e cônjuge se tiver.

        $this->buyer = $_POST['buyer'];

        return true;

    }

}