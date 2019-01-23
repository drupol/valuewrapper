<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Object;

use drupol\valuewrapper\Object\DateTimeObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;

class DateTimeObjectSpec extends ObjectBehavior
{
    public function it_can_apply_a_callable()
    {
        $callable = function ($value) {
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
            ->shouldReturn('DateTime');
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('c4e56bd30a940aaea1e9c0e5f848a04c33743764');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";i:1539129600;}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";i:1539129600;}');

        $date = ValueWrapper::create(new \DateTime('2018-10-10'));

        $this
            ->equals($date)
            ->shouldReturn(true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeObject::class);
    }

    public function let()
    {
        $datetime = new \DateTime('2018-10-10');

        $this->beConstructedWith($datetime);
    }
}
