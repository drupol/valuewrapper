<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object;

use drupol\valuewrapper\Contract\Hashable;

/**
 * Class AnonymousObject
 */
class AnonymousObject extends ObjectValue
{
    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        if ($this->get() instanceof Hashable) {
            return $this->doHash($this->get()->hash());
        }

        throw new \Exception('The anonymous class must implement Hashable interface.');
    }
}
