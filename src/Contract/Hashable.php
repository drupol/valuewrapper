<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Contract;

/**
 * Interface Hashable.
 */
interface Hashable
{
    /**
     * Get the hash of the object.
     *
     * @return string
     *   The object's hash
     */
    public function hash(): string;
}
