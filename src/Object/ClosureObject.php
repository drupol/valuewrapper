<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object;

use drupol\valuewrapper\ValueInterface;
use SuperClosure\SerializableClosure;
use SuperClosure\Serializer;

/**
 * Class ClosureObject
 */
class ClosureObject extends ObjectValue
{
    /**
     * @var \SuperClosure\Serializer
     */
    private $serializer;

    /**
     * ClosureObject constructor.
     *
     * @param \Closure $value
     */
    public function __construct(\Closure $value)
    {
        parent::__construct($value);

        $this->serializer = new Serializer();
    }

    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        return $this->doHash($this->serializer->serialize($this->get()));
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke()
    {
        return \call_user_func_array($this->get(), \func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return \serialize([
            'value' => base64_encode($this->serializer->serialize($this->get())),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $unserialized = \unserialize($serialized);

        $this->set(
            $this->serializer->unserialize(base64_decode($unserialized['value']))
        );
    }
}
