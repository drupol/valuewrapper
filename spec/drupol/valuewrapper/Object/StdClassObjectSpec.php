<?php

declare(strict_types=1);

namespace spec\drupol\valuewrapper\Object;

use drupol\valuewrapper\Object\StdClassObject;
use PhpSpec\ObjectBehavior;
use StdClass;

class StdClassObjectSpec extends ObjectBehavior
{
    public function it_can_apply_a_callable()
    {
        $callable = static function ($value) {
            return 'hello';
        };

        $this
            ->apply($callable)
            ->shouldReturn('hello');
    }

    public function it_can_get_its_class()
    {
        $this
            ->class()
            ->shouldReturn('stdClass');
    }

    public function it_can_hash()
    {
        $this
            ->shouldThrow('\BadMethodCallException')
            ->during('hash');
    }

    public function it_can_serialize()
    {
        $this
            ->shouldThrow('\BadMethodCallException')
            ->during('serialize');
    }

    public function it_can_unserialize()
    {
        $this
            ->shouldThrow('\BadMethodCallException')
            ->during('unserialize', ['foo']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(StdClassObject::class);
    }

    public function let()
    {
        $object = new StdClass();

        $this->beConstructedWith($object);
    }
}
