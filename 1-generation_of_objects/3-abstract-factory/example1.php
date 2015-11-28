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
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getTddEncoder();
    abstract function getContactEncoder();
    abstract function getFooterText();
}

class BloggsCommsManager extends CommsManager {

    function getHeaderText()
    {
        return "BloggsCall верхний колонтитул\n";
    }

    function getApptEncoder()
    {
        return new BloggsApptEncoder();
    }

    function getTddEncoder()
    {
        return new BloggsTtdEncoder();
    }

    function getContactEncoder()
    {
        return new BloggsContactEncoder();
    }

    function getFooterText()
    {
        return "BloggsCall нижний колонтитул\n";
    }
}