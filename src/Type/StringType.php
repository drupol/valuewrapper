<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

/**
 * Class StringType
 */
class StringType extends TypeValue
{
    /**
     * StringType constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    /**
     * {@inheritdoc}
     */
    public function __toArray(): array {
        return str_split($this->value());
    }
}
