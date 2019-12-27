<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Object\Exception;

use AssertionError;

/**
 * Class AssertionErrorObject.
 */
class AssertionErrorObject extends AbstractErrorObject
{
    /**
     * AssertionErrorObject constructor.
     *
     * @param AssertionError $value
     */
    public function __construct(AssertionError $value)
    {
        parent::__construct($value);
    }
}
