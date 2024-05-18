<?php

namespace Beverages;

trait Aged
{
    public function agingProcess()
    {
        return "This whisky has been aged for {$this->age} years.";
    }
}

?>