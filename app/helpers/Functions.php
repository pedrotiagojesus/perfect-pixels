<?php

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
