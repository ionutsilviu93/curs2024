<?php

require_once 'config.php';
require_once 'Beverages/Beverage.php';
require_once 'Beverages/Whisky.php';
require_once 'Beverages/Scotch.php';
require_once 'Beverages/Bourbon.php';
require_once 'Beverages/Aged.php';
require_once 'Beverages/SingleMalt.php';

use Beverages\Whisky;

$whiskies = Whisky::fetchAllWhiskies($link);

foreach ($whiskies as $whisky) {
    echo $whisky->getDetails() . PHP_EOL;
    echo $whisky->getType() . PHP_EOL;
    if (method_exists($whisky, 'agingProcess')) {
        echo $whisky->agingProcess() . PHP_EOL;
    }
}

?>