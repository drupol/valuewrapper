<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Resource;

use drupol\valuewrapper\AbstractValue;
use drupol\valuewrapper\ValueInterface;
use ErrorException;
use TypeError;

use function gettype;
use function is_resource;

/**
 * Class ResourceValue.
 */
abstract class ResourceValue extends AbstractValue implements ResourceValueInterface
{
    /**
     * ResourceValue constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (false === is_resource($value)) {
            throw new TypeError(
                'Argument 1 passed to drupol\valuewrapper\Resource\ResourceValue::__construct()' .
                ' must be of the type Resource, ' . gettype($value) . ' given.'
            );
        }

        parent::__construct($value);
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
    public function serialize()
    {
        throw new ErrorException('Unsupported method.');
    }

    /**
     * {@inheritdoc}
     */
    public function type(): string
    {
        return get_resource_type($this->value());
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        throw new ErrorException('Unsupported method.');
    }
}
