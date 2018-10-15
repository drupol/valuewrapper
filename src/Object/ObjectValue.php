<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object;

use drupol\valuewrapper\AbstractValue;
use drupol\valuewrapper\Contract\Hashable;
use drupol\valuewrapper\ValueInterface;

/**
 * Class ObjectValue
 */
abstract class ObjectValue extends AbstractValue
{
    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        if ($this->value() instanceof Hashable) {
            return $this->doHash(\gettype($this->value()) . \get_class($this->value()) . $this->value()->hash());
        }

        return $this->doHash(\gettype($this->value()) . \get_class($this->value()) . \spl_object_hash($this->value()));
    }

    /**
     * {@inheritdoc}
     */
    public function equals(ValueInterface $item, $strict = true): bool
    {
        return $this->hash() == $item->hash();
    }
}
