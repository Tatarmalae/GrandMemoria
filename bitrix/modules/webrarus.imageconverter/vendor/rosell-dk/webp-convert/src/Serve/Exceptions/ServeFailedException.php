<?php

namespace Rarus\Isolated\WebPConvert\Serve\Exceptions;

use Rarus\Isolated\WebPConvert\Exceptions\WebPConvertException;
class ServeFailedException extends WebPConvertException
{
    public $description = 'Failed serving';
}
