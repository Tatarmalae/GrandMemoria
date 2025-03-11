<?php

namespace Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\FileSystemProblems;

use Rarus\Isolated\WebPConvert\Convert\Exceptions\ConversionFailed\FileSystemProblemsException;
class CreateDestinationFolderException extends FileSystemProblemsException
{
    public $description = 'The converter could not create destination folder. Check file permisions!';
}
