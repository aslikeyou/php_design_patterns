<?php

abstract class Unit {
    abstract function addUnit(Unit $unit);
    abstract function removeUnit(Unit $unit);
    abstract function bombardStrength();
}

class UnitException extends Exception {};

class Archer extends Unit {

    function bombardStrength()
    {
        return 4;
    }

    function addUnit(Unit $unit)
    {
        throw new UnitException(get_class($this). " относиться к 'листьям'");
    }

    function removeUnit(Unit $unit)
    {
        throw new UnitException(get_class($this). " относиться к 'листьям'");
    }
}

class LaserCannonUnit extends Unit {

    function bombardStrength()
    {
        return 44;
    }

    function addUnit(Unit $unit)
    {
        throw new UnitException(get_class($this). " относиться к 'листьям'");
    }

    function removeUnit(Unit $unit)
    {
        throw new UnitException(get_class($this). " относиться к 'листьям'");
    }
}
//*************************************************************************************

class Army extends Unit {
    /** @var Unit[] */
    private $units = array();

    function addUnit(Unit $unit) {
        if(in_array($unit, $this->units, true)) {
            return ;
        }
        $this->units[] = $unit;
    }

    function removeUnit(Unit $unit) {
        $this->units = array_udiff($this->units, [$unit], function($a, $b) {
            return ($a === $b) ? 0:1;
        });
    }

    function bombardStrength() {
        $ret = 0;
        foreach($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }

        return $ret;
    }
}