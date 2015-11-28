<?php
//*********************************************************************
abstract class ApptEncoder {
    abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder {
    function encode()
    {
        return "Данные о встрече закодированы в формате BloggsCal \n";
    }
}
//************************
abstract class TtdEncoder {
    abstract function encode();
}

class BloggsTtdEncoder extends TtdEncoder {
    function encode()
    {
        return "Данные о встрече закодированы в формате BloggsTtdEncoder \n";
    }
}
//************************
abstract class ContactEncoder {
    abstract function encode();
}

class BloggsContactEncoder extends ContactEncoder {
    function encode()
    {
        return "Данные о встрече закодированы в формате BloggsContactEncoder \n";
    }
}
//*********************************************************************


abstract class CommsManager {
    const    APPT = 1;
    const     TTD = 2;
    const CONTACT = 3;
    // diff here
    abstract function getHeaderText();
    abstract function make( $flag_int );
    abstract function getFooterText();
    // diff here
}

class BloggsCommsManager extends CommsManager {

    function getHeaderText()
    {
        return "BloggsCall верхний колонтитул\n";
    }

    // diff here
    function make( $flag_int ) {
        switch ($flag_int) {
            case self::APPT:
                return new BloggsApptEncoder();
            case self::CONTACT:
                return new BloggsContactEncoder();
            case self::TTD:
                return new BloggsTtdEncoder();
        }
    }
    // diff here

    function getFooterText()
    {
        return "BloggsCall нижний колонтитул\n";
    }
}