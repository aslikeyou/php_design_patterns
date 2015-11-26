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
    function getApptEncoder() {
        return new BloggsApptEncoder();
    }
}

