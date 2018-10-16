<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper;

use drupol\valuewrapper\Type\StringType;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValueWrapperSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ValueWrapper::class);
    }

    public function it_should_not_create_twice_a_specific_object()
    {
        $valueObject = new StringType('string');

        $this->make($valueObject)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Type\StringType');
    }

    public function it_should_create_an_object_with_a_string()
    {
        $string = 'string';

        $this->make($string)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Type\StringType');
    }

    public function it_should_create_an_object_with_an_array()
    {
        $array = ['a', 'b', 'c'];

        $this->make($array)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Type\ArrayType');
    }

    public function it_should_create_an_object_with_a_boolean()
    {
        $boolean = true;

        $this->make($boolean)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Type\BooleanType');
    }

    public function it_should_create_an_object_with_an_integer()
    {
        $integer = 42;

        $this->make($integer)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Type\IntegerType');
    }

    public function it_should_create_an_object_with_a_null()
    {
        $null = null;

        $this->make($null)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Type\NullType');
    }

    public function it_should_create_an_object_with_a_double()
    {
        $double = 3.1415;

        $this->make($double)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Type\DoubleType');
    }

    public function it_should_create_an_object_with_an_object()
    {
        $object = new \stdClass();

        $this->make($object)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Object\ObjectValue');
    }

    public function it_should_create_an_object_with_a_resource()
    {
        $resource = \tmpfile();

        $this->make($resource)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Resource\StreamResource');
    }

    public function it_should_create_an_object_with_a_closure()
    {
        $closure = function () {
        };

        $this->make($closure)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Object\ClosureObject');
    }

    public function it_should_create_an_object_with_an_anonymous_object()
    {
        $anonymous = new class {
        };

        $this->make($anonymous)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Object\AnonymousObject');
    }

    public function it_should_create_an_object_with_a_standard_object()
    {
        $stdclass = new \StdClass();

        $this->make($stdclass)
            ->shouldBeAnInstanceOf('drupol\valuewrapper\Object\StdClassObject');
    }

    public function it_throws_an_exception_if_no_wrapper_is_found()
    {
        $random = new RandomObject();

        $this
            ->shouldThrow('\OutOfBoundsException')
            ->during('make', [$random]);
    }
}

class RandomObject
{
}
