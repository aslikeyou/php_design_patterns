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

class CommsManager {
    const BLOGGS = 1;
    const MEGA = 2;
    private $mode = 1;

    function __construct( $mode )
    {
        $this->mode = $mode;
    }

    // diff here !!!!
    // проблема заключаеться в том, что мы дублируем код: switch( $this->mode ). Решение можно найти в Абстрактной фаблрике
    function getHeaderText() {
        switch( $this->mode ) {
            case (self::MEGA):
                return "MegaCal верхний колонтитул\n";
            default:
                return "BloggsCall верхний колонтитул\n";
        }
    }
    // diff here !!!!

    function getApptEncoder() {
        switch( $this->mode ) {
            case (self::MEGA):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }
}

$comms = new CommsManager(CommsManager::MEGA);
$apptEncoder = $comms->getApptEncoder();
print $apptEncoder->encode();


