<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Type;

use drupol\valuewrapper\Contract\Stringable;

/**
 * Class IntegerType.
 */
class IntegerType extends TypeValue implements Stringable
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

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return (string) $this->value();
    }
}
