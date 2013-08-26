<?php

namespace de\andreasbissinger\newDev;

/**
 * Class represents bought article. It hold count and type of article and can calculate the total for this selling
 */
class selling
{
    /**
     * Count of articles to buy, to get a discount
     */
    const DISCOUNT_COUNT = 20;

    /**
     * @var article Bought article
     */
    private $_oArticle = null;

    /**
     * @var int Bought count of this article
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

        $this->_getDiscountString();
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
     * Get the bougnt article
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

        if ( $this->_hasDiscount() ) {
            $fSubTotal -= ( $this->getAmount() * $this->getArticle()->getPrice() * $this->_getArticleDiscount() ) / 100;
        }

        return $fSubTotal;
    }

    /**
     * @return string
     */
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
     * Get the string with discount in percent to display
     *
     * @return string
     */
    private function _getDiscountString()
    {
        $sDiscount = (string) $this->_getArticleDiscount();

        return 'Rabatt ( ' . $sDiscount . '% ): -';
    }

    /**
     * Get the articles discount in ppercent
     *
     * @return int
     */
    private function _getArticleDiscount()
    {
        return $this->getArticle()->getDiscountInPercent();
    }

    /**
     * Checks whether a discount is available
     *
     * @return bool Tru in case there is a discount, false otherwise
     */
    private function _hasDiscount()
    {
        return self::DISCOUNT_COUNT <= $this->getAmount();
    }
}
