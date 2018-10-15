<?php

namespace drupol\valuewrapper\Object;

use drupol\valuewrapper\ValueInterface;

/**
 * Interface ObjectValueInterface
 */
interface ObjectValueInterface extends ValueInterface
{
    /**
     * {@inheritdoc}
     */
    public function class(): string;

    /**
     * {@inheritdoc}
     */
    public function type(): string;
}
