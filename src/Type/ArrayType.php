<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

/**
 * Class ArrayType
 */
class ArrayType extends TypeValue
{
    /**
     * ArrayType constructor.
     *
     * @param array $value
     */
    public function __construct(array $value)
    {
        parent::__construct($value);
    }

    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        if ($string = \json_encode($this->get())) {
            return $this->doHash($this->getType() . $string);
        }

        throw new \Exception('Unable to encode the value.');
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        throw new \BadMethodCallException('Unable to convert an array to string.');
    }
}
