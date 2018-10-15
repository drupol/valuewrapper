<?php

namespace drupol\valuewrapper\Type;

use drupol\valuewrapper\Contract\Arrayable;
use drupol\valuewrapper\Contract\Stringable;
use drupol\valuewrapper\ValueInterface;

/**
 * Interface TypeValueInterface
 */
interface TypeValueInterface extends ValueInterface, Stringable, Arrayable
{
    /**
     * {@inheritdoc}
     */
    public function type(): string;
}
