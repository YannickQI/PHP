<?php

namespace QI\SistemaDeChamados\Model;

class Equipament{
    private $pc_number;
    private $floor;
    private $room;

    /**
     * @param string $pc_number
     * @param int $floor
     * @param int $room
     */

    public function __consruct($pc_number, $floor, $room){
        $this->pc_number = $pc_number;
        $this->floor = $floor;
        $this->room = $room;
    }

    public function __get($attribute) {
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        $this->$attribute = $value;
    }
}
