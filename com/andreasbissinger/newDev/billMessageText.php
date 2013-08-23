<?php

namespace com\andreasbissinger\newDev;

/**
 * Add class comment
 */
class billMessageText extends billMessage
{
    /**
     * @var selling
     */
    public $_oSelling;

    /**
     * @return string
     */
    public function getBillMessage( array $aSellings, $sName )
    {
        $fTotal   = 0.0;
        $sMessage = 'Rechnung für Kunde ' . $sName . "\n\n";

        foreach ( $aSellings as $oSelling ) {

            $this->_oSelling = $oSelling;
            $fSubTotal = $this->_oSelling->getArticleTotal();
            $sMessage .= $this->getArticleMessage();
            $fTotal += $fSubTotal;
        }

        $sMessage .= "\n\nDie Rechnungssumme beträgt: $fTotal\n\n";

        return $sMessage;
    }


    public function getArticleMessage()
    {
        $sMessage = $this->_oSelling->getAmount() . ' x ' . $this->_oSelling->getArticle()->getName() .
                    ' a ' . $this->_oSelling->getArticle()->getPrice() .
                    ' = ' . $this->_oSelling->getAmount() * $this->_oSelling->getArticle()->getPrice() . "\n";

        if ( $this->_oSelling->hasDiscount() ) {
            $sMessage .= $this->_getDiscountString() . ( $this->_oSelling->getAmount() * $this->_oSelling->getArticle()->getPrice() * $this->_oSelling->getSellingDiscount() ) / 100 . "\n";
        }
        return $sMessage;
    }

    /**
     * @return string
     */
    private function _getDiscountString()
    {
        $sDiscount = (string) $this->_oSelling->getSellingDiscount();

        return 'Rabatt ( ' . $sDiscount . '% ): -';
    }
}
