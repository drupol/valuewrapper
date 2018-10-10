<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Resource;

use drupol\valuewrapper\AbstractValue;
use drupol\valuewrapper\ValueInterface;

/**
 * Class ResourceValue
 */
abstract class ResourceValue extends AbstractValue
{
    /**
     * ResourceValue constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (false == \is_resource($value)) {
            throw new \TypeError(
                'Argument 1 passed to drupol\valuewrapper\Resource\ResourceValue::__construct()' .
                'must be of the type Resource, ' . gettype($value) . ' given.'
            );
        }

        parent::__construct($value);
    }

    /**
     * {@inheritdoc}
     */
    abstract public function hash(): string;

    /**
     * {@inheritdoc}
     */
    public function equals(ValueInterface $item, $strict = true) : bool
    {
        return $this->hash() == $item->hash();
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        throw new \ErrorException('Unsupported method.');
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        throw new \ErrorException('Unsupported method.');
    }
}
