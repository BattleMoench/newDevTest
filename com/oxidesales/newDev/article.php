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

namespace com\oxidesales\newDev;

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
