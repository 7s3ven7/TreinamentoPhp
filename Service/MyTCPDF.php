<?php

namespace Service;

require __DIR__ . "/../vendor/autoload.php";

use TCPDF;

class MyTCPDF extends TCPDF
{

    public float $positionY = -1;

    public float $positionX = -1;

    public bool $validator = true;

    public function header(): void
    {

        $this->positionY = -1;
        $this->positionX = -1;

        $header = [
            [
                "position" =>
                    [
                        "X" => 85,
                        "Y" => 20
                    ],
                "cellSize" =>
                    [
                        "width" => 40,
                        "height" => 7
                    ],
                "font" =>
                    [
                        "size" => 16,
                        "style" => "B"
                    ],
                "html" => "PROPOSTA",
                "align" => "C"
            ]
        ];

        parent::Image("img/logo.png", 10, 7.5, 40, 30, 'PNG');
        $this->writeLine($header);

    }

    public function footer(): void
    {

        if ($this->validator) {

            $footer = [
                [
                    "position" =>
                        [
                            "X" => 170,
                            "Y" => -20
                        ],
                    "cellSize" =>
                        [
                            "width" => 60,
                            "height" => 15
                        ],
                    "font" =>
                        [
                            "size" => 12,
                            "style" => "B"
                        ],
                    "html" => "Página " . $this->getAliasNumPage() . " De " . $this->getAliasNbPages(),
                    "align" => "C"
                ]
            ];

            parent::Image("img/footer.png", 10, 270, 160, 15, 'PNG');

            $this->writeLine($footer);

        }

    }


    public function writeLine($data):void
    {

        $this->positionY = parent::GetY();

        foreach($data as $content) {

            if ($this->positionY != -1) {

                $this->positionY += $content['position']['Y'];

            } else {

                $this->positionY = $content['position']['Y'];

            }

            parent::SetFontSpacing(0.15);
            parent::setCellHeightRatio(1.7);
            parent::SetFont('helvetica', $content['font']['style'], $content['font']['size']);

            if($content['html'] == "PROPOSTA")
            {

                parent::writeHTMLCell(
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

                parent::writeHTMLCell(
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

            $this->positionY = parent::GetY();

        }

    }
}