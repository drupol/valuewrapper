<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Object\Exception;

use ParseError;

/**
 * Class ParseErrorObject.
 */
class ParseErrorObject extends AbstractExceptionObject
{
    /**
     * ParseErrorObject constructor.
     *
     * @param ParseError $value
     */
    public function __construct(ParseError $value)
    {
        parent::__construct($value);
    }
}
