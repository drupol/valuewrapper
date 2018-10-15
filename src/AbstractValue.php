<?php

declare(strict_types = 1);

namespace drupol\valuewrapper;

/**
 * Class AbstractValue
 */
abstract class AbstractValue implements ValueInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * AbstractValue constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke()
    {
        return $this->value();
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * @param string $string
     *   The string to hash.
     *
     * @return string
     *   The string's hash.
     */
    protected function doHash(string $string) : string
    {
        return \sha1($string);
    }

    /**
     * Set the value.
     *
     * @param mixed $value
     */
    protected function set($value)
    {
        $this->value = $value;
    }
}
