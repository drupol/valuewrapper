<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Type;

/**
 * Class BooleanType.
 */
class BooleanType extends TypeValue
{
    /**
     * BooleanType constructor.
     *
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }
}
