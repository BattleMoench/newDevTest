<?php

namespace de\andreasbissinger\newDev;

/**
 * Class represents bought article. It hold cont and type of article and can calculate the total for this selling
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

    /**
     * @return float
     */
    public function getArticleTotal()
    {
        $fSubTotal = $this->getAmount() * $this->getArticle()->getPrice();

        if ( $this->hasDiscount() ) {
            $fSubTotal -= ( $this->getAmount() * $this->getArticle()->getPrice() * $this->getSellingDiscount() ) / 100;
        }

        return $fSubTotal;
    }

    /**
     * @return mixed
     */
    public function getSellingDiscount()
    {
        return $this->getArticle()->getDiscountInPercent();
    }

    /**
     * @return bool
     */
    public function hasDiscount()
    {
        return self::DISCOUNT_COUNT <= $this->getAmount();
    }
}
