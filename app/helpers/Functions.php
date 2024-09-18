<?php

function scriptInit()
{

    return microtime(true);
}

function scriptEnd()
{

    return microtime(true);
}

function scriptTime(float $scriptStart = 0, float $scriptEnd = 0)
{

    return number_format(($scriptEnd - $scriptStart), 2);
}

function getFilesFromFolder(string $path = "")
{

    $fileArr = scandir($path);

    if (!is_array($fileArr)) {
        return [];
    }

    $fileArr = array_filter($fileArr, function ($k) {
        $exclude = [".", ".."];
        return !in_array($k, $exclude);
    });

    return $fileArr;
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
    echo PHP_EOL;
    echo PHP_EOL;
    echo "<======================================>";
    echo PHP_EOL;
}
