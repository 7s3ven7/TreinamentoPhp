<?php

declare(strict_types=1);

namespace Service;

require __DIR__ . '/../vendor/autoload.php';

use Validator\DataValidator;

class ToStorePageFormat
{

    public object $data;

    public string $message;

    public array $pageOne, $pageTwo, $pageThree, $lastPage;

    public function __construct()
    {

        $this->data = new DataValidator();

        $validator = $this->data->getValues();

        if(!$validator)
        {

            $this->message = 'Alguma variável não foi setada corretamente';

        }else{

            $this->message = 'tudo certo pode prosseguir';

        }

        $this->preparePages();

    }

    public function pageOne():void
    {

        # Inicio dados página 1

        $propertyTitle = [
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 10
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 15
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => 'Esta PROPOSTA é referente ao lote de terreno nº' . $this->data->plot . ', da quadra ' . $this->data->square . ', do Loteamento <b>' . $this->data->property . '</b>, localizado em Araruama-RJ com as seguintes dimensões.',
                'align' => 'J'
            ]
        ];

        $headerTableSize = [
            [
                'position' =>
                    [
                        'X' => 20,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 9,
                    'style' => 'B'
                ],
                'html' => 'FRENTE',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 9,
                    'style' => 'B'
                ],
                'html' => 'FUNDOS',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 9,
                    'style' => 'B'
                ],
                'html' => 'LADO DIREITO',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 9,
                    'style' => 'B'
                ],
                'html' => 'LADO ESQUERDO',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 9,
                    'style' => 'B'
                ],
                'html' => 'AREÁ TOTAL (M²)',
                'align' => 'C',
                'border' => true
            ],
        ];

        $bodyTableSize = [
            [
                'position' =>
                    [
                        'X' => 20,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => $this->data->front,
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => $this->data->back,
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => $this->data->rightSide,
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => $this->data->leftSide,
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => $this->data->totalArea,
                'align' => 'C',
                'border' => true
            ],
        ];

        $twoParagrafeAfterTableSize = [
            [
                'position' =>
                    [
                        'X' => 7.5,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 195,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '1. Estipula-se, que o valor aqui acordado trata-se de remuneração ao CORRETOR, ficando sob a responsabilidade do 
            adquirente do imóvel, declarando o mesmo a concordância com o encargo ora estipulado.',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 7.5,
                        'Y' => 2.5
                    ],
                'cellSize' =>
                    [
                        'width' => 195,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '2. Taxa de CORRETAGEM no valor total de ' . $this->data->values['price'] . ', podendo ser dividida em até ' . $this->data->values['installmentNumber'] . ' parcelas. ',
                'align' => 'L'
            ],
        ];

        $headerTablePrice = [
            [
                'position' =>
                    [
                        'X' => 20,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => 'PARCELAS',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => 'VALORE (R$)',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => 'DATA',
                'align' => 'C',
                'border' => true
            ],
        ];

        $bodyTablePrice = [
            [
                'position' =>
                    [
                        'X' => 20,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '0',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => 'O valor é imputado depois',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => date('d/m/Y'),
                'align' => 'C',
                'border' => true
            ],
        ];

        $footerTablePrice = [
            [
                'position' =>
                    [
                        'X' => 20,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 35,
                        'height' => 14
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => 'TOTAL CORRETAGEM',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 14
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => $this->data->values['price'],
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 14
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => '',
                'align' => 'C',
                'border' => true
            ],
        ];

        $twoParagrafeAfterTablePrice = [
            [
                'position' =>
                    [
                        'X' => 7.5,
                        'Y' => 2.5
                    ],
                'cellSize' =>
                    [
                        'width' => 195,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '3. O preço do lote à vista é de ' . $this->data->values['price'] . '.',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 7.5,
                        'Y' => 2.5
                    ],
                'cellSize' =>
                    [
                        'width' => 195,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '4. Condições de Pagamento do Lote:',
                'align' => 'L'
            ],
        ];

        $headerTableConditionsOfPayment = [
            [
                'position' =>
                    [
                        'X' => 35,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => 'N° PARCELAS',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => 'VALOR DA PARCELA',
                'align' => 'C',
                'border' => true
            ],
        ];

        $bodyTableConditionsOfPayment = [
            [
                'position' =>
                    [
                        'X' => 35,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => $this->data->values['price'],
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => 'R$' . $this->data->values['installmentValue'][0],
                'align' => 'C',
                'border' => true
            ]
        ];

        $lastParagrafeAfterTableConditionsOfPayment = [
            [
                'position' =>
                    [
                        'X' => 7.5,
                        'Y' => 2.5
                    ],
                'cellSize' =>
                    [
                        'width' => 195,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '5. O pagamento das parcelas referentes ao lote iniciará somente após a quitação de todas as parcelas relativas a
corretagem e a assinatura do contrato com a Lotecon Paracatu Empreendimentos Imobiliários Ltda.
mensais, vencendo a 1ª (primeira) e as demais consecutivamente a cada 30 dias corridos, a partir da data de pagemento da última parcela dos honorários de CORRETAGEM especificada no item 2 dessa proposta.',
                'align' => 'L'
            ],
        ];

        $bodyTablePriceAll = ['table' => true, $headerTablePrice];

        for($i = 1;$i <= $this->data->values['installmentNumber'];$i++)
        {

            $bodyTablePrice[0]['html'] = $i;

            $bodyTablePrice[1]['html'] = 'R$'.$this->data->values['installmentValue'][$i-1];

            if($i != 1){
                $bodyTablePrice[2]['html'] = '- - -';
            }

            $bodyTablePriceAll[] = $bodyTablePrice;

        }

        $bodyTablePriceAll[] = $footerTablePrice;

        $this->pageOne = [['table' => false, $propertyTitle], ['table' => true, $headerTableSize, $bodyTableSize], ['table' => false, $twoParagrafeAfterTableSize], $bodyTablePriceAll, ['table' => false, $twoParagrafeAfterTablePrice], ['table' => true, $headerTableConditionsOfPayment, $bodyTableConditionsOfPayment], ['table' => false, $lastParagrafeAfterTableConditionsOfPayment]];

        # Fim dados página 1

    }

    public function pageTwo():void
    {

        # Inicio dados página 2

        $eightParagrafe = [
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 10
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 40
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => '6. O Promitente Comprador(a) declara ter ciência sobre a assinatura do CONTRATO DE PROMESSA DE COMPRA E 
VENDA, no prazo máximo de 30 dias após a finalização do pagamento dos honorários de corretagem, sob pena de 
desfazimento do negócio sem direito à devolução dos valores pagos, nos termos dos artigos 418 e 422 do Código 
Civil.  A  assinatura  do  contrato  poderá  ser  realizada  preferencialmente  de  forma  digital  e  remota  através  da 
ferramenta “Docusign” disponibilizada pela empresa ou excepcionalmente de forma presencial na sede da empresa 
na Rua Gen. Andrade Neves, 9, sala 1105, Centro, Niterói-RJ, <u>somente mediante de agendamento prévio.</u>',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 20
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => '7. O saldo do preço, em caso de financiamento, sofrerá a incidência de 1% de juros ao mês e o valor das prestações 
será corrigido monetariamente a cada 12 (doze) meses pelo Índice Geral de Preços de Mercado (IGP-M) ou por outro 
que vier a substitui-lo.',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 20
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '8. A primeira parcela referente aos honorários de CORRETAGEM deverá ser paga no ato da assinatura do presente 
termo,  sendo  as  demais  parcelas  pagas  através  de  boletos  bancários,  que  serão  encaminhados  a  cada  mês  ao 
promitente comprador(a), após a quitação da parcela anterior.',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 20
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => '9. O não pagamento das parcelas nas datas acima convencionadas acarretará na aplicação de multa equivalente a 
2% (dois por cento) do valor da referida parcela, bem como a aplicação de juros mensais de 1% (um por cento).',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 20
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => '10. Em caso de atraso superior a 30 (trinta) dias na quitação de quaisquer das parcelas, por culpa exclusiva do 
Promitente Comprador(a) ou em caso de desistência, a presente proposta será cancelada e, por se tratar de valores 
referentes a honorários de CORRETAGEM, não será restituída a quantia já paga, na forma do art. 725 do C.C.',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 20
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => '11. O  Promitente  Comprador(a)  se  declara  ciente  de  que,  só  será  autorizado  a  iniciar  qualquer  obra  no  lote 
adquirido, após a quitação de no mínimo de 06 (seis) prestações consecutivas de seu CONTRATO DE PROMESSA DE 
COMPRA  E  VENDA;  tenha  obtido  autorização  por  escrito  da  Promitente  Vendedora  para  realizá-la;  e  tenha 
apresentado  o  projeto  aprovado  e  o  alvará  de  licença  da  construção  emitidos  pelos  órgãos  competentes  da 
Prefeitura  Municipal  de  Araruama-RJ,  respeitando  todas  as  legislações  dos  órgãos  municipais  e  estaduais 
pertinentes em vigor.',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 20
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '12. O empreendimento trata-se de um LOTEAMENTO, onde os serviços de manutenção e capina de ruas, coleta de 
lixo, fornecimento de água e luz, assim como outros serviços públicos são de responsabilidade dos órgãos públicos e 
ou concessionárias responsáveis por tais serviços, não cabendo a Promitente Vendedora qualquer responsabilidade 
com respeito a tais serviços ou obras necessárias. ',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '13. Loteamento Registrado no Cartório do 1º Ofício de Araruama-RJ, sob o R.08 da matrícula nº 7179.',
                'align' => 'L'
            ]
        ];

        # Fim dados página 2

        $this->pageTwo = [['table' => false, $eightParagrafe]];

    }

    public function pageThree():void
    {

        # Inicio dados página 3

        $title = [
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 10
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 8,
                    'style' => 'B'
                ],
                'html' => 'DADOS DO PROMIENTE COMPRADOR',
                'align' => 'C'
            ],
        ];

        $headerResearch = [
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 10
                    ],
                'cellSize' =>
                    [
                        'width' => 70,
                        'height' => 18
                    ],
                'font' => [
                    'size' => 10,
                    'style' => 'B'
                ],
                'html' => 'CONHECEU O EMPREENDIMENTO ATRAVÉS DE:',
                'align' => 'C',
                'border' => true
            ],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 122,
                        'height' => 18
                    ],
                'font' => [
                    'size' => 0,
                    'style' => ''
                ],
                'html' => '',
                'align' => 'C',
                'border' => true
            ],
        ];

        $bodyResearch = [
            [
                'position' =>
                    [
                        'X' => 80,
                        'Y' => -18
                    ],
                'cellSize' =>
                    [
                        'width' => 25,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => 'INTERNET',
                'align' => 'C'
                ,
                'border' => ''],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 25,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => 'PANFLETO',
                'align' => 'C'
                ,
                'border' => ''],
            [
                'position' =>
                    [
                        'X' => 0,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 25,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => 'OUTROS:',
                'align' => 'C'
                ,
                'border' => ''],
        ];

        $squareResearch = [
            [
                'position' =>
                    [
                        'X' => 89,
                        'Y' => 2
                    ],
                'cellSize' =>
                    [
                        'width' => 6,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '',
                'align' => 'C'
                ,
                'border' => true],
            [
                'position' =>
                    [
                        'X' => 19,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 6,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '',
                'align' => 'C'
                ,
                'border' => true],
            [
                'position' =>
                    [
                        'X' => 19,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 6,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '',
                'align' => 'C'
                ,
                'border' => true],
            [
                'position' =>
                    [
                        'X' => 5,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 50,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '',
                'align' => 'C',
                'border' => 'B']
        ];

        $arrayTotalData = [['table' => false, $title]];
        $i = 1;
        foreach($this->data->buyer as $index => $value)
        {

            # Inicio dados Comprador

            $firstLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 5
                        ],
                    'cellSize' =>
                        [
                            'width' => 192,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'NOME '.$i.'° COMPRADOR: ' . $index,
                    'align' => 'L',
                    'border' => 'B'
                ],
            ];

            $secondLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 64,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'NACIONALIDADE: ' . $value['nationality'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 64,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'DATA NASCIMENTO: ' . $value['birthDate'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 64,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'Estado Civil: ' . $value['civilState'],
                    'align' => 'L',
                    'border' => 'B'],
            ];

            $thirdLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 128,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'REGIME DE CASAMENTO: ' . $value['marriageRegime'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 64,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'IDENTIDADE: ' . $value['identify'],
                    'align' => 'L',
                    'border' => 'B']
            ];

            $fourLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 64,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'ORGÃO EXPEDIDOR: ' . $value['issuingAuthority'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 64,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'ESTADO DE EMISSÃO: ' . $value['issuingState'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 64,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'CPF: ' . $value['cpf'],
                    'align' => 'L',
                    'border' => 'B']
            ];

            $fiveLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 64,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'PROFISSÃO: ' . $value['profession'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 128,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'EMAIL: ' . $value['email'],
                    'align' => 'L',
                    'border' => 'B']
            ];

            $sixLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 192,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'NOME DO PAI ('.$i.'° COMPRADOR): ' . $value['dadName'],
                    'align' => 'L',
                    'border' => 'B']
            ];

            $sevenLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 192,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'NOME DA MÃE ('.$i.'° COMPRADOR): ' . $value['momName'],
                    'align' => 'L',
                    'border' => 'B']
            ];

                # aparece no final da página depois do spouse

            $eightLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 5
                        ],
                    'cellSize' =>
                        [
                            'width' => 192,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'ENDEREÇO RESIDENCIAL: ' . $value['residencialAddress'],
                    'align' => 'L',
                    'border' => 'B']
            ];

            $nineLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 96,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'TELEFONE RESIDENCIAL: ' . $value['residencialPhone'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 96,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'TELEFONE CELULAR: ' . $value['cellPhone'],
                    'align' => 'L',
                    'border' => 'B']
            ];

            $tenLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 96,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'BAIRRO: ' . $value['neighborhood'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 96,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'MUNICÍPIO: ' . $value['municipality'],
                    'align' => 'L',
                    'border' => 'B']
            ];

            $elevenLine = [
                [
                    'position' =>
                        [
                            'X' => 10,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 96,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'ESTADO: ' . $value['state'],
                    'align' => 'L',
                    'border' => 'B'],
                [
                    'position' =>
                        [
                            'X' => 0,
                            'Y' => 0
                        ],
                    'cellSize' =>
                        [
                            'width' => 96,
                            'height' => 5
                        ],
                    'font' => [
                        'size' => 10,
                        'style' => ''
                    ],
                    'html' => 'CEP: ' . $value['cep'],
                    'align' => 'L',
                    'border' => 'B']
            ];

                # acima aparece no final da página depois do spouse

            # Fim dados Comprador

            $arrayTotalData[] = ['table' => true, 'spouse' => false, $firstLine, $secondLine, $thirdLine, $fourLine, $fiveLine, $sixLine, $sevenLine];

            if(!$value['spouse'] == [])
            {

                $firstLine[0]['html'] = 'NOME CÔNJUGE '.$i.'° COMPRADOR: ' . $value['spouse']['name'];

                $secondLine[0]['html'] = 'NACIONALIDADE: ' . $value['spouse']['nationality'];
                $secondLine[1]['html'] = 'DATA NASCIMENTO: ' . $value['spouse']['birthDate'];
                $secondLine[2]['html'] = 'ESTADO CIVIL: ' . $value['spouse']['civilState'];

                $thirdLine[0]['html'] = 'REGIME DE CASAMENTO: ' . $value['spouse']['marriageRegime'];
                $thirdLine[1]['html'] = 'IDENTIDADE: ' . $value['spouse']['identify'];

                $fourLine[0]['html'] = 'ORGÃO EXPEDIDOR: ' . $value['spouse']['issuingAuthority'];
                $fourLine[1]['html'] = 'ESTADO DE EMISSÃO: ' . $value['spouse']['issuingState'];
                $fourLine[2]['html'] = 'CPF: ' . $value['spouse']['cpf'];

                $fiveLine[0]['html'] = 'PROFISSÃO: ' . $value['spouse']['profession'];
                $fiveLine[1]['html'] = 'Email: ' . $value['spouse']['email'];

                $sixLine[0]['html'] = 'NOME DO PAI ('.$i.'° COMPRADOR): ' . $value['spouse']['dadName'];

                $sevenLine[0]['html'] = 'NOME DA MÃE ('.$i.'° COMPRADOR): ' . $value['spouse']['momName'];

                $arrayTotalData[] = ['table' => true, 'spouse' => false, $firstLine, $secondLine, $thirdLine, $fourLine, $fiveLine, $sixLine, $sevenLine, $eightLine, $nineLine, $tenLine, $elevenLine];

            }else{

                $arrayTotalData[] = ['table' => true, 'spouse' => false, $eightLine, $nineLine, $tenLine, $elevenLine];

            }

            $arrayTotalData[] =  ['table' => true, 'spouse' => true, $headerResearch, $bodyResearch, $squareResearch];

            $i++;

        }


        $this->pageThree = $arrayTotalData;

        # Fim dados página 3

    }

    public function lastPage():void
    {

        $description = [
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 25
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '<b>obs1:</b> Em sendo as parcelas acima descritas, pagas através de boletos bancários, toma ciência neste momento o 
Promitente Comprador(a), expressando desde já a sua concordância, de que, em caso de inconsistência dos dados 
acima  fornecidos,  é  de  sua  inteira  responsabilidade,  a  retirada  dos  boletos  diretamente  com  o  corretor  Adebar 
Rodrigues de Carvalho, no seguinte endereço: Estrada dos Menezes, 850, sala 1014, Colubandê, São Gonçalo, restando 
da mesma forma estipulado que o não recebimento do boleto bancário não eximirá o Promitente Comprador(a) do 
pagamento da referida parcela, devendo o mesmo entrar em contato através dos telefones contidos no rodapé deste 
documento.',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 5
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => '<b>Obs2:</b> Para que tenha validade, a presente Proposta de Compra, NECESSÁRIAMENTE, deverá conter a assinatura dos 
Corretores ADEBAR RODRIGUES DE CARVALHO, CRECI/RJ 050812 e/ou ADEBAR IVO DE CARVALHO, CRECI/RJ 043819 
e/ou ANDERSON RODRIGUES DE CARVALHO, CRECI/RJ 074932. ',
                'align' => 'L'
            ],
            [
                'position' =>
                    [
                        'X' => 10,
                        'Y' => 15
                    ],
                'cellSize' =>
                    [
                        'width' => 190,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 10,
                    'style' => ''
                ],
                'html' => 'Local _____________, _______ de _____________ de __________. ',
                'align' => 'C'
            ]
        ];

        $buyerSignature = [
            [
                'position' =>
                    [
                        'X' => 45,
                        'Y' => 35
                    ],
                'cellSize' =>
                    [
                        'width' => 120,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 9,
                    'style' => ''
                ],
                'html' => 'PROMITENTE COMPRADOR(A)',
                'align' => 'C',
                'border' => 'T'
            ]
        ];

        $sellSignature = [
            [
                'position' =>
                    [
                        'X' => 12.5,
                        'Y' => 15
                    ],
                'cellSize' =>
                    [
                        'width' => 90,
                        'height' => 5
                    ],
                'font' => [
                    'size' => 9,
                    'style' => ''
                ],
                'html' => 'CORRETOR CRECI/RJ N° ________________',
                'align' => 'C',
                'border' => 'T'
            ],
            [
                'position' =>
                    [
                        'X' => 5,
                        'Y' => 0
                    ],
                'cellSize' =>
                    [
                        'width' => 90,
                        'height' => 10
                    ],
                'font' => [
                    'size' => 9,
                    'style' => ''
                ],
                'html' => 'CORRETOR PARCEIRO CRECI/RJ N° ____________',
                'align' => 'C',
                'border' => 'T'
            ],
        ];

        $this->lastPage = [['table' => false, $description], ['table' => true, $buyerSignature, $sellSignature]];

    }

    public function preparePages():void
    {

        $this->pageOne();

        $this->pageTwo();

        $this->pageThree();

        $this->lastPage();

    }

}