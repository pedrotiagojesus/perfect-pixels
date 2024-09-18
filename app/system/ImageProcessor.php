<?php

namespace App\System;

use App\Controllers\App;

class ImageProcessor extends App
{

    /**
     * Get images from input folder
     */
    public function getInputImage()
    {

        return getFilesFromFolder(realpath(PATH_IMAGE_INPUT));
    }

    public function processImage(object $imageData = null)
    {
        $resolution = new Resolution();
        $backgroundRemover = new BackgroundRemover();

        /**
         * Remove background
         */
        $this->log("Remove background... ", false);

        $backgroundRemover->removeBackground($imageData->original_path, $imageData->tmp_path);

        $this->log("Done!");

        $imageData = $this->loadTmp($imageData);

        /**
         * DPI
         */
        $this->log("Change DPI... ", false);

        $imageData->imagick = $resolution->changeDpi($imageData->imagick);

        $this->log("Done!");

        $this->saveTmp($imageData);
        $imageData = $this->loadTmp($imageData);

        /**
         * Dimension
         */
        $this->log("Change dimension... ", false);

        $imageData->imagick = $resolution->changeDimension($imageData->imagick);

        $this->log("Done!");

        $this->saveTmp($imageData);
        $imageData = $this->loadTmp($imageData);

        /**
         * DPI
         */
        $this->log("Change DPI... ", false);

        $imageData->imagick = $resolution->changeDpi($imageData->imagick);

        $this->log("Done!");

        $this->saveTmp($imageData);
        $imageData = $this->loadTmp($imageData);

        $this->saveOutput($imageData);
    }

    private function loadTmp(object $imageData = null)
    {

        $imageClass = new Image();
        return $imageClass->load(PATH_IMAGE_TMP, $imageData->tmp_name);
    }

    private function saveOutput(object $imageData = null)
    {

        $imageData->imagick->setImageFormat($imageData->output_extension);
        $to = $imageData->output_path;

        file_put_contents($to, $imageData->imagick->getImageBlob());
        unlink($imageData->tmp_path);
    }

    private function saveTmp(object $imageData = null)
    {

        $imageData->imagick->setImageFormat($imageData->tmp_extension);
        $to = $imageData->tmp_path;

        file_put_contents($to, $imageData->imagick->getImageBlob());
    }
}
