<?php

declare(strict_types = 1);

namespace drupol\valuewrapper;

use drupol\valuewrapper\Object\AnonymousObject;
use drupol\valuewrapper\Object\ClosureObject;
use drupol\valuewrapper\Object\DateTimeObject;
use drupol\valuewrapper\Object\Exception\ArithmeticErrorObject;
use drupol\valuewrapper\Object\Exception\AssertionErrorObject;
use drupol\valuewrapper\Object\Exception\DivisionByZeroErrorObject;
use drupol\valuewrapper\Object\Exception\ErrorObject;
use drupol\valuewrapper\Object\Exception\ExceptionObject;
use drupol\valuewrapper\Object\Exception\ParseErrorObject;
use drupol\valuewrapper\Object\Exception\TypeErrorObject;
use drupol\valuewrapper\Object\StdClassObject;
use drupol\valuewrapper\Resource\StreamResource;
use drupol\valuewrapper\Type\ArrayType;
use drupol\valuewrapper\Type\BooleanType;
use drupol\valuewrapper\Type\DoubleType;
use drupol\valuewrapper\Type\IntegerType;
use drupol\valuewrapper\Type\NullType;
use drupol\valuewrapper\Type\StringType;

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
        'stdClass' => StdClassObject::class,
        'Anonymous' => AnonymousObject::class,
        'Closure' => ClosureObject::class,
        'DateTime' => DateTimeObject::class,
        'Exception' => ExceptionObject::class,
        'Error' => ErrorObject::class,
        'TypeError' => TypeErrorObject::class,
        'ArithmeticError' => ArithmeticErrorObject::class,
        'AssertionError' => AssertionErrorObject::class,
        'DivisionByZeroError' => DivisionByZeroErrorObject::class,
        'ParseError' => ParseErrorObject::class,
    ];

    /**
     * The storage variable containing the resource mappings.
     *
     * @var array
     */
    public static $resourceMappingRegistry = [
        'stream' => StreamResource::class,
    ];
    /**
     * The storage variable containing the type mappings.
     *
     * @var array
     */
    public static $typeMappingRegistry = [
        'string' => StringType::class,
        'array' => ArrayType::class,
        'null' => NullType::class,
        'boolean' => BooleanType::class,
        'integer' => IntegerType::class,
        'double' => DoubleType::class,
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
