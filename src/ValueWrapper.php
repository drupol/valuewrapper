<?php

declare(strict_types = 1);

namespace drupol\valuewrapper;

/**
 * Class ValueWrapper
 */
class ValueWrapper implements ValueWrapperInterface
{
    /**
     * The storage variable containing the type mappings.
     *
     * @var array
     */
    public static $typeMappingRegistry = [
        '*' => \drupol\valuewrapper\Type\TypeValue::class,
        'string' => \drupol\valuewrapper\Type\StringType::class,
        'array' => \drupol\valuewrapper\Type\ArrayType::class,
        'null' => \drupol\valuewrapper\Type\NullType::class,
        'boolean' => \drupol\valuewrapper\Type\BooleanType::class,
        'integer' => \drupol\valuewrapper\Type\IntegerType::class,
        'double' => \drupol\valuewrapper\Type\DoubleType::class,
    ];

    /**
     * The storage variable containing the object mappings.
     *
     * @var array
     */
    public static $objectMappingRegistry = [
        '*' => \drupol\valuewrapper\Object\ObjectValue::class,
        'stdClass' => \drupol\valuewrapper\Object\StdClassObject::class,
        'Anonymous' => \drupol\valuewrapper\Object\AnonymousObject::class,
        'Closure' => \drupol\valuewrapper\Object\ClosureObject::class,
        'DateTime' => \drupol\valuewrapper\Object\DateTimeObject::class,
    ];

    /**
     * The storage variable containing the resource mappings.
     *
     * @var array
     */
    public static $resourceMappingRegistry = [
        '*' => \drupol\valuewrapper\Resource\ResourceValue::class,
        'stream' => \drupol\valuewrapper\Resource\StreamResource::class,
    ];

    /**
     * {@inheritdoc}
     */
    public static function create($value) : ValueInterface
    {
        return (new self())->make($value);
    }

    /**
     * {@inheritdoc}
     */
    public function make($value) : ValueInterface
    {
        $type = $this->getType($value);

        switch ($type) {
            case 'object':
                if ($value instanceof ValueInterface) {
                    return $value;
                }

                $mappings = self::$objectMappingRegistry;
                $type = \get_class($value);

                if (0 === strpos($type, 'class@anonymous')) {
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

        $class = $mappings[$type] ?? $mappings['*'];

        return new $class($value);
    }

    /**
     * {@inheritdoc}
     */
    protected function getType($value) : string
    {
        return \strtolower(\gettype($value));
    }
}
