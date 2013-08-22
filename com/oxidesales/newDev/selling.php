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
class selling
{
    /**
     * @var article
     */
    private $_oArticle = null;

    /**
     * @var int
     */
    private $_iAmount = 0;

    /**
     * @param article $oArticle
     * @param int     $iAmount
     */
    public function __construct( article $oArticle, $iAmount )
    {
        $this->_oArticle = $oArticle;
        $this->_iAmount = $iAmount;
    }

    /**
     * Get the
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->_iAmount;
    }

    /**
     * Get the
     *
     * @return article
     */
    public function getArticle()
    {
        return $this->_oArticle;
    }

}
