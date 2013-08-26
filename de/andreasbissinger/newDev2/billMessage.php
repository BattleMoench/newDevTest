<?php

namespace de\andreasbissinger\newDev;

/**
 * Add class comment
 */
class billMessage
{

    const TYPE_TEXT = 'text';

    const TYPE_HTML = 'html';

    public static function getBillMessager( $sType )
    {
        switch( $sType ) {
            case self::TYPE_TEXT:
                $oMessenger = new billMessageText();
                break;

            case self::TYPE_HTML:
//                $oMessenger = new billMessageHtml();
//                break;

            default:
                throw new \Exception( 'Invalid message type' );
        }

        return $oMessenger;
    }
}
