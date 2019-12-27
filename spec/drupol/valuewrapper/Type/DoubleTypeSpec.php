<?php

declare(strict_types=1);

namespace spec\drupol\valuewrapper\Type;

use drupol\valuewrapper\Type\DoubleType;
use PhpSpec\ObjectBehavior;

class DoubleTypeSpec extends ObjectBehavior
{
    public function it_can_apply_a_callable()
    {
        $callable = static function ($value) {
            return $value;
        };

        $this
            ->apply($callable)
            ->shouldReturn($this->value());
    }

    public function it_can_be_casted_as_an_array()
    {
        $this
            ->__toArray()
            ->shouldReturn([3.1415]);
    }

    public function it_can_be_printed()
    {
        $this
            ->__toString()
            ->shouldReturn('3.1415');
    }

    public function it_can_get_the_type()
    {
        $this
            ->type()
            ->shouldReturn('double');
    }

    public function it_can_hash_an_array()
    {
        $this
            ->hash()
            ->shouldReturn('87e3b50534f4cdbc3eaaaac7acca7719e6c3a911');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";d:3.1415;}');
    }

    public function it_can_throw_an_exception_when_unable_to_encode_to_json()
    {
        $this
            ->shouldThrow('\TypeError')
            ->during('__construct', ['string']);
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";d:3.1415;}');
        $this
            ->value()
            ->shouldReturn(3.1415);
    }

    public function it_can_use_get()
    {
        $this
            ->value()
            ->shouldReturn(3.1415);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DoubleType::class);
    }

    public function let()
    {
        $this->beConstructedWith(3.1415);
    }
}
