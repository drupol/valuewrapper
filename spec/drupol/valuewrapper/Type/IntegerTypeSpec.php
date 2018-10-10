<?php

namespace spec\drupol\valuewrapper\Type;

use drupol\valuewrapper\Type\IntegerType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IntegerTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(IntegerType::class);
    }

    public function let()
    {
        $this->beConstructedWith(7);
    }

    public function it_can_use_get()
    {
        $this
            ->get()
            ->shouldReturn(7);
    }

    public function it_can_hash_an_array()
    {
        $this
            ->hash()
            ->shouldReturn('728c1280b8c8f8217de9a891f0aeba8c39276274');
    }

    public function it_can_throw_an_exception_when_unable_to_encode_to_json()
    {
        $this
            ->shouldThrow('\TypeError')
            ->during('__construct', ['string']);
    }

    public function it_can_get_the_type()
    {
        $this
            ->getType()
            ->shouldReturn('integer');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";i:7;}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";i:7;}');
        $this
            ->get()
            ->shouldReturn(7);
    }
}
