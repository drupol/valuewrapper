<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Object;

use drupol\valuewrapper\Object\AnonymousObject;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use drupol\valuewrapper\Contract\Hashable;

class AnonymousObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $object = new class implements Hashable {
            public function hash(): string
            {
                return 'hello';
            }
        };

        $this->beConstructedWith($object);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AnonymousObject::class);
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('f3c9bf4c389b5b7205b331449efdfcbb254c95c6');
    }

    public function it_can_throw_an_exception_when_not_hashable()
    {
        $object = new class {
        };

        $this->beConstructedWith($object);

        $this
            ->shouldThrow('\Exception')
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

    public function it_can_get_its_class()
    {
        $this
            ->class()
            ->shouldStartWith('class@anonymous');
    }

    public function it_can_apply_a_callable()
    {
        $callable = function ($value) {
            return 'hello';
        };

        $this
            ->apply($callable)
            ->shouldReturn('hello');
    }
}
