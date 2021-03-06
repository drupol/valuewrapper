<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Object;

use drupol\valuewrapper\AbstractValue;
use drupol\valuewrapper\ValueInterface;

use function get_class;

/**
 * Class ObjectValue.
 */
abstract class ObjectValue extends AbstractValue implements ObjectValueInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(callable $callable)
    {
        $value = clone $this->value();

        return $callable($value);
    }

    /**
     * {@inheritdoc}
     */
    public function class(): string
    {
        return get_class($this->value());
    }

    /**
     * {@inheritdoc}
     */
    public function equals(ValueInterface $item, bool $strict = true): bool
    {
        return $this->hash() === $item->hash();
    }

    /**
     * {@inheritdoc}
     */
    public function type(): string
    {
        return 'object';
    }
}
