<?php

namespace App\Controllers;

abstract class App
{

    private float $scriptStart = 0;
    private float $scriptEnd = 0;

    public function setScriptStart()
    {

        $this->scriptStart = microtime(true);
    }

    public function setScriptEnd()
    {

        $this->scriptEnd = microtime(true);
    }

    function getScriptTime()
    {

        return number_format(($this->scriptEnd - $this->scriptStart), 2);
    }

    function logStart()
    {
        echo PHP_EOL;
        echo "<===========Perfect Fixels=============>";
        echo PHP_EOL;
        echo PHP_EOL;
    }

    function logEnd()
    {

        $this->setScriptEnd();
        $scriptTime = $this->getScriptTime();

        echo PHP_EOL;
        echo 'Script in took ' .  $scriptTime . ' seconds';

        echo PHP_EOL;
        echo PHP_EOL;
        echo "<======================================>";
        echo PHP_EOL;
    }

    function log(string $msg = "", bool $breakLine = true)
    {
        echo $msg;

        if ($breakLine) {
            echo PHP_EOL;
        }
    }
}
