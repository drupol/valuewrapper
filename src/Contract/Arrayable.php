<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Contract;

/**
 * Interface Arrayable.
 */
interface Arrayable
{
    /**
     * Get the value casted in an array.
     *
     * @return array
     *   The object's value casted in an array
     */
    public function __toArray(): array;
}
