<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object\Exception;

/**
 * Class TypeErrorObject.
 */
class TypeErrorObject extends AbstractErrorObject
{
    /**
     * TypeObject constructor.
     *
     * @param \TypeError $value
     */
    public function __construct(\TypeError $value)
    {
        parent::__construct($value);
    }
}
