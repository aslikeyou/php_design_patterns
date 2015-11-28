<?php

/**
 * Class Preference
 *
 */
class Preference {
    private $props = array();
    private static $instance;

    private function __construct() {}

    public function setProperty( $key, $val ) {
        $this->props[$key] = $val;
    }

    public static function getInstance() {
        if( empty( self::$instance ) ) {
            self::$instance = new Preference();
        }

        return self::$instance;
    }

    public function getProperty( $key ) {
        return $this->props[$key];
    }
}

$pref = Preference::getInstance();
$pref->setProperty("name", "Иван");

unset( $pref );

$pref2 = Preference::getInstance();
print $pref2->getProperty("name") . "\n"; // Иван
