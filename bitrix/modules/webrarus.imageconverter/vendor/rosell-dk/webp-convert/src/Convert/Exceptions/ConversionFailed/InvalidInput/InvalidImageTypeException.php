<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\InvalidInput;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\InvalidInputException;
class InvalidImageTypeException extends InvalidInputException
{
    public $description = 'The converter does not handle the supplied image type';
}
