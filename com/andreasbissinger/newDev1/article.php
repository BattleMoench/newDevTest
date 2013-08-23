<?php

namespace com\andreasbissinger\newDev;

/**
 * Add class comment
 */
class article
{
    /**
     * Defines the margin types
     * TYPE A =  5% off
     * TYPE B = 10% off
     * TYPE_C = 20% off
     */
    const MARGIN_TYPE_A = 1;
    const MARGIN_TYPE_B = 2;
    const MARGIN_TYPE_C = 3;

    /**
     * @var float
     */
    private $_fPrice = 0.0;

    /**
     * @var string
     */
    private $_sName = null;

    /**
     * @var int
     */
    private $_iMarginType = null;

    /**
     * @var array
     */
    private $_aDiscounts = array( self::MARGIN_TYPE_A => 5, self::MARGIN_TYPE_B => 10, self::MARGIN_TYPE_C => 20 );

    /**
     * @param string $sName
     * @param float  $fPrice
     * @param int    $iMarginType
     */
    public function __construct( $sName, $fPrice, $iMarginType )
    {
    $this->_sName = $sName;
    $this->_fPrice = $fPrice;
    $this->_iMarginType = $iMarginType;
    }

    /**
     * Get the
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->_fPrice;
    }

    /**
     * Get the
     *
     * @return null
     */
    public function getMarginType()
    {
        return $this->_iMarginType;
    }

    public function getDiscountInPercent()
    {
        return $this->_aDiscounts[ $this->getMarginType() ];
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

}
