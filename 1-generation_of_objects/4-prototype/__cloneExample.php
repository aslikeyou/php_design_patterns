<?php
// __clone Helper:
class Contained {};

class Container {
    public $contained;

    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->contained = new Contained();
    }

    function __clone()
    {
        //!!!!!
        $this->contained = clone $this->contained;
    }
}