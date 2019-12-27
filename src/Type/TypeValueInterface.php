<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Type;

use drupol\valuewrapper\Contract\Arrayable;
use drupol\valuewrapper\ValueInterface;

/**
 * Interface TypeValueInterface.
 */
interface TypeValueInterface extends Arrayable, ValueInterface
{
    /**
     * {@inheritdoc}
     */
    public function type(): string;
}
