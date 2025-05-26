<?php
namespace Service;

require __DIR__ . "/../vendor/autoload.php";

use Service\MyTCPDF;

class ProposalExporter
{

    public object $pdf;

    public float $line = 0;

    public function __construct()
    {
        
        $this->pdf = new MyTCPDF;

        $this->pdf->AddPage();

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

            if ($this->pdf->positionY != -1) {

                $this->pdf->positionY += $content['position']['Y'];

            } else {

                $this->pdf->positionY = $content['position']['Y'];

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
                    $this->pdf->positionY,
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
                    $this->pdf->positionY,
                    $content['html'],
                    false,
                    true,
                    false,
                    true,
                    $content['align'],
                    false);

            }

            $this->pdf->positionY = $this->pdf->GetY();

        }

    }

    public function writeTable($data):void
    {

        foreach($data as $line => $content) {


            if ($this->pdf->positionX != -1) {

                $positionX = $this->pdf->positionX + $content['position']['X'];

            } else {

                $positionX = $content['position']['X'];

            }

            if ($this->pdf->positionY != -1) {

                $this->pdf->positionY += + $content['position']['Y'];

            } else {

                $this->pdf->positionY = $content['position']['Y'];

            }

            $this->pdf->SetFontSpacing(0.15);
            $this->pdf->SetFont('Helvetica', $content['font']['style'], $content['font']['size']);
            $this->pdf->writeHTMLCell(
                $content['cellSize']['width'],
                $content['cellSize']['height'],
                $positionX,
                $this->pdf->positionY,
                $content['html'],
                $content['border'],
                true,
                false,
                true,
                $content['align'],
                true);

            $this->pdf->positionX = $this->pdf->GetX();

        }

        $this->pdf->positionY = $this->pdf->GetY();
        $this->pdf->positionX = -1;

    }

    public function addPage():void
    {

        $this->pdf->AddPage();

    }

    public function download():void
    {

        $this->pdf->output('I');

    }

    public function getY():float
    {

        return $this->pdf->GetY();

    }

}