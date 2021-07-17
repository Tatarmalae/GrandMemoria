<?php

namespace Dev;

/**
 * Class IBlock
 * @package Dev
 */
class IBlock
{
    /**
     * @var int $IBlockID
     */
    protected int $IBlockID;

    /**
     * @var int $defaultIBlockID
     */
    protected int $defaultIBlockID = 0;

    /**
     * IBlockID constructor.
     * @param $IBlockID
     */
    public function __construct($IBlockID)
    {
        if ($IBlockID > 0) {
            $this->IBlockID = $IBlockID;
        } elseif ($this->defaultIBlockID > 0) {
            $this->IBlockID = $this->defaultIBlockID;
        } else {
            return false;
        }
        return true;
    }

}