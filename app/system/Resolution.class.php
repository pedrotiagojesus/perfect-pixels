<?php

final class Resolution
{

    public function changeDpi(object $imagick = null, int $dpiValue = 300)
    {

        try {

            $imagick->setImageResolution($dpiValue, $dpiValue);
            $imagick->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);

            return $imagick;
        } catch (\Exception $e) {

            die($e->getMessage());
        }
    }

    public function changeDimension(object $imagick = null, int $width = 4267, int $height = 4267)
    {

        try {
            $imagick->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1);

            return $imagick;
        } catch (\Exception $e) {

            die($e->getMessage());
        }
    }
}
