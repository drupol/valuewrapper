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
        if ($this->get() instanceof Hashable) {
            return $this->doHash(\gettype($this->get()) . \get_class($this->get()) . $this->get()->hash());
        }

        return $this->doHash(\gettype($this->get()) . \get_class($this->get()) . \spl_object_hash($this->get()));
    }

    /**
     * {@inheritdoc}
     */
    public function equals(ValueInterface $item, $strict = true): bool
    {
        return $this->hash() == $item->hash();
    }
}
