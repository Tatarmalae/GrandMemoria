<?php

namespace Rarus\Isolated\WebPConvert\Exceptions\InvalidInput;

use Rarus\Isolated\WebPConvert\Exceptions\InvalidInputException;
class InvalidImageTypeException extends InvalidInputException
{
    public $description = 'The converter does not handle the supplied image type';
}
