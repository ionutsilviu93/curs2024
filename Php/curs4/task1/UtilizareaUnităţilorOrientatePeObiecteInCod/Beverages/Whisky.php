<?php

namespace Beverages;

abstract class Whisky implements Beverage
{
    protected $id;
    protected $name;
    protected $age;
    protected $region;
    protected $type;

    public function __construct($id, $name, $age, $region, $type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->region = $region;
        $this->type = $type;
    }

    abstract public function getName();
    abstract public function getType();

    public function getDetails()
    {
        return "{$this->name}, aged {$this->age} years, from {$this->region}";
    }

    public static function fetchAllWhiskies($link)
    {
        $sql = "SELECT * FROM whiskies";
        $result = mysqli_query($link, $sql);

        $whiskies = [];
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['type'] == 'Scotch') {
                $whiskies[] = new Scotch($row['id'], $row['name'], $row['age'], $row['region'], $row['type']);
            } elseif ($row['type'] == 'Bourbon') {
                $whiskies[] = new Bourbon($row['id'], $row['name'], $row['age'], $row['region'], $row['type']);
            } elseif ($row['type'] == 'Single Malt') {
                $whiskies[] = new SingleMalt($row['id'], $row['name'], $row['age'], $row['region'], $row['type']);
            }
        }

        return $whiskies;
    }
}

?>