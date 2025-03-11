<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\FileSystemProblems;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\FileSystemProblemsException;
class CreateDestinationFileException extends FileSystemProblemsException
{
    public $description = 'The converter could not create destination file. Check file permisions!';
}
