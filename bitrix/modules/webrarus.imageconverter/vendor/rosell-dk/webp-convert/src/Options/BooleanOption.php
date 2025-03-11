<?php

namespace Rarus\Isolated\WebPConvert\Options;

use Rarus\Isolated\WebPConvert\Options\Option;
use Rarus\Isolated\WebPConvert\Options\Exceptions\InvalidOptionValueException;
/**
 * Boolean option
 *
 * @package    WebPConvert
 * @author     Bjørn Rosell <it@rosell.dk>
 * @since      Class available since Release 2.0.0
 */
class BooleanOption extends Option
{
    protected $typeId = 'boolean';
    protected $schemaType = ['boolean'];
    public function check()
    {
        $this->checkType('boolean');
    }
    public function getValueForPrint()
    {
        return $this->getValue() === \true ? 'true' : 'false';
    }
}
