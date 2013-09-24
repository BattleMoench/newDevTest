<?php

namespace de\andreasbissinger\newDev0;

/**
 * Add class comment
 */
class customer
{

    public static function getBill( $sName, $aSellings )
    {
        $fTotal = 0.0;
        $sMessage = 'Rechnung für Kunde ' . $sName . "\n\n";

        /** @var $oSelling selling */
        foreach( $aSellings as $oSelling ) {
            $sMessage .= $oSelling->amount . ' x ' . $oSelling->getArticle()->getName() .
                         ' a ' . $oSelling->getArticle()->getPrice() .
                         ' = ' . $oSelling->amount * $oSelling->getArticle()->getPrice() . "\n";
            $fSubTotal = $oSelling->amount * $oSelling->getArticle()->getPrice();
            if ( 20 <= $oSelling->amount ) {
                switch ( $oSelling->getArticle()->getMarginType() ) {
                    case article::MARGIN_TYPE_A:
                        $sMessage .= 'Rabatt ( 5% ): -' . ( $oSelling->amount * $oSelling->getArticle()->getPrice() * 5 ) / 100 . "\n";
                        $fSubTotal -= ( $oSelling->amount * $oSelling->getArticle()->getPrice() * 5 ) / 100;
                        break;
                    case article::MARGIN_TYPE_B:
                        $sMessage .= 'Rabatt ( 10% ): -' . ( $oSelling->amount * $oSelling->getArticle()->getPrice() * 10 ) / 100 . "\n";
                        $fSubTotal -= ( $oSelling->amount * $oSelling->getArticle()->getPrice() * 10 ) / 100;
                        break;
                    case article::MARGIN_TYPE_C:
                        $sMessage .= 'Rabatt ( 20% ): -' . ( $oSelling->amount * $oSelling->getArticle()->getPrice() * 20 ) / 100 . "\n";
                        $fSubTotal -= ( $oSelling->amount * $oSelling->getArticle()->getPrice() * 20 ) / 100;
                        break;
                }
            }
            $fTotal += $fSubTotal;
        }

        $sMessage .= "\n\nDie Rechnungssumme beträgt: $fTotal\n\n";

        return $sMessage;
    }
}
