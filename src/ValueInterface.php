<?php

declare(strict_types = 1);

namespace drupol\valuewrapper;

use drupol\valuewrapper\Contract\Hashable;
use drupol\valuewrapper\Contract\Equalable;

/**
 * Interface ValueInterface
 */
interface ValueInterface extends Hashable, Equalable, \Serializable
{
    /**
     * Get the original value of the object.
     *
     * @return mixed
     *   The original value.
     */
    public function value();
}
