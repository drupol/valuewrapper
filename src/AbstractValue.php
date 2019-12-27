<?php

declare(strict_types=1);

namespace drupol\valuewrapper;

/**
 * Class AbstractValue.
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
     * @return mixed
     */
    public function __invoke()
    {
        return $this->value();
    }

    /**
     * {@inheritdoc}
     */
    public function apply(callable $callable)
    {
        $value = $this->value();

        return $callable($value);
    }

    /**
     * {@inheritdoc}
     */
    abstract public function hash(): string;

    /**
     * @return string
     */
    abstract public function serialize();

    /**
     * @param string $serialized
     *
     * @return mixed
     */
    abstract public function unserialize($serialized);

    /**
     * {@inheritdoc}
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @param string $string
     *   The string to hash
     *
     * @return string
     *   The string's hash
     */
    protected function doHash(string $string): string
    {
        return sha1($string);
    }

    /**
     * Set the value.
     *
     * @param mixed $value
     */
    protected function set($value): void
    {
        $this->value = $value;
    }
}
