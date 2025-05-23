<?php

require __DIR__ . "/vendor/autoload.php";

use Service\ProposalExporter;
use Validator\InstallmentValidator;

# TESTES

$_POST['front'] = 10;
$_POST['back'] = 10;
$_POST['leftSide'] = 10;
$_POST['rightSide'] = 10;
$_POST['property'] = 'Residencial Paracatu';
$_POST['plot'] = 1115;
$_POST['square'] = 'A12';
$_POST['price'] = 'R$6.000,00';
$_POST['installment'] = 6;

# --- Validação dos dados ---

$validator = new InstallmentValidator();

$installmentValue = $validator->validate($_POST['price']);

$totalArea = $_POST['front'] * $_POST['leftSide'];

$individualValuesInstallment = $installmentValue/$_POST['installment'];

# --- Validação dos dados ---

$pageOne = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 10
                ],
            "cellSize" =>
                [
                    "width" => 190,
                    "height" => 15
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "Esta PROPOSTA é referente ao lote de terreno nº" . $_POST['plot'] . ", da quadra " . $_POST['square'] . ", do Loteamento <b>" . $_POST['property'] . "</b>, localizado em Araruama-RJ com as seguintes dimensões.",
            "align" => "J"
        ]
    ];

$firstLineOfFirstTablePageOne = [
    [
        "position" =>
            [
                "X" => 20,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 9,
            "style" => "B"
        ],
        "html" => "FRENTE",
        "align" => "C"
            ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 9,
            "style" => "B"
        ],
        "html" => "FUNDOS",
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 9,
            "style" => "B"
        ],
        "html" => "LADO DIREITO",
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 9,
            "style" => "B"
        ],
        "html" => "LADO ESQUERDO",
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 9,
            "style" => "B"
        ],
        "html" => "AREÁ TOTAL (M²)",
        "align" => "C"
    ]
];

$secondLineOfFirstTablePageOne = [
    [
        "position" =>
            [
                "X" => 20,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => $_POST['front'],
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => $_POST['back'],
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => $_POST['rightSide'],
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => $_POST['leftSide'],
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => $totalArea,
        "align" => "C"
    ]
];

$pageOneSecondPartner = [
        [
            "position" =>
                [
                    "X" => 7.5,
                    "Y" => 5
                ],
            "cellSize" =>
                [
                    "width" => 195,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "1. Estipula-se, que o valor aqui acordado trata-se de remuneração ao CORRETOR, ficando sob a responsabilidade do 
            adquirente do imóvel, declarando o mesmo a concordância com o encargo ora estipulado.",
            "align" => "L"
        ],
        [
            "position" =>
                [
                    "X" => 7.5,
                    "Y" => 2.5
                ],
            "cellSize" =>
                [
                    "width" => 195,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "2. Taxa de CORRETAGEM no valor total de " . $_POST['price'] . ", podendo ser dividida em até " . $_POST['installment'] . " parcelas. ",
            "align" => "L"
        ],
    ];

$firstLineOfSecondTable = [
    [
        "position" =>
            [
                "X" => 20,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "PARCELAS",
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "VALORE (R$)",
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "DATA",
        "align" => "C"
    ]
];

$secondLineOfSecondTable = [
    [
        "position" =>
            [
                "X" => 20,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "0",
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "R$" . $individualValuesInstallment,
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => date("d/m/Y"),
        "align" => "C"
    ]
];

$finalLineForSecond = [
    [
        "position" =>
            [
                "X" => 20,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 35,
                "height" => 14
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "TOTAL CORRETAGEM",
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 14
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => $_POST['price'],
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 14
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "",
        "align" => "C"
    ]
];

$pageOneThirdPartner = [
    [
        "position" =>
            [
                "X" => 7.5,
                "Y" => 2.5
            ],
        "cellSize" =>
            [
                "width" => 195,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "3. O preço do lote à vista é de " . $_POST['price'] . ".",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 7.5,
                "Y" => 2.5
            ],
        "cellSize" =>
            [
                "width" => 195,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "4. Condições de Pagamento do Lote:",
        "align" => "L"
    ],
];

$firstLineOfThirdTable = [
    [
        "position" =>
            [
                "X" => 35,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "N° PARCELAS",
        "align" => "C"
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 10
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "VALOR DA PARCELA",
        "align" => "C"
    ],
    ];

$secondLineOfThirdTable = [
        [
            "position" =>
                [
                    "X" => 35,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 70,
                    "height" => 10
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => $_POST['installment'],
            "align" => "C"
        ],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 70,
                    "height" => 10
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "R$" . $individualValuesInstallment,
            "align" => "C"
        ],
];

$pageOneFourPartner = [
    [
        "position" =>
            [
                "X" => 7.5,
                "Y" => 2.5
            ],
        "cellSize" =>
            [
                "width" => 195,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "5. O pagamento das parcelas referentes ao lote iniciará somente após a quitação de todas as parcelas relativas a
corretagem e a assinatura do contrato com a Lotecon Paracatu Empreendimentos Imobiliários Ltda.",
        "align" => "L"
    ],
];
# --- Execução ---

$pdf = new ProposalExporter();
$pdf->setMetaData($_POST['property']);
$pdf->writeLine($pageOne);
$pdf->writeTable($firstLineOfFirstTablePageOne);
$pdf->writeTable($secondLineOfFirstTablePageOne);
$pdf->writeLine($pageOneSecondPartner);
$pdf->writeTable($firstLineOfSecondTable);

for($i = 1; $i <= $_POST['installment']; $i++)
{

    $secondLineOfSecondTable[0]['html'] = "PARCELA " . $i;

    if($i != 1)
    {

        $secondLineOfSecondTable[2]['html'] = '- - -';

    }

    $pdf->writeTable($secondLineOfSecondTable);

}

$pdf->writeTable($finalLineForSecond);
$pdf->writeLine($pageOneThirdPartner);
$pdf->writeTable($firstLineOfThirdTable);
$pdf->writeTable($secondLineOfThirdTable);
$pdf->writeLine($pageOneFourPartner);
$pdf->download();

# --- Execução ---
