<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object;

use SuperClosure\Serializer;

/**
 * Class ClosureObject.
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
    public function __invoke()
    {
        return \call_user_func_array($this->value(), \func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        return $this->doHash($this->type() . $this->serializer->serialize($this->value()));
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return \serialize([
            'value' => \base64_encode($this->serializer->serialize($this->value())),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $unserialized = \unserialize($serialized);

        $decoded = \base64_decode($unserialized['value'], true);

        if (\is_string($decoded)) {
            $this->set(
                $this->serializer->unserialize($decoded)
            );
        }
    }
}
