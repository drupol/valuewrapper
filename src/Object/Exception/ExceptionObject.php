<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object\Exception;

/**
 * Class ExceptionObject
 */
class ExceptionObject extends AbstractExceptionObject
{
    /**
     * ExceptionObject constructor.
     *
     * @param \Exception $value
     */
    public function __construct(\Exception $value)
    {
        parent::__construct($value);
    }
}
