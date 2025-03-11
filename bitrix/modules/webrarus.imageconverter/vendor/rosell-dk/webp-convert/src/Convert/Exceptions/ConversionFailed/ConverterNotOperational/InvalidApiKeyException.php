<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\ConverterNotOperational;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\ConverterNotOperationalException;
class InvalidApiKeyException extends ConverterNotOperationalException
{
    public $description = 'The converter is not operational (access denied)';
}
