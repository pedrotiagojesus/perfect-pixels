<?php

namespace App\System;

class Image
{

    public function load(string $path = "", string $image = "")
    {

        try {

            if (empty($path) && empty($image)) {
                return null;
            }

            $imagePath = realpath($path . $image);

            if (is_null($imagePath)) {
                return null;
            }

            $imagick = new \Imagick($imagePath);

            if (!$imagick) {
                return null;
            }

            $imageStructureArr = explode(".", $image);
            $filename = $imageStructureArr[0];

            return (object) [
                'imagick' => $imagick,
                'name' => $filename,

                'original_path' => $imagePath,
                'original_name' => $image,
                'original_extension' => $imagick->getImageFormat(),

                'tmp_path' => realpath(PATH_IMAGE_TMP) . "\\" .  $filename . ".png",
                'tmp_name' => $filename . ".png",
                'tmp_extension' => "png",

                'output_path' => realpath(PATH_IMAGE_OUTPUT) . "\\" .  $filename . ".png",
                'output_name' => $filename . ".png",
                'output_extension' => "png"
            ];
        } catch (\ImagickException $e) {
            var_dump($e);
            die("BUBU");
        }
    }
}
