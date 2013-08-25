<?php

namespace com\andreasbissinger\newDev;

/**
 * Class represents bought article. It hold count and type of article and can calculate the total for this selling
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
     * Creates a selling object and set article and it's count.
     *
     * @param article $oArticle
     * @param int     $iAmount
     *
     * @return selling
     */
    public function __construct( article $oArticle, $iAmount )
    {
        $this->_oArticle = $oArticle;
        $this->_iAmount = $iAmount;
    }

    /**
     * Get the bought amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->_iAmount;
    }

    /**
     * Get the bought article
     *
     * @return article
     */
    public function getArticle()
    {
        return $this->_oArticle;
    }

    /**
     * Calculates the total of this selling by using articles price and amount
     *
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
     * Get the discount in percent
     *
     * @return int
     */
    public function getSellingDiscount()
    {
        return $this->getArticle()->getDiscountInPercent();
    }

    /**
     * Checks whether a discount is available
     *
     * @return bool Tru in case there is a discount, false otherwise
     */
    public function hasDiscount()
    {
        return self::DISCOUNT_COUNT <= $this->getAmount();
    }
}
