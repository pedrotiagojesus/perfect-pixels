<?php

class Convert
{

    public function svg(object $image = null)
    {

        $command = escapeshellcmd('php lib/PNG2SGV/png2svg.php ' . escapeshellarg($image->original_path) . " " . escapeshellarg($image->svg_path));
        $output = shell_exec($command);
        echo $output;
    }
}
