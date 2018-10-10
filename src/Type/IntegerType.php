<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

/**
 * Class IntegerType
 */
class IntegerType extends TypeValue
{
    /**
     * IntegerType constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        parent::__construct($value);
    }
}
