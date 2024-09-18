<?php

namespace App\System;

class ImageProcessor
{

    const DPI = 300;
    const IMAGE_WIDTH = 4267;
    const IMAGE_HEIGHT = 4267;

    /**
     * Get images from input folder
     */
    public function getInputImage()
    {

        return getFilesFromFolder(realpath(PATH_IMAGE_INPUT));
    }

    public function processImage(object $imageData = null)
    {

        /**
         * DPI
         */
        echo "Change DPI...";
        echo PHP_EOL;

        $resolution = new Resolution();
        $imageData->imagick = $resolution->changeDpi($imageData->imagick, self::DPI);

        echo "DPI changed!";
        echo PHP_EOL;

        $this->saveTmp($imageData);
        $imageData = $this->loadTmp($imageData);

        /**
         * Remove background
         */
        echo "Remove background...";
        echo PHP_EOL;

        $backgroundRemover = new BackgroundRemover();
        $backgroundRemover->removeBackground($imageData->original_path, $imageData->tmp_path);

        echo "Background removed!";
        echo PHP_EOL;

        $imageData = $this->loadTmp($imageData);

        /**
         * Dimension
         */
        echo "Change dimension...";
        echo PHP_EOL;

        $resolution = new Resolution();
        $imageData->imagick = $resolution->changeDimension($imageData->imagick, self::IMAGE_WIDTH, self::IMAGE_HEIGHT);

        echo "Dimension changed!";
        echo PHP_EOL;

        $this->saveTmp($imageData);
        $imageData = $this->loadTmp($imageData);

        /**
         * DPI
         */
        echo "Change DPI...";
        echo PHP_EOL;

        $resolution = new Resolution();
        $imageData->imagick = $resolution->changeDpi($imageData->imagick, self::DPI);

        echo "DPI changed!";
        echo PHP_EOL;

        $this->saveTmp($imageData);
        $imageData = $this->loadTmp($imageData);

        $this->saveOutput($imageData);
    }

    private function loadTmp(object $imageData = null)
    {

        // Load config
        $config = Config::getInstance();

        $imageClass = new Image();
        return $imageClass->load($config->get("path_image_tmp"), $imageData->tmp_name);
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
