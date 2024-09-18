<?php

namespace App\System;

class Resolution
{

    public function changeDpi(object $imagick = null)
    {

        $imagick->setImageResolution(IMAGE_DPI, IMAGE_DPI);
        $imagick->setImageUnits(\imagick::RESOLUTION_PIXELSPERINCH);
        return $imagick;
    }

    public function changeDimension(object $imagick = null)
    {

        $imagick->resizeImage(IMAGE_WIDTH, IMAGE_HEIGHT, \Imagick::FILTER_LANCZOS, 1);
        return $imagick;
    }
}
