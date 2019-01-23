<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object\Exception;

/**
 * Class ErrorObject.
 */
class ErrorObject extends AbstractExceptionObject
{
    /**
     * ErrorObject constructor.
     *
     * @param \Error $value
     */
    public function __construct(\Error $value)
    {
        parent::__construct($value);
    }
}
