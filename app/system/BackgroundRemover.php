<?php

namespace App\System;

class BackgroundRemover
{

    public function removeBackground(string $originalPath = "", string $tmpPath = '')
    {

        $cmd = "backgroundremover -i " . $originalPath . " -o " . $tmpPath;
        shell_exec($cmd);
    }
}
