<?php

declare(strict_types=1);

namespace Service;

require __DIR__ . '/../vendor/autoload.php';

use TCPDF;

class MyTCPDF
{

    public TCPDF $function;

    public float $positionY = -1;

    public float $positionX = -1;

    public function __construct()
    {

        $this->function = new TCPDF();

        $this->function->setPrintHeader(false);
        $this->function->setPrintFooter(false);

    }

    public function header(): void
    {
        $this->positionY = -1;
        $this->positionX = -1;

        $header = [
            [
                'position' =>
                    [
                        'X' => 85,
                        'Y' => 20
                    ],
                'cellSize' =>
                    [
                        'width' => 40,
                        'height' => 7
                    ],
                'font' =>
                    [
                        'size' => 16,
                        'style' => 'B'
                    ],
                'html' => 'PROPOSTA',
                'align' => 'C'
            ]
        ];

        $this->function->Image('img/logo.png', 10, 7.5, 40, 30, 'PNG');
        $this->writeLine($header);
    }

    /*public function footer(): void
    {

        if ($this->validator) {

            $footer = [
                [
                    'position' =>
                        [
                            'X' => 170,
                            'Y' => 200
                        ],
                    'cellSize' =>
                        [
                            'width' => 60,
                            'height' => 15
                        ],
                    'font' =>
                        [
                            'size' => 12,
                            'style' => 'B'
                        ],
                    'html' => 'Página' . $this->function->getAliasNumPage() . ' De ' .
                        $this->function->getAliasNbPages(),
                    'align' => 'C'
                ]
            ];

            $this->function->setY(0);
            $this->function->setX(0);

            $this->function->Image('img/footer.png', 10, 270, 160, 15, 'PNG');

            $this->writeLine($footer);

        }

    }*/

    public function writeLine($data):void
    {

        $this->positionY = $this->function->GetY();

        foreach($data as $content) {

            if ($this->positionY != -1) {

                $this->positionY += $content['position']['Y'];

            } else {

                $this->positionY = $content['position']['Y'];

            }

            $this->function->setFontSpacing(0.15);
            $this->function->setCellHeightRatio(1.7);
            $this->function->setFont('helvetica', $content['font']['style'], $content['font']['size']);

            if($content['html'] == 'PROPOSTA')
            {

                $this->function->writeHTMLCell(
                    $content['cellSize']['width'],
                    $content['cellSize']['height'],
                    $content['position']['X'],
                    $this->positionY,
                    $content['html'],
                    'B',
                    true,
                    false,
                    true,
                    $content['align'],
                    false);

            }else
            {

                $this->function->writeHTMLCell(
                    $content['cellSize']['width'],
                    $content['cellSize']['height'],
                    $content['position']['X'],
                    $this->positionY,
                    $content['html'],
                    false,
                    true,
                    false,
                    true,
                    $content['align'],
                    false);

            }

            $this->positionY = $this->function->GetY();

        }

    }
}