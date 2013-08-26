<?php

namespace de\andreasbissinger\newDev;

/**
 * This class represents a customer with his sellings. It is used for generating customers bill
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
    public function getBill( $sType = billMessage::TYPE_TEXT )
    {
        $oMessenger = billMessage::getBillMessager( $sType );

        return $oMessenger->getBillMessage( $this->getSellings(), $this->getName() );
    }

}
