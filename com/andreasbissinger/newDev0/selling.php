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

}
