<?php

namespace Beverages;

class SingleMalt extends Scotch
{
    use Aged;

    public function __construct($id, $name, $age, $region, $type)
    {
        parent::__construct($id, $name, $age, $region, $type);
    }
}

?>