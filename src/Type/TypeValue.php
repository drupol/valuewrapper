<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

use drupol\valuewrapper\AbstractValue;
use drupol\valuewrapper\ValueInterface;

/**
 * Class TypeValue.
 */
abstract class TypeValue extends AbstractValue implements TypeValueInterface
{
    /**
     * {@inheritdoc}
     */
    public function __toArray(): array
    {
        return (array) $this->value();
    }

    /**
     * {@inheritdoc}
     */
    public function equals(ValueInterface $item): bool
    {
        return $this->value() === $item->value();
    }

    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        return $this->doHash(\var_export($this->value(), true));
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
    public function type(): string
    {
        return \gettype($this->value());
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
    protected function doHash(string $string): string
    {
        return parent::doHash($this->type() . $string);
    }
}
