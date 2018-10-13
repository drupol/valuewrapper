<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object\Exception;

/**
 * Class DivisionByZeroErrorObject
 */
class DivisionByZeroErrorObject extends AbstractArithmeticErrorObject
{
    /**
     * DivisionByZeroErrorObject constructor.
     *
     * @param \DivisionByZeroError $value
     */
    public function __construct(\DivisionByZeroError $value)
    {
        parent::__construct($value);
    }
}
