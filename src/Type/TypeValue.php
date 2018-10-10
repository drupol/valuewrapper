<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

use drupol\valuewrapper\AbstractValue;
use drupol\valuewrapper\ValueInterface;

/**
 * Class TypeValue
 */
abstract class TypeValue extends AbstractValue
{
    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        return $this->doHash($this->getType() . $this->get());
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return \gettype($this->get());
    }

    /**
     * {@inheritdoc}
     */
    public function equals(ValueInterface $item, $strict = true) : bool
    {
        return ($strict === true) ?
            $this === $item:
            $this == $item;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return \serialize([
            'value' => $this->get(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $unserialize = \unserialize($serialized);

        $this->set($unserialize['value']);
    }
}
