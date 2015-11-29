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

    /** @var Army[]  */
    private $armies = array();

    function addUnit(Unit $unit) {
        $this->units[] = $unit;
    }

    function addArmy(Army $army) {
        $this->armies[] = $army;
    }

    function bombardStrength() {
        $ret = 0;
        foreach($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }

        foreach($this->armies as $army) {
            $ret += $army->bombardStrength();
        }

        return $ret;
    }
}