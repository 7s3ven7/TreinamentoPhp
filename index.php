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
$index = 'Wesley Gabriel Trentin Rodrigues';
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

$i = 1;

$buyer = $_POST['buyer'];

# --- Inicio Validação dos dados ---

$validator = new InstallmentValidator();

$installmentValue = $validator->validate($_POST['price']);

$totalArea = $_POST['front'] * $_POST['leftSide'];

$individualValuesInstallment = $installmentValue/$_POST['installment'];

# --- Fim Validação dos dados ---

# --- Inicio arrays valores do pdf ---
    # Inicio página 1
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
            ,
        'border' => true],
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
    ,
        'border' => true],
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
    ,
        'border' => true],
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
    ,
        'border' => true],
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
    ,
        'border' => true],
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
        ,
        'border' => true],
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
        ,
        'border' => true],
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
        ,
        'border' => true],
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
        ,
        'border' => true],
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
        ,
        'border' => true],
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
        "align" => "C",
        'border' => true
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
        "align" => "C",
        'border' => true
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
        "align" => "C",
        'border' => true
    ],
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
        "align" => "C",
        'border' => true
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
        "align" => "C",
        'border' => true
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
        "align" => "C",
        'border' => true
    ],
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
        "align" => "C",
        'border' => true
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
        "align" => "C",
        'border' => true
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
        "align" => "C",
        'border' => true
    ],
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
        "align" => "C",
        'border' => true
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
        "align" => "C",
        'border' => true
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
            "align" => "C",
            'border' => true
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
            "align" => "C",
            'border' => true
        ]
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
corretagem e a assinatura do contrato com a Lotecon Paracatu Empreendimentos Imobiliários Ltda.
mensais, vencendo a 1ª (primeira) e as demais consecutivamente a cada 30 dias corridos, a partir da data de pagemento da última parcela dos honorários de CORRETAGEM especificada no item 2 dessa proposta.",
        "align" => "L"
    ],
];
    # Fim página 1

    # Inicio página 2

$pageTwo = [
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 10
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 40
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "6. O Promitente Comprador(a) declara ter ciência sobre a assinatura do CONTRATO DE PROMESSA DE COMPRA E 
VENDA, no prazo máximo de 30 dias após a finalização do pagamento dos honorários de corretagem, sob pena de 
desfazimento do negócio sem direito à devolução dos valores pagos, nos termos dos artigos 418 e 422 do Código 
Civil.  A  assinatura  do  contrato  poderá  ser  realizada  preferencialmente  de  forma  digital  e  remota  através  da 
ferramenta “Docusign” disponibilizada pela empresa ou excepcionalmente de forma presencial na sede da empresa 
na Rua Gen. Andrade Neves, 9, sala 1105, Centro, Niterói-RJ, <u>somente mediante de agendamento prévio.</u>",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 20
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "7. O saldo do preço, em caso de financiamento, sofrerá a incidência de 1% de juros ao mês e o valor das prestações 
será corrigido monetariamente a cada 12 (doze) meses pelo Índice Geral de Preços de Mercado (IGP-M) ou por outro 
que vier a substitui-lo.",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 20
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "8. A primeira parcela referente aos honorários de CORRETAGEM deverá ser paga no ato da assinatura do presente 
termo,  sendo  as  demais  parcelas  pagas  através  de  boletos  bancários,  que  serão  encaminhados  a  cada  mês  ao 
promitente comprador(a), após a quitação da parcela anterior.",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 20
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "9. O não pagamento das parcelas nas datas acima convencionadas acarretará na aplicação de multa equivalente a 
2% (dois por cento) do valor da referida parcela, bem como a aplicação de juros mensais de 1% (um por cento).",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 20
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "10. Em caso de atraso superior a 30 (trinta) dias na quitação de quaisquer das parcelas, por culpa exclusiva do 
Promitente Comprador(a) ou em caso de desistência, a presente proposta será cancelada e, por se tratar de valores 
referentes a honorários de CORRETAGEM, não será restituída a quantia já paga, na forma do art. 725 do C.C.",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 20
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "11. O  Promitente  Comprador(a)  se  declara  ciente  de  que,  só  será  autorizado  a  iniciar  qualquer  obra  no  lote 
adquirido, após a quitação de no mínimo de 06 (seis) prestações consecutivas de seu CONTRATO DE PROMESSA DE 
COMPRA  E  VENDA;  tenha  obtido  autorização  por  escrito  da  Promitente  Vendedora  para  realizá-la;  e  tenha 
apresentado  o  projeto  aprovado  e  o  alvará  de  licença  da  construção  emitidos  pelos  órgãos  competentes  da 
Prefeitura  Municipal  de  Araruama-RJ,  respeitando  todas  as  legislações  dos  órgãos  municipais  e  estaduais 
pertinentes em vigor.",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 20
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "12. O empreendimento trata-se de um LOTEAMENTO, onde os serviços de manutenção e capina de ruas, coleta de 
lixo, fornecimento de água e luz, assim como outros serviços públicos são de responsabilidade dos órgãos públicos e 
ou concessionárias responsáveis por tais serviços, não cabendo a Promitente Vendedora qualquer responsabilidade 
com respeito a tais serviços ou obras necessárias. ",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "13. Loteamento Registrado no Cartório do 1º Ofício de Araruama-RJ, sob o R.08 da matrícula nº 7179.  ",
        "align" => "L"
    ]
];

    # Fim página 2

    # Inicio página 3

$firstLineThirdPage = [
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 10
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 5
            ],
        "font" => [
            "size" => 8,
            "style" => "B"
        ],
        "html" => "DADOS DO PROMIENTE COMPRADOR",
        "align" => "C"
    ],
];

$secondTableThirdPage = [
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 10
            ],
        "cellSize" =>
            [
                "width" => 70,
                "height" => 18
            ],
        "font" => [
            "size" => 10,
            "style" => "B"
        ],
        "html" => "CONHECEU O EMPREENDIMENTO ATRAVÉS DE:",
        "align" => "C",
        'border' => true
    ],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 122,
                "height" => 18
            ],
        "font" => [
            "size" => 0,
            "style" => ""
        ],
        "html" => "",
        "align" => "C",
        'border' => true
    ],
];

$secondLineSecondTableThirdPage = [
    [
        "position" =>
            [
                "X" => 80,
                "Y" => -18
            ],
        "cellSize" =>
            [
                "width" => 25,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "INTERNET",
        "align" => "C"
    ,
        'border' => ''],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 25,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "PANFLETO",
        "align" => "C"
    ,
        'border' => ''],
    [
        "position" =>
            [
                "X" => 0,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 25,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "OUTROS:",
        "align" => "C"
    ,
        'border' => ''],
];

$thirdLineSecondTableThirdPage = [
    [
        "position" =>
            [
                "X" => 89,
                "Y" => 2
            ],
        "cellSize" =>
            [
                "width" => 6,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "",
        "align" => "C"
        ,
        'border' => true],
    [
        "position" =>
            [
                "X" => 19,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 6,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "",
        "align" => "C"
        ,
        'border' => true],
    [
        "position" =>
            [
                "X" => 19,
                "Y" => 0
            ],
        "cellSize" =>
            [
                "width" => 6,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "",
        "align" => "C"
        ,
        'border' => true],
    [
    "position" =>
        [
            "X" => 5,
            "Y" => 0
        ],
    "cellSize" =>
        [
            "width" => 50,
            "height" => 5
        ],
    "font" => [
        "size" => 10,
        "style" => ""
    ],
    "html" => "",
    "align" => "C",
    'border' => 'B']
];

    # Fim página 3

    # Inicio ultima página

$firstLineFinalPage = [
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 40
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "<b>obs1:</b> Em sendo as parcelas acima descritas, pagas através de boletos bancários, toma ciência neste momento o 
Promitente Comprador(a), expressando desde já a sua concordância, de que, em caso de inconsistência dos dados 
acima  fornecidos,  é  de  sua  inteira  responsabilidade,  a  retirada  dos  boletos  diretamente  com  o  corretor  Adebar 
Rodrigues de Carvalho, no seguinte endereço: Estrada dos Menezes, 850, sala 1014, Colubandê, São Gonçalo, restando 
da mesma forma estipulado que o não recebimento do boleto bancário não eximirá o Promitente Comprador(a) do 
pagamento da referida parcela, devendo o mesmo entrar em contato através dos telefones contidos no rodapé deste 
documento.",
        "align" => "L"
    ],
    [
        "position" =>
            [
                "X" => 10,
                "Y" => 5
            ],
        "cellSize" =>
            [
                "width" => 190,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "<b>Obs2:</b> Para que tenha validade, a presente Proposta de Compra, NECESSÁRIAMENTE, deverá conter a assinatura dos 
Corretores ADEBAR RODRIGUES DE CARVALHO, CRECI/RJ 050812 e/ou ADEBAR IVO DE CARVALHO, CRECI/RJ 043819 
e/ou ANDERSON RODRIGUES DE CARVALHO, CRECI/RJ 074932. ",
        "align" => "L"
    ],
];

    # Fim ultima página

# --- Fim arrays valores do pdf ---

# --- Execução ---

$pdf = new ProposalExporter();
$pdf->setMetaData($_POST['property']);

# Inicio página 1

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

# Fim página 1

# Inicio página 2

$pdf->addPage();
$pdf->writeLine($pageTwo);

# Fim página 2

# Inicio página 3

$i = 1;

foreach($buyer as $index => $value)
{

    $pdf->addPage();

    $tableFirstLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 5
                ],
            "cellSize" =>
                [
                    "width" => 192,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "NOME ".$i."° COMPRADOR: " . $index,
            "align" => "L",
            'border' => 'B'
        ],
    ];

    $tableSecondLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 64,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "NACIONALIDADE: " . $value['nationality'],
            "align" => "L"
        ,
            'border' => 'B'],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 64,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "DATA NASCIMENTO: " . $value['birthDate'],
            "align" => "L"
        ,
            'border' => 'B'],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 64,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "Estado Civil: " . $value['civilState'],
            "align" => "L"
        ,
            'border' => 'B'],
    ];

    $tableThirdLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 128,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "REGIME DE CASAMENTO: " . $value['marriageRegime'],
            "align" => "L"
        ,
            'border' => 'B'],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 64,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "IDENTIDADE: " . $value['identify'],
            "align" => "L"
        ,
            'border' => 'B']
    ];

    $tableFourLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 64,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "ORGÃO EXPEDIDOR: " . $value['issuingAuthority'],
            "align" => "L"
        ,
            'border' => 'B'],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 64,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "ESTADO DE EMISSÃO: " . $value['issuingState'],
            "align" => "L"
        ,
            'border' => 'B'],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 64,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "CPF: " . $value['cpf'],
            "align" => "L"
        ,
            'border' => 'B']
    ];

    $tableFiveLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 64,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "PROFISSÃO: " . $value['profession'],
            "align" => "L"
        ,
            'border' => 'B'],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 128,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "EMAIL: " . $value['email'],
            "align" => "L"
        ,
            'border' => 'B']
    ];

    $tableSixLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 192,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "NOME DO PAI (".$i."° COMPRADOR): " . $value['dadName'],
            "align" => "L"
            ,
            'border' => 'B']
    ];

    $tableSevenLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 192,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "NOME DA MÃE (".$i."° COMPRADOR): " . $value['momName'],
            "align" => "L"
            ,
            'border' => 'B']
    ];

    $tableEightLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 5
                ],
            "cellSize" =>
                [
                    "width" => 192,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "ENDEREÇO RESIDENCIAL: " . $value['residencialAddress'],
            "align" => "L"
            ,
            'border' => 'B']
    ];

    $tableNineLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 96,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "TELEFONE RESIDENCIAL: " . $value['residencialPhone'],
            "align" => "L"
            ,
            'border' => 'B'],
        [
        "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
        "cellSize" =>
            [
                "width" => 96,
                "height" => 5
            ],
        "font" => [
            "size" => 10,
            "style" => ""
        ],
        "html" => "TELEFONE CELULAR: " . $value['cellPhone'],
        "align" => "L"
            ,
            'border' => 'B']
    ];

    $tableTenLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 96,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "BAIRRO: " . $value['neighborhood'],
            "align" => "L"
            ,
            'border' => 'B'],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 96,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "MUNICÍPIO: " . $value['municipality'],
            "align" => "L"
            ,
            'border' => 'B']
    ];

    $tableElevenLineThirdPage = [
        [
            "position" =>
                [
                    "X" => 10,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 96,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "ESTADO: " . $value['state'],
            "align" => "L"
            ,
            'border' => 'B'],
        [
            "position" =>
                [
                    "X" => 0,
                    "Y" => 0
                ],
            "cellSize" =>
                [
                    "width" => 96,
                    "height" => 5
                ],
            "font" => [
                "size" => 10,
                "style" => ""
            ],
            "html" => "CEP: " . $value['cep'],
            "align" => "L"
            ,
            'border' => 'B']
    ];

    $pdf->writeLine($firstLineThirdPage);
    $pdf->writeTable($tableFirstLineThirdPage);
    $pdf->writeTable($tableSecondLineThirdPage);
    $pdf->writeTable($tableThirdLineThirdPage);
    $pdf->writeTable($tableFourLineThirdPage);
    $pdf->writeTable($tableFiveLineThirdPage);
    $pdf->writeTable($tableSixLineThirdPage);
    $pdf->writeTable($tableSevenLineThirdPage);

    if(!$value['spouse'] == [])
    {

        $tableFirstLineThirdPage[0]['html'] = 'NOME CÔNJUGE '.$i."° COMPRADOR: " . $value['spouse']['name'];

        $tableSecondLineThirdPage[0]['html'] = 'NACIONALIDADE: ' . $value['spouse']['nationality'];
        $tableSecondLineThirdPage[1]['html'] = 'DATA NASCIMENTO: ' . $value['spouse']['birthDate'];
        $tableSecondLineThirdPage[2]['html'] = 'ESTADO CIVIL: ' . $value['spouse']['civilState'];

        $tableThirdLineThirdPage[0]['html'] = 'REGIME DE CASAMENTO: ' . $value['spouse']['marriageRegime'];
        $tableThirdLineThirdPage[1]['html'] = 'IDENTIDADE: ' . $value['spouse']['identify'];

        $tableFourLineThirdPage[0]['html'] = 'ORGÃO EXPEDIDOR: ' . $value['spouse']['issuingAuthority'];
        $tableFourLineThirdPage[1]['html'] = 'ESTADO DE EMISSÃO: ' . $value['spouse']['issuingState'];
        $tableFourLineThirdPage[2]['html'] = 'CPF: ' . $value['spouse']['cpf'];

        $tableFiveLineThirdPage[0]['html'] = 'PROFISSÃO: ' . $value['spouse']['profession'];
        $tableFiveLineThirdPage[1]['html'] = 'Email: ' . $value['spouse']['email'];

        $tableSixLineThirdPage[0]['html'] = 'NOME DO PAI ('.$i.'° COMPRADOR): ' . $value['spouse']['dadName'];

        $tableSevenLineThirdPage[0]['html'] = 'NOME DA MÃE ('.$i.'° COMPRADOR): ' . $value['spouse']['momName'];

        $pdf->writeTable($tableFirstLineThirdPage);
        $pdf->writeTable($tableSecondLineThirdPage);
        $pdf->writeTable($tableThirdLineThirdPage);
        $pdf->writeTable($tableFourLineThirdPage);
        $pdf->writeTable($tableFiveLineThirdPage);
        $pdf->writeTable($tableSixLineThirdPage);
        $pdf->writeTable($tableSevenLineThirdPage);

    }

    $pdf->writeTable($tableEightLineThirdPage);
    $pdf->writeTable($tableNineLineThirdPage);
    $pdf->writeTable($tableTenLineThirdPage);
    $pdf->writeTable($tableElevenLineThirdPage);

    $i++;

    $pdf->writeTable($secondTableThirdPage);
    $pdf->writeTable($secondLineSecondTableThirdPage);
    $pdf->writeTable($thirdLineSecondTableThirdPage);
}

# Fim página 3

# Inicio ultima página

$pdf->addPage();

$pdf->writeLine($firstLineFinalPage);

# Fim ultima página

$pdf->download();

# --- Execução ---
