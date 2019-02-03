<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

/**
 * Class NullType.
 */
class NullType extends TypeValue
{
    /**
     * NullType constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (null !== $value) {
            throw new \TypeError(
                'Argument 1 passed to drupol\valuewrapper\Type\NullType::__construct() must be of the type null, ' .
                \gettype($value) . ' given.'
            );
        }

        parent::__construct($value);
    }
}
