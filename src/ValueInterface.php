<?php

declare(strict_types = 1);

namespace drupol\valuewrapper;

use drupol\valuewrapper\Contract\Equalable;
use drupol\valuewrapper\Contract\Hashable;

/**
 * Interface ValueInterface.
 */
interface ValueInterface extends Hashable, Equalable, \Serializable
{
    /**
     * Apply a callable to the value.
     *
     * The value will be the only parameter of the callback..
     *
     * @param callable $callable
     *   The callback to apply to the object's value
     *
     * @return mixed
     *   The result of the callback
     */
    public function apply(callable $callable);

    /**
     * Get the original value of the object.
     *
     * @return mixed
     *   The original value
     */
    public function value();
}
