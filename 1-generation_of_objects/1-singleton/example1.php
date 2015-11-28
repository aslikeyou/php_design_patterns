<?php

/**
 * Class Preference
 *
 * Данный класс совершенно бесполезен
 * Конструктор private, поетому никто не сможет создать обьект
 * Методы get и set бесполезны
 *
 */
class Preference {
    private $props = array();

    private function __construct() {}

    public function setProperty( $key, $val ) {
        $this->props[$key] = $val;
    }

    public function getProperty( $key ) {
        return $this->props[$key];
    }
}