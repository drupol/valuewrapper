<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object;

/**
 * Class StdClassObject.
 */
class StdClassObject extends ObjectValue
{
    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        throw new \BadMethodCallException('Unable to hash this class.');
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        throw new \BadMethodCallException('Unable to serialize this class.');
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        throw new \BadMethodCallException('Unable to unserialize this class.');
    }
}
