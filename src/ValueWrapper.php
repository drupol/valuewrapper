<?php

declare(strict_types = 1);

namespace drupol\valuewrapper;

/**
 * Class ValueWrapper.
 */
class ValueWrapper implements ValueWrapperInterface
{
    /**
     * The storage variable containing the object mappings.
     *
     * @var array
     */
    public static $objectMappingRegistry = [
        'stdClass' => \drupol\valuewrapper\Object\StdClassObject::class,
        'Anonymous' => \drupol\valuewrapper\Object\AnonymousObject::class,
        'Closure' => \drupol\valuewrapper\Object\ClosureObject::class,
        'DateTime' => \drupol\valuewrapper\Object\DateTimeObject::class,
        'Exception' => \drupol\valuewrapper\Object\Exception\ExceptionObject::class,
        'Error' => \drupol\valuewrapper\Object\Exception\ErrorObject::class,
        'TypeError' => \drupol\valuewrapper\Object\Exception\TypeErrorObject::class,
        'ArithmeticError' => \drupol\valuewrapper\Object\Exception\ArithmeticErrorObject::class,
        'AssertionError' => \drupol\valuewrapper\Object\Exception\AssertionErrorObject::class,
        'DivisionByZeroError' => \drupol\valuewrapper\Object\Exception\DivisionByZeroErrorObject::class,
        'ParseError' => \drupol\valuewrapper\Object\Exception\ParseErrorObject::class,
    ];

    /**
     * The storage variable containing the resource mappings.
     *
     * @var array
     */
    public static $resourceMappingRegistry = [
        'stream' => \drupol\valuewrapper\Resource\StreamResource::class,
    ];
    /**
     * The storage variable containing the type mappings.
     *
     * @var array
     */
    public static $typeMappingRegistry = [
        'string' => \drupol\valuewrapper\Type\StringType::class,
        'array' => \drupol\valuewrapper\Type\ArrayType::class,
        'null' => \drupol\valuewrapper\Type\NullType::class,
        'boolean' => \drupol\valuewrapper\Type\BooleanType::class,
        'integer' => \drupol\valuewrapper\Type\IntegerType::class,
        'double' => \drupol\valuewrapper\Type\DoubleType::class,
    ];

    /**
     * {@inheritdoc}
     */
    public static function create($value): ValueInterface
    {
        return (new self())->make($value);
    }

    /**
     * {@inheritdoc}
     */
    public function make($value): ValueInterface
    {
        $type = $this->getType($value);

        switch ($type) {
            case 'object':
                if ($value instanceof ValueInterface) {
                    return $value;
                }

                $mappings = self::$objectMappingRegistry;
                $type = \get_class($value);

                if (0 === \strpos($type, 'class@anonymous')) {
                    $type = 'Anonymous';
                }

                break;

            case 'resource':
                $mappings = self::$resourceMappingRegistry;
                $type = \get_resource_type($value);

                break;

            default:
                $mappings = self::$typeMappingRegistry;

                break;
        }

        if (isset($mappings[$type])) {
            return new $mappings[$type]($value);
        }

        throw new \OutOfBoundsException(
            \sprintf('Unable to find a wrapping class for value type "%s".', $type)
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getType($value): string
    {
        return \strtolower(\gettype($value));
    }
}
