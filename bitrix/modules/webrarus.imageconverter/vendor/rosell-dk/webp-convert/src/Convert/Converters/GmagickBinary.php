<?php

namespace Rarus\Isolated\WebPConvert\Convert\Converters;

use Rarus\Isolated\WebPConvert\Convert\Converters\AbstractConverter;
use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailedException;
/**
 * Non-functional converter, just here to tell you that it has been renamed.
 *
 * @package    WebPConvert
 * @author     Bjørn Rosell <it@rosell.dk>
 * @since      Class available since Release 2.0.0
 */
class GmagickBinary extends AbstractConverter
{
    public function checkOperationality()
    {
        throw new ConversionFailedException('This converter has changed ID from "gmagickbinary" to "graphicsmagick". You need to change!');
    }
    protected function doActualConvert()
    {
        $this->checkOperationality();
    }
}
