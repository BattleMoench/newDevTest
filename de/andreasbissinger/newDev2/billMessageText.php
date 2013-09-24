<?php

namespace de\andreasbissinger\newDev;

/**
 * This class creates message strings that are used for printing a bill in text format.
 */
class billMessageText extends billMessage
{
    /**
     * @var selling
     */
    public $_oSelling;

    /**
     * Create a message string containing all articles, amount of this and possible discounts and a final price
     *
     * @param array  $aSellings Array containing selling objects
     * @param string $sName     Name of customer to create bill for
     *
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

    /**
     * Create a message string containing data for one selling. This includes the possible discount.
     *
     * @return string
     */
    public function getArticleMessage()
    {
        $sMessage = $this->_oSelling->getAmount() . ' x ' . $this->_oSelling->getArticle()->getName() .
                    ' a ' . $this->_oSelling->getArticle()->getPrice() .
                    ' = ' . $this->_oSelling->getArticleBrutPrice() . "\n";

        if ( $this->_oSelling->hasDiscount() ) {
            $sMessage .= $this->_getDiscountString() . $this->_oSelling->getArticleTotal() . "\n";
        }
        return $sMessage;
    }

    /**
     * Create a discount text
     *
     * @return string
     */
    private function _getDiscountString()
    {
        $sDiscount = (string) $this->_oSelling->getSellingDiscount();

        return 'Rabatt ( ' . $sDiscount . '% ): -';
    }
}
