<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

/**
 * Class BooleanType
 */
class BooleanType extends TypeValue
{
    /**
     * BooleanType constructor.
     *
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }

    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        $value = true === $this->get() ?
            'true':
            'false';

        return $this->doHash($this->getType() . $value . $this->get());
    }
}
