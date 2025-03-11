<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailedException;
class InvalidInputException extends ConversionFailedException
{
    public $description = 'Invalid input';
}
