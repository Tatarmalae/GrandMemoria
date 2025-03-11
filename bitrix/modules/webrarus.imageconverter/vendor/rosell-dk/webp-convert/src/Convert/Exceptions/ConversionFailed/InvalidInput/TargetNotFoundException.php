<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\InvalidInput;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\InvalidInputException;
class TargetNotFoundException extends InvalidInputException
{
    public $description = 'The converter could not locate source file';
}
