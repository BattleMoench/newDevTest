<?php
/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @link http://www.oxid-esales.com
 * @package package_name
 * @copyright © OXID eSales AG 2003-2013
 */

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

$oArticle2 = new article( 'art1', 0.12, article::MARGIN_TYPE_B);
$oSelling2 = new selling( $oArticle2, 30 );
$oCustomer->addSelling( $oSelling2 );

$oArticle3 = new article( 'art1', 0.12, article::MARGIN_TYPE_C );
$oSelling3 = new selling( $oArticle3, 30 );
$oCustomer->addSelling( $oSelling3 );

$sBill = $oCustomer->getBill();

echo $sBill;
