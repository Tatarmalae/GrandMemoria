<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailedException;
class FileSystemProblemsException extends ConversionFailedException
{
    public $description = 'Filesystem problems';
}
