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
            ->shouldReturn('aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d');
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
}
