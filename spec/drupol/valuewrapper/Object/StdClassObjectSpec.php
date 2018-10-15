<?php

namespace spec\drupol\valuewrapper\Object;

use drupol\valuewrapper\Object\StdClassObject;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StdClassObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $object = new \StdClass();

        $this->beConstructedWith($object);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(StdClassObject::class);
    }

    public function it_can_serialize()
    {
        $this
            ->shouldThrow('\Exception')
            ->during('serialize');
    }

    public function it_can_unserialize()
    {
        $this
            ->shouldThrow('\Exception')
            ->during('unserialize', ['foo']);
    }
}
