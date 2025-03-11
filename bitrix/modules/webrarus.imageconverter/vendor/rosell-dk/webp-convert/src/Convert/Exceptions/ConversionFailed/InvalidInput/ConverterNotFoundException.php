<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\InvalidInput;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\InvalidInputException;
class ConverterNotFoundException extends InvalidInputException
{
    public $description = 'The converter does not exist.';
}
