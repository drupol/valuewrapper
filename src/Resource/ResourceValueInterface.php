<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Resource;

use drupol\valuewrapper\ValueInterface;

/**
 * Interface ResourceValueInterface.
 */
interface ResourceValueInterface extends ValueInterface
{
    /**
     * {@inheritdoc}
     */
    public function type(): string;
}
