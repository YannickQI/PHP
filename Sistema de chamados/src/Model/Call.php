<?php

namespace QI\SistemaDeChamados\Model;

use \DateTime;

class Call{
    private $id;
    private $last_modify_date;
    private $user;
    private $equipament;
    private $classification;
    private $description;
    private $notes;

/**
 * @param User $user
 * @param Equipament $equipament
 * @param String $description
 * @param Classification
*/

    public function __consruct($user, $equipament, $description, $classification) {
        $this->user = $user;
        $this->equipament = $equipament;
        $this->description = $description;
        $this->classification = $classification;
    }

    public function __get($attribute) {
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        $this->$attribute = $value;
    }
}
