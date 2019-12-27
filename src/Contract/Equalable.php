<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Contract;

use drupol\valuewrapper\ValueInterface;

/**
 * Interface Equalable.
 */
interface Equalable
{
    /**
     * Compare objects.
     *
     * @param ValueInterface $item
     *
     * @return bool
     *   The object's hash
     */
    public function equals(ValueInterface $item): bool;
}
