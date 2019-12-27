<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Object;

use BadMethodCallException;
use drupol\valuewrapper\Contract\Hashable;
use Exception;

/**
 * Class AnonymousObject.
 */
class AnonymousObject extends ObjectValue
{
    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        if ($this->value() instanceof Hashable) {
            return $this->doHash($this->type() . $this->value()->hash());
        }

        throw new Exception('The anonymous class must implement Hashable interface.');
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        throw new BadMethodCallException('Unable to serialize this class.');
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        throw new BadMethodCallException('Unable to unserialize this class.');
    }
}
