<?php

use App\Controllers\Main;

$autoload = __DIR__ . "\\..\\vendor\autoload.php";
$autoload = realpath($autoload);

if (!is_file($autoload)) {
    die("Autoload file not found!");
}

require_once($autoload);

$main = new Main();
echo $main->index();
