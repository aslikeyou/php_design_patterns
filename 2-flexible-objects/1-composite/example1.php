<?php

abstract class Unit {
    abstract function bombardStrength();
}

class Archer extends Unit {

    function bombardStrength()
    {
        return 4;
    }
}

class LaserCannonUnit extends Unit {

    function bombardStrength()
    {
        return 44;
    }
}
//*************************************************************************************

class Army {
    /** @var Unit[] */
    private $units = array();

    function addUnit(Unit $unit) {
        $this->units[] = $unit;
    }

    function bombardStrength() {
        $ret = 0;
        foreach($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }
        return $ret;
        // or
        return array_reduce($this->units, function($sum,Unit $item) {
            return $item->bombardStrength() + $sum;
        }, 0);
    }
}