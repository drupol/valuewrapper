<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Type;

use drupol\valuewrapper\Contract\Stringable;

/**
 * Class DoubleType.
 */
class DoubleType extends TypeValue implements Stringable
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

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return (string) $this->value();
    }
}
