<?php

namespace App\Controllers;

use App\System\Image;
use App\System\ImageProcessor;

final class Main
{

    public function index()
    {

        $scriptStart = scriptInit();

        logStart();

        // Get images from input folder
        $imageProcessor = new ImageProcessor();
        $inputFileArr = $imageProcessor->getInputImage();

        if (count($inputFileArr) == 0) {
            echo "No images work with!";
            echo PHP_EOL;
            die();
        }

        echo "Found " . count($inputFileArr) . " images!";
        echo PHP_EOL;
        foreach ($inputFileArr as $inputFile) {

            echo PHP_EOL;
            echo "--------------------------------" . PHP_EOL;
            echo "Loading image data - " . $inputFile;
            echo PHP_EOL;

            var_dump(PATH_IMAGE_INPUT);
            var_dump(realpath(PATH_IMAGE_INPUT));
            die();

            // Load image data 
            $imageClass = new Image();
            $imageData = $imageClass->load(PATH_IMAGE_INPUT, $inputFile);

            if (is_null($imageData)) {
                echo 'Error loading image!';
                echo PHP_EOL;
                continue;
            }

            var_dump($imageData);
            die();

            /*
    
    
            $imageProcessor->processImage($imageData);
            echo PHP_EOL;
            */
        }

        $scriptEnd = scriptEnd();
        $scriptTime = scriptTime($scriptStart, $scriptEnd);

        echo PHP_EOL;
        echo PHP_EOL;
        echo 'Script in took ' .  $scriptTime . ' seconds';
        echo PHP_EOL;
        logEnd();
    }
}
