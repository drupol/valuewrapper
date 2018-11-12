<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Type;

use drupol\valuewrapper\Contract\Arrayable;
use drupol\valuewrapper\ValueInterface;

/**
 * Interface TypeValueInterface
 */
interface TypeValueInterface extends ValueInterface, Arrayable
{
    /**
     * {@inheritdoc}
     */
    public function type(): string;
}
