<?php

namespace Rarus\Isolated\WebPConvert\Options\Exceptions;

use Rarus\Isolated\WebPConvert\Exceptions\WebPConvertException;
class InvalidOptionValueException extends WebPConvertException
{
    public $description = 'Invalid option value';
}
