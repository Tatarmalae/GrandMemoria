<?php

namespace Rarus\Isolated\WebPConvert\Options\Exceptions;

use Rarus\Isolated\WebPConvert\Exceptions\WebPConvertException;
class InvalidOptionTypeException extends WebPConvertException
{
    public $description = 'Invalid option type';
}
