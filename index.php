<?php

require __DIR__ . "/vendor/autoload.php";

use Service\WriteProposal;
use Service\ToStorePageFormat;

$valor = new ToStorePageFormat();
$pdf = new WriteProposal();

$pdf->setMetaData($valor->data->property);

$pdf->writePage($valor->pageOne, false);
$pdf->writePage($valor->pageTwo, false);
$pdf->writePage($valor->pageThree, false);
$pdf->writePage($valor->lastPage, true);

$pdf->download();
