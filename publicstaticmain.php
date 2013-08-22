<?php

use com\andreasbissinger\newDev\article;
use com\andreasbissinger\newDev\customer;
use com\andreasbissinger\newDev\selling;

$sBasePath = dirname( __FILE__ );
define( BASE_PATH, $sBasePath );
echo "\n".$sBasePath ."\n";

function __autoload( $sClass ) {
    $sClass = str_replace( '\\', '/', $sClass );
    $sClassName = BASE_PATH . '/' . $sClass . '.php';
    require_once $sClassName;
}

$oCustomer = new customer( 'me@myself' );

$oArticle1 = new article( 'art1', 0.12, article::MARGIN_TYPE_A );
$oSelling1 = new selling( $oArticle1, 30 );
$oCustomer->addSelling( $oSelling1 );

$oArticle2 = new article( 'art2', 1.28, article::MARGIN_TYPE_B);
$oSelling2 = new selling( $oArticle2, 20 );
$oCustomer->addSelling( $oSelling2 );

$oArticle3 = new article( 'art3', 0.55, article::MARGIN_TYPE_C );
$oSelling3 = new selling( $oArticle3, 25 );
$oCustomer->addSelling( $oSelling3 );

$oArticle4 = new article( 'art4', 0.10, article::MARGIN_TYPE_A );
$oSelling4 = new selling( $oArticle4, 10 );
$oCustomer->addSelling( $oSelling4 );

$sBill = $oCustomer->getBill();

$sExpected = "Rechnung für Kunde me@myself\n\n30 x art1 a 0.12 = 3.6\nRabatt ( 5% ): -0.18\n20 x art2 a 1.28 = 25.6\nRabatt ( 10% ): -2.56\n25 x art3 a 0.55 = 13.75\nRabatt ( 20% ): -2.75\n10 x art4 a 0.1 = 1\n\n\nDie Rechnungssumme beträgt: 38.46\n\n";

echo $sBill;

$blResult = $sExpected == $sBill ? true : false;;
if (!$blResult) {
    echo "\n---------------------------------------------\n" . $sExpected . "\n\nMIST\n";
} else {
    echo "\n\nFEIN\n";
}
