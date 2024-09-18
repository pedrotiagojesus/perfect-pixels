<?php

namespace App\Controllers;

use App\System\Image;
use App\System\ImageProcessor;

class Main extends App
{

    public function index()
    {
        $this->setScriptStart();
        $this->logStart();

        // Get images from input folder
        $this->log("Collect images to be processed");
        $imageProcessor = new ImageProcessor();
        $inputFileArr = $imageProcessor->getInputImage();

        if (count($inputFileArr) == 0) {

            $this->log("No images work with!");
            $this->logEnd();
            die();
        }

        $msg = "Found " . count($inputFileArr) . " images!";
        $this->log($msg);

        foreach ($inputFileArr as $inputFile) {

            $this->log();
            $this->log("--------------------------------");
            $this->log();
            $this->log("Loading image data - " . $inputFile);

            // Load image data 
            $imageClass = new Image();
            $imageData = $imageClass->load(PATH_IMAGE_INPUT, $inputFile);

            if (is_null($imageData)) {
                $this->log("Error loading image!");
                continue;
            }

            $this->log("Image data loaded.");
            $this->log();

            // Process image
            $imageProcessor->processImage($imageData);
        }

        $this->log();
        $this->log("--------------------------------");

        $this->logEnd();
    }
}
