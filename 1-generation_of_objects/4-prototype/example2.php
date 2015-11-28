<?php

class Sea {
    private $navigability = 0;

    /**
     * Sea constructor.
     * @param int $navigability
     */
    public function __construct($navigability)
    {
        $this->navigability = $navigability;
    }

};
class EarthSea extends Sea {};
class MarsSea extends Sea {};

class Plains {};
class EarthPlains extends Plains {};
class MarsPlains extends Plains {};

class Forest {};
class EarthForest extends Forest {};
class MarsForest extends Forest {};

class TerrainFactory {
    private $sea;
    private $forest;
    private $plains;

    /**
     * TerrainFactory constructor.
     * @param $sea
     * @param $forest
     * @param $plains
     */
    public function __construct(Sea $sea, Plains $plains, Forest $forest)
    {
        $this->sea = $sea;
        $this->forest = $forest;
        $this->plains = $plains;
    }

    /**
     * @return Sea
     */
    public function getSea()
    {
        return clone $this->sea;
    }

    /**
     * @return Forest
     */
    public function getForest()
    {
        return clone $this->forest;
    }

    /**
     * @return Plains
     */
    public function getPlains()
    {
        return clone $this->plains;
    }
}

$factory = new TerrainFactory(new EarthSea( - 1), new EarthPlains(), new EarthForest());

print_r( $factory->getSea() );
print_r( $factory->getPlains() );
print_r( $factory->getForest() );
