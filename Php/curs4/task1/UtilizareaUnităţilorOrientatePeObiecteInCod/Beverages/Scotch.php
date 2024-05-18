<?php

namespace Beverages;

class Scotch extends Whisky
{
    public function __construct($id, $name, $age, $region, $type)
    {
        parent::__construct($id, $name, $age, $region, $type);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return "Scotch Whisky";
    }
}

?>