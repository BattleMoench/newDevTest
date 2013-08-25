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

namespace com\andreasbissinger\newDev;

/**
 * This class represents a article containing a name, a price and a margin type
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
     * @var float Price ot article
     */
    private $_fPrice = 0.0;

    /**
     * @var string Name of article
     */
    private $_sName = null;

    /**
     * @var int Margin type of article
     */
    private $_iMarginType = null;

    /**
     * @var array Assign a discount to a margin type
     */
    private $_aDiscounts = array( self::MARGIN_TYPE_A => 5, self::MARGIN_TYPE_B => 10, self::MARGIN_TYPE_C => 20 );

    /**
     * Create a article object and set name, price and margin type
     *
     * @param string $sName
     * @param float  $fPrice
     * @param int    $iMarginType
     *
     * @return article
     */
    public function __construct($sName, $fPrice, $iMarginType)
    {
        $this->_sName = $sName;
        $this->_fPrice = $fPrice;
        $this->_iMarginType = $iMarginType;
    }

    /**
     * Get the articles price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->_fPrice;
    }

    /**
     * Get the margin type of article
     *
     * @return int
     */
    public function getMarginType()
    {
        return $this->_iMarginType;
    }

    /**
     * Get the discount of article in percent
     *
     * @return int
     */
    public function getDiscountInPercent()
    {
        return $this->_aDiscounts[ $this->getMarginType() ];
    }

    /**
     * Get the articles name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_sName;
    }

}
