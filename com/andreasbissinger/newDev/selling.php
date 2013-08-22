<?php

namespace com\andreasbissinger\newDev;

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

    /**
     * @param string  $sMessage
     * @param string  $fSubTotal
     */
    public function handleDiscount( &$sMessage, &$fSubTotal )
    {
        if ( 20 <= $this->getAmount() ) {
            switch ( $this->getArticle()->getMarginType() ) {
                case article::MARGIN_TYPE_A:
                    $sMessage .= 'Rabatt ( 5% ): -' .
                                 ( $this->getAmount() * $this->getArticle()->getPrice() * 5 ) / 100 . "\n";
                    $fSubTotal -= ( $this->getAmount() * $this->getArticle()->getPrice() * 5 ) / 100;
                    break;
                case article::MARGIN_TYPE_B:
                    $sMessage .= 'Rabatt ( 10% ): -' .
                                 ( $this->getAmount() * $this->getArticle()->getPrice() * 10 ) / 100 . "\n";
                    $fSubTotal -= ( $this->getAmount() * $this->getArticle()->getPrice() * 10 ) / 100;
                    break;
                case article::MARGIN_TYPE_C:
                    $sMessage .= 'Rabatt ( 20% ): -' .
                                 ( $this->getAmount() * $this->getArticle()->getPrice() * 20 ) / 100 . "\n";
                    $fSubTotal -= ( $this->getAmount() * $this->getArticle()->getPrice() * 20 ) / 100;
                    break;
            }
        }
    }
}
