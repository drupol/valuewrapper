<?php

declare(strict_types=1);

namespace drupol\valuewrapper\Object\Exception;

use drupol\valuewrapper\Object\ObjectValue;
use ReflectionClass;
use Throwable;
use TypeError;

/**
 * Class AbstractExceptionObject.
 */
abstract class AbstractExceptionObject extends ObjectValue
{
    /**
     * AbstractExceptionObject constructor.
     *
     * @param Throwable $value
     */
    public function __construct(Throwable $value)
    {
        parent::__construct($value);
    }

    /**
     * {@inheritdoc}
     */
    public function hash(): string
    {
        /** @var TypeError $value */
        $value = $this->value();

        $data = [
            'message' => $value->getMessage(),
            'code' => $value->getCode(),
            'class' => $this->class(),
        ];

        return $this->doHash($this->type() . $this->class() . implode('', $data));
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize([
            'value' => [
                'message' => $this->value()->getMessage(),
                'code' => $this->value()->getCode(),
                'class' => $this->class(),
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $unserialize = unserialize($serialized);

        $reflection = new ReflectionClass($unserialize['value']['class']);

        $this->set(
            ($reflection->newInstanceArgs([$unserialize['value']['message'], $unserialize['value']['code']]))
        );
    }
}
