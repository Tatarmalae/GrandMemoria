<?php

namespace Rarus\Isolated\ImageMimeTypeGuesser\Detectors;

use Rarus\Isolated\ImageMimeTypeGuesser\Detectors\AbstractDetector;
use Rarus\Isolated\ImageMimeTypeSniffer\ImageMimeTypeSniffer;
class SignatureSniffer extends AbstractDetector
{
    /**
     * Try to detect mime type by sniffing the first four bytes.
     *
     * Returns:
     * - mime type (string) (if it is in fact an image, and type could be determined)
     * - false (if it is not an image type that the server knowns about)
     * - null  (if nothing can be determined)
     *
     * @param  string  $filePath  The path to the file
     * @return string|false|null  mimetype (if it is an image, and type could be determined),
     *    false (if it is not an image type that the server knowns about)
     *    or null (if nothing can be determined)
     */
    protected function doDetect($filePath)
    {
        return ImageMimeTypeSniffer::detect($filePath);
    }
}
