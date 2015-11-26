<?php

abstract class ApptEncoder {
    abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder {
    function encode()
    {
        return "Данные о встрече закодированы в формате BloggsCal \n";
    }
}

class MegaApptEncoder extends ApptEncoder {
    function encode()
    {
        return "Данные о встрече закодированы в формате MegaCal \n";
    }
}
// diff here !!!!
class CommsManager {
    const BLOGGS = 1;
    const MEGA = 2;
    private $mode = 1;

    function __construct( $mode )
    {
        $this->mode = $mode;
    }

    function getApptEncoder() {
        switch( $this->mode ) {
            case (self::MEGA):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }
}

// Вам нужно изменить только параметр конструктора, что бы полностью переключиться на новую логику
$comms = new CommsManager(CommsManager::MEGA);
$apptEncoder = $comms->getApptEncoder();
print $apptEncoder->encode();
// diff here !!!!

