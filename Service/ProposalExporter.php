<?php
namespace Service;

use TCPDF;

require __DIR__ . "/../vendor/autoload.php";

class ProposalExporter extends TCPDF
{

    public object $pdf;

    public float $positionY = -1;

    public float $positionX = -1;

    public float $line = 0;

    public function __construct()
    {
        
        $this->pdf = parent::__construct();

        $this->header();

    }

    public function header():void
    {

        $this->pdf->addPage();

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

        $this->pdf->Image("img/logo.png",10,7.5,40,30,'PNG');
        $this->write($header);

    }

    public function setMetaData($property):void
    {

        $this->pdf->setCreator('Termonos');
        $this->pdf->setAuthor('CarvalhoImoveis');
        $this->pdf->setTitle('Proposta de compra');
        $this->pdf->setSubject($property);

    }

    public function writeLine($data):void
    {

        foreach($data as $line => $content) {

            if ($this->positionY != -1) {

                $this->positionY += + $content['position']['Y'];

            } else {

                $this->positionY = $content['position']['Y'];

            }

            $this->pdf->SetFontSpacing(0.15);
            $this->pdf->setCellHeightRatio(1.7);
            $this->pdf->SetFont('helvetica', $content['font']['style'], $content['font']['size']);

            if($content['html'] == "PROPOSTA")
            {

                $this->pdf->writeHTMLCell(
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

                $this->pdf->writeHTMLCell(
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

            $this->positionY = $this->pdf->GetY();

        }

    }

    public function writeTable($data):void
    {

        foreach($data as $line => $content) {


            if ($this->positionX != -1) {

                $positionX = $this->positionX + $content['position']['X'];

            } else {

                $positionX = $content['position']['X'];

            }

            if ($this->positionY != -1) {

                $this->positionY += + $content['position']['Y'];

            } else {

                $this->positionY = $content['position']['Y'];

            }

            $this->pdf->SetFontSpacing(0.15);
            $this->pdf->SetFont('Helvetica', $content['font']['style'], $content['font']['size']);
            $this->pdf->writeHTMLCell(
                $content['cellSize']['width'],
                $content['cellSize']['height'],
                $positionX,
                $this->positionY,
                $content['html'],
                true,
                true,
                false,
                true,
                $content['align'],
                true);

            $this->positionX = $this->pdf->GetX();

        }

        $this->positionY = $this->pdf->GetY();
        $this->positionX = -1;

    }

    public function download():void
    {

        $this->pdf->output('I');

    }

}