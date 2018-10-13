<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object\Exception;

/**
 * Class ArithmeticErrorObject
 */
class ArithmeticErrorObject extends AbstractErrorObject
{
    /**
     * ArithmeticErrorObject constructor.
     *
     * @param \ArithmeticError $value
     */
    public function __construct(\ArithmeticError $value)
    {
        parent::__construct($value);
    }
}
