<?php

namespace com\andreasbissinger\newDev;

/**
 * Add class comment
 */
class customer
{
    /**
     * @var array Array contains selling
     */
    private $aSellings = array();

    private $_sName = null;

    public function __construct( $sName )
    {
        $this->_sName = $sName;
    }

    /**
     * Get the
     *
     * @return null
     */
    public function getName()
    {
        return $this->_sName;
    }

    /**
     * Get the
     *
     * @return array
     */
    public function getSellings()
    {
        return $this->aSellings;
    }

    public function addSelling( selling $oSelling )
    {
        $this->aSellings[] = $oSelling;
    }

    public function getBill()
    {
        $fTotal = 0.0;
        $sMessage = 'Rechnung für Kunde ' . $this->getName() . "\n\n";

        /** @var $oSelling selling */
        foreach( $this->getSellings() as $oSelling ) {
            $sMessage .= $oSelling->getAmount() . ' x ' . $oSelling->getArticle()->getName() .
                         ' a ' . $oSelling->getArticle()->getPrice() .
                         ' = ' . $oSelling->getAmount() * $oSelling->getArticle()->getPrice() . "\n";
            $fSubTotal = $oSelling->getAmount() * $oSelling->getArticle()->getPrice();

            $oSelling->handleDiscount( $sMessage, $fSubTotal );
            $fTotal += $fSubTotal;
        }

        $sMessage .= "\n\nDie Rechnungssumme beträgt: $fTotal\n\n";

        return $sMessage;
    }

}
