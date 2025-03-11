<?php

namespace Rarus\Isolated\WebPConvert\Exceptions\InvalidInput;

use Rarus\Isolated\WebPConvert\Exceptions\InvalidInputException;
class TargetNotFoundException extends InvalidInputException
{
    public $description = 'The converter could not locate source file';
}
