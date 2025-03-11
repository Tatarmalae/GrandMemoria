<?php

//namespace WebPConvert\Convert\Converters\BaseTraits;
namespace Rarus\Isolated\WebPConvert\Convert\Converters\ConverterTraits;

/**
 * Trait for converters that supports lossless encoding and thus the "lossless:auto" option.
 *
 * @package    WebPConvert
 * @author     Bjørn Rosell <it@rosell.dk>
 * @since      Class available since Release 2.0.0
 */
trait EncodingAutoTrait
{
    protected abstract function doActualConvert();
    public abstract function getSource();
    public abstract function getDestination();
    public abstract function setDestination($destination);
    public abstract function getOptions();
    protected abstract function setOption($optionName, $optionValue);
    protected abstract function logLn($msg, $style = '');
    protected abstract function log($msg, $style = '');
    protected abstract function ln();
    protected abstract function logReduction($source, $destination);
    public function supportsLossless()
    {
        return \true;
    }
    /** Default is to not pass "lossless:auto" on, but implement it.
     *
     *  The Stack converter passes it on (it does not even use this trait)
     *  WPC currently implements it, but this might be configurable in the future.
     *
     */
    public function passOnEncodingAuto()
    {
        return \false;
    }
    private function convertTwoAndSelectSmallest()
    {
        $destination = $this->getDestination();
        $destinationLossless = $destination . '.lossless.webp';
        $destinationLossy = $destination . '.lossy.webp';
        $this->logLn('Encoding is set to auto - converting to both lossless and lossy and selecting the smallest file');
        $this->ln();
        $this->logLn('Converting to lossy');
        $this->setDestination($destinationLossy);
        $this->setOption('encoding', 'lossy');
        $this->doActualConvert();
        $this->log('Reduction: ');
        $this->logReduction($this->getSource(), $destinationLossy);
        $this->ln();
        $this->logLn('Converting to lossless');
        $this->setDestination($destinationLossless);
        $this->setOption('encoding', 'lossless');
        $this->doActualConvert();
        $this->log('Reduction: ');
        $this->logReduction($this->getSource(), $destinationLossless);
        $this->ln();
        if (\filesize($destinationLossless) > \filesize($destinationLossy)) {
            $this->logLn('Picking lossy');
            \unlink($destinationLossless);
            \rename($destinationLossy, $destination);
        } else {
            $this->logLn('Picking lossless');
            \unlink($destinationLossy);
            \rename($destinationLossless, $destination);
        }
        $this->setDestination($destination);
        $this->setOption('encoding', 'auto');
    }
    protected function runActualConvert()
    {
        if (!$this->passOnEncodingAuto() && $this->getOptions()['encoding'] == 'auto' && $this->supportsLossless()) {
            $this->convertTwoAndSelectSmallest();
        } else {
            $this->doActualConvert();
        }
    }
}
