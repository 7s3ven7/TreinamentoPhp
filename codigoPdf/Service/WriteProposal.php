<?php

declare(strict_types=1);

namespace Service;

require __DIR__ . '/../vendor/autoload.php';


class WriteProposal
{

    public object $pdf;

    public float $line = 0;

    public function __construct()
    {
        
        $this->pdf = new MyTCPDF();

        $this->pdf->function->setColor('fill',255,255,255);

    }

    public function setMetaData($property):void
    {

        $this->pdf->function->setCreator('Termonos');
        $this->pdf->function->setAuthor('CarvalhoImoveis');
        $this->pdf->function->setTitle('Proposta de compra');
        $this->pdf->function->setSubject($property);

    }

    public function writeLine($data):void
    {

        foreach($data as $content) {

            if ($this->pdf->positionY != -1) {

                $this->pdf->positionY += $content['position']['Y'];

            } else {

                $this->pdf->positionY = $content['position']['Y'];

            }

            $this->pdf->function->setFontSpacing(0.15);
            $this->pdf->function->setCellHeightRatio(1.7);
            $this->pdf->function->setFont('helvetica', $content['font']['style'], $content['font']['size']);

            if($content['html'] == 'PROPOSTA')
            {

                $this->pdf->function->writeHTMLCell(
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

                $this->pdf->function->writeHTMLCell(
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

            $this->pdf->positionY = $this->pdf->function->GetY();

        }

    }

    public function writeTable($data):void
    {

        foreach($data as $content) {


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


            $this->pdf->function->setFontSpacing(0.15);
            $this->pdf->function->setFont('Helvetica', $content['font']['style'], $content['font']['size']);
            $this->pdf->function->writeHTMLCell(
                $content['cellSize']['width'],
                $content['cellSize']['height'],
                $positionX,
                $this->pdf->positionY,
                $content['html'],
                $content['border'],
                true,
                false,
                true,
                $content['align']);

            $this->pdf->positionX = $this->pdf->function->GetX();

        }

        $this->pdf->positionY = $this->pdf->function->GetY();
        $this->pdf->positionX = -1;

    }

    public function addPage():void
    {

        $this->pdf->function->AddPage();

        $this->pdf->function->writeHTMLCell(255,275,0,0,'',false,false,true,false);

        $this->pdf->header();

    }

    public function download():void
    {

        $this->pdf->function->Output('I');

    }

    public function writePage($page,$finalVerify):void
    {

        if(!$finalVerify){

            $this->addPage();

        }

        # Foreach para separar as linhas dos arrays


        foreach($page as $line)
        {
            # Verifica se é tabela.

            if($line['table'])
            {

                # Não importa os dados das variáveis 'table' e 'spouse' para a tela.

                foreach($line as $index => $row){

                    if($index != 'table' and $index != 'spouse')
                    {

                        $this->writeTable($row);

                    }

                }

                # Verifica se tem a variável spouse no array, se tiver, adiciona outra página para o próximo comprador

                if(isset($line['spouse']))
                {

                    if($line['spouse'])
                    {

                        $this->writePage([$page[0]],false);

                    }

                }

            }else{

                # Verifica se é Linha/Texto solto.

                foreach($line as $index => $row){

                    if($index != 'table')
                    {

                        $this->writeLine($row);

                    }

                }

            }

        }

    }

}