<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Type;

use Exception;

/**
 * Class ArrayType.
 */
class ArrayType extends TypeValue
{
    /**
     * ArrayType constructor.
     *
     * @param array<mixed> $value
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
        if ($string = json_encode($this->value())) {
            return $this->doHash($string);
        }

        throw new Exception('Unable to encode the value.');
    }
}
