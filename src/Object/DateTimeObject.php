<?php

declare(strict_types = 1);

namespace drupol\valuewrapper\Object;

/**
 * Class DateTimeObject.
 */
class DateTimeObject extends ObjectValue
{
    /**
     * DateTimeObject constructor.
     *
     * @param \DateTime $value
     */
    public function __construct(\DateTime $value)
    {
        parent::__construct($value);
    }

    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        return $this->doHash($this->type() . $this->class() . $this->value()->getTimestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return \serialize([
            'value' => $this->value()->getTimestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $unserialize = \unserialize($serialized);

        $this->set(
            (new \DateTime())->setTimestamp($unserialize['value'])
        );
    }
}
