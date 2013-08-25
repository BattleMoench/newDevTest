<?php

namespace com\andreasbissinger\newDev;

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
     * @var string Customers name
     */
    private $_sName = null;

    /**
     * Create a customer object and set customers name
     *
     * @param string $sName
     *
     * @return customer
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
     * Get all sellings of current customer
     *
     * @return array Array containing selleings
     */
    public function getSellings()
    {
        return $this->aSellings;
    }
    /**
     * Add a selling to customers sellings list
     *
     * @param selling $oSelling A selling
     *
     * @return null
     */
    public function addSelling( selling $oSelling )
    {
        $this->aSellings[] = $oSelling;
    }

    /**
     * Create a string that contains all articles, it's count and discounts and a total to use in bill.
     *
     * @return string
     */
    public function getBill( $sType = billMessage::TYPE_TEXT )
    {
        $oMessenger = billMessage::getBillMessager( $sType );

        return $oMessenger->getBillMessage( $this->getSellings(), $this->getName() );
    }

}
