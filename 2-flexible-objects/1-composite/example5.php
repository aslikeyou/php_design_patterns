<?php

abstract class Unit {
    function getComposite() {
        return null;
    }
    abstract function bombardStrength();
}

class Archer extends Unit {

    function bombardStrength()
    {
        return 4;
    }

}

class Cavalry extends Unit {

    function bombardStrength()
    {
        return 6;
    }
}

class LaserCannonUnit extends Unit {

    function bombardStrength()
    {
        return 44;
    }
}
//*************************************************************************************
abstract class CompositeUnit extends Unit {
    /** @var Unit[] */
    private $units = array();

    function getComposite() {
        return $this;
    }

    protected function units() {
        return $this->units;
    }

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
}
class Army extends CompositeUnit {
    function bombardStrength() {
        $ret = 0;
        foreach($this->units() as $unit) {
            $ret += $unit->bombardStrength();
        }

        return $ret;
    }
}

class TroopCarrier extends CompositeUnit {
    function addUnit(Unit $unit)
    {
        if($unit instanceof Cavalry) {
            throw new UnitException("Нельзя помещать лошадь на бронетранспортер");
        }

        parent::addUnit($unit);
    }

    function bombardStrength()
    {
        return 0;
    }
}

class UnitScript {
    static function joinExisting(Unit $newUnit, Unit $occupyingUnit) {
        $comp = null;
        if(!is_null($comp = $occupyingUnit->getComposite())) {
            $comp->addUnit($newUnit);
        } else {
            $comp = new Army();
            $comp->addUnit($occupyingUnit);
            $comp->addUnit($newUnit);
        }
        return $comp;

    }
}

// создадим армию
$main_army = new Army();

$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());

$sub_army = new Army();
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());

$main_army->addUnit($sub_army);

print "Атакующая сила: {$main_army->bombardStrength()}\n";