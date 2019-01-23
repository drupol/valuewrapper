<?php

declare(strict_types = 1);

namespace drupol\valuewrapper;

/**
 * Interface ValueWrapperInterface.
 */
interface ValueWrapperInterface
{
    /**
     * @param mixed $value
     *   The value
     *
     * @return \drupol\valuewrapper\ValueInterface
     *   The value object wrapping the value parameter
     */
    public static function create($value): ValueInterface;

    /**
     * @param mixed $value
     *   The value
     *
     * @return \drupol\valuewrapper\ValueInterface
     *   The value object wrapping the value parameter
     */
    public function make($value): ValueInterface;
}
