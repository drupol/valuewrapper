<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object;

use drupol\valuewrapper\ValueInterface;

/**
 * Interface ObjectValueInterface.
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
