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

    /**
     * @var string
     */
    private $_sName = null;

    /**
     * @param string $sName
     */
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

    /**
     * @param selling $oSelling
     */
    public function addSelling( selling $oSelling )
    {
        $this->aSellings[] = $oSelling;
    }

    /**
     * @return string
     */
    public function getBill()
    {
        $fTotal = 0.0;
        $sMessage = 'Rechnung für Kunde ' . $this->getName() . "\n\n";

        /** @var $oSelling selling */
        foreach( $this->getSellings() as $oSelling ) {

            $fSubTotal = $oSelling->getArticleTotal();
            $sMessage .= $oSelling->getArticleMessage();
            $fTotal += $fSubTotal;
        }

        $sMessage .= "\n\nDie Rechnungssumme beträgt: $fTotal\n\n";

        return $sMessage;
    }

}
