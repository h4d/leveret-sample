<?php


namespace Application\Models\Samples\ViewHelpers;


use H4D\Leveret\Application\View\Helpers\AbstractHelper;

/**
 * Sample helper
 *
 * Class CustomHelper
 * @package Application\Models\Helpers
 */
class SillyHelper extends AbstractHelper
{
    /**
     * AddHelper constructor.
     *
     * @param string $alias
     */
    public function __construct($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @param string $string
     *
     * @return float
     */
    public function __invoke($string)
    {
        return strrev($string);
    }
}