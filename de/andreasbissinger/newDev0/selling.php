<?php

namespace de\andreasbissinger\newDev0;

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
    public $amount = null;

    /**
     * @param article $oArticle
     * @param int     $iAmount
     */
    public function __construct( $oArticle, $iAmount )
    {
        $this->_oArticle = $oArticle;
        $this->amount = $iAmount;
    }

    /**
     * Get the
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
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
