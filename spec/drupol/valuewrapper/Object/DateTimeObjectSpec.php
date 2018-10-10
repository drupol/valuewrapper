<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Object;

use drupol\valuewrapper\Object\DateTimeObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateTimeObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $datetime = new \DateTime('2018-10-10');

        $this->beConstructedWith($datetime);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeObject::class);
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('7f42e0398bee178e68381b887a7954cda7a833a1');
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
}
