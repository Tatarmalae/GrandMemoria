<?php

namespace Rarus\Isolated\WebPConvert\Options;

use Rarus\Isolated\WebPConvert\Options\Option;
use Rarus\Isolated\WebPConvert\Options\Exceptions\InvalidOptionValueException;
/**
 * Ghost option
 *
 * @package    WebPConvert
 * @author     Bjørn Rosell <it@rosell.dk>
 * @since      Class available since Release 2.0.0
 */
class GhostOption extends Option
{
    protected $typeId = 'ghost';
    public function getValueForPrint()
    {
        return '(not defined for this converter)';
    }
}
