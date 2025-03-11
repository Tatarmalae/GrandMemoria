<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailedException;
class ConversionSkippedException extends ConversionFailedException
{
    public $description = 'The converter declined converting';
}
