<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Type;

use drupol\valuewrapper\Type\NullType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NullTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(null);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(NullType::class);
    }

    public function it_can_use_get()
    {
        $this
            ->value()
            ->shouldBeNull();
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('eef19c54306daa69eda49c0272623bdb5e2b341f');
    }

    public function it_cannot_work_with_another_type_of_value()
    {
        $this
            ->shouldThrow('\TypeError')
            ->during('__construct', ['string']);
    }

    public function it_can_get_the_type()
    {
        $this
            ->type()
            ->shouldReturn('NULL');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";N;}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";N;}');
        $this
            ->value()
            ->shouldReturn(null);
    }

    public function it_can_be_printed()
    {
        $this
            ->__toString()
            ->shouldReturn('');
    }
}
