<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailedException;
class ConverterNotOperationalException extends ConversionFailedException
{
    public $description = 'The converter is not operational';
}
