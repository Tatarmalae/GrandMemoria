<?php

namespace Rarus\Isolated\WebPConvert\Options;

use Rarus\Isolated\WebPConvert\Options\Option;
use Rarus\Isolated\WebPConvert\Options\Exceptions\InvalidOptionValueException;
/**
 * Abstract option class
 *
 * @package    WebPConvert
 * @author     Bjørn Rosell <it@rosell.dk>
 * @since      Class available since Release 2.0.0
 */
class ArrayOption extends Option
{
    protected $typeId = 'array';
    protected $schemaType = ['array'];
    public function check()
    {
        $this->checkType('array');
    }
    public function getValueForPrint()
    {
        if (\count($this->getValue()) == 0) {
            return '(empty array)';
        } else {
            return parent::getValueForPrint();
        }
    }
    public function getDefinition()
    {
        $obj = parent::getDefinition();
        $obj['sensitive'] = \false;
        return $obj;
    }
}
