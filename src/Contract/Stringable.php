<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Contract;

use drupol\valuewrapper\ValueInterface;

/**
 * Interface Stringable
 */
interface Stringable
{
    /**
     * Get the string representation of the object.
     *
     * @return string
     *   The object's value as a string.
     */
    public function __toString() : string;
}
