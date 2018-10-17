<?php

namespace spec\drupol\valuewrapper\Type;

use drupol\valuewrapper\Type\IntegerType;
use PhpSpec\ObjectBehavior;

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
            ->value()
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
            ->type()
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
            ->value()
            ->shouldReturn(7);
    }

    public function it_can_be_printed()
    {
        $this
            ->__toString()
            ->shouldReturn('7');
    }

    public function it_can_be_casted_as_an_array()
    {
        $this
            ->__toArray()
            ->shouldReturn([7]);
    }

    public function it_can_apply_a_callable()
    {
        $callable = function ($value) {
            return $value;
        };

        $this
            ->apply($callable)
            ->shouldReturn($this->value());
    }
}
