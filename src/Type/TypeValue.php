<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

use drupol\valuewrapper\AbstractValue;
use drupol\valuewrapper\ValueInterface;

/**
 * Class TypeValue
 */
abstract class TypeValue extends AbstractValue implements TypeValueInterface
{
    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        return $this->doHash(var_export($this->value(), true));
    }

    /**
     * {@inheritdoc}
     */
    protected function doHash(string $string) : string
    {
        return parent::doHash($this->type() . $string);
    }

    /**
     * {@inheritdoc}
     */
    public function type() : string
    {
        return \gettype($this->value());
    }

    /**
     * {@inheritdoc}
     */
    public function equals(ValueInterface $item, bool $strict = true) : bool
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
            'value' => $this->value(),
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

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return (string) $this->value();
    }

    /**
     * {@inheritdoc}
     */
    public function __toArray(): array
    {
        return (array) $this->value();
    }
}
