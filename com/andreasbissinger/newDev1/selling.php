<?php

namespace com\andreasbissinger\newDev;

use com\andreasbissinger\newDev\article;

/**
 * Add class comment
 */
class selling
{
    const DISCOUNT_COUNT = 20;
    /**
     * @var article
     */
    private $_oArticle = null;

    /**
     * @var int
     */
    private $_iAmount = 0;

    /**
     * @var string
     */
    private $_sDiscountString = '';

    /**
     * @var string
     */
    private $_sSellingsMessage = '';

    /**
     * @param article $oArticle
     * @param int     $iAmount
     */
    public function __construct( article $oArticle, $iAmount )
    {
        $this->_oArticle = $oArticle;
        $this->_iAmount = $iAmount;

        $this->_getDiscountString();
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

    public function getArticleMessage()
    {
        $sMessage = $this->getAmount() . ' x ' . $this->getArticle()->getName() .
                    ' a ' . $this->getArticle()->getPrice() .
                    ' = ' . $this->getAmount() * $this->getArticle()->getPrice() . "\n";

        if ( $this->_hasDiscount() ) {
            $sMessage .= $this->_getDiscountString() . ( $this->getAmount() * $this->getArticle()->getPrice() * $this->_getArticleDiscount() ) / 100 . "\n";
        }
        return $sMessage;
    }

    /**
     */
    public function getArticleTotal()
    {
        $fSubTotal = $this->getAmount() * $this->getArticle()->getPrice();

        if ( $this->_hasDiscount() ) {
            $fSubTotal -= ( $this->getAmount() * $this->getArticle()->getPrice() * $this->_getArticleDiscount() ) / 100;
        }

        return $fSubTotal;
    }

    /**
     * @return string
     */
    private function _getDiscountString()
    {
        $sDiscount = (string) $this->_getArticleDiscount();

        return 'Rabatt ( ' . $sDiscount . '% ): -';
    }

    /**
     * @return mixed
     */
    private function _getArticleDiscount()
    {
        return $this->getArticle()->getDiscountInPercent();
    }

    /**
     * @return bool
     */
    private function _hasDiscount()
    {
        return self::DISCOUNT_COUNT <= $this->getAmount();
    }
}
