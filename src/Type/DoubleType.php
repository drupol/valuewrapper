<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

/**
 * Class DoubleType
 */
class DoubleType extends TypeValue
{
    /**
     * DoubleType constructor.
     *
     * @param float $value
     */
    public function __construct(float $value)
    {
        parent::__construct($value);
    }
}
