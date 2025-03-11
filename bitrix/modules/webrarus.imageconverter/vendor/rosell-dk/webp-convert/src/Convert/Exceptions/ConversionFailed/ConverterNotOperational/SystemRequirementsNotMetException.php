<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\ConverterNotOperational;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\ConverterNotOperationalException;
class SystemRequirementsNotMetException extends ConverterNotOperationalException
{
    public $description = 'The converter is not operational (system requirements not met)';
}
