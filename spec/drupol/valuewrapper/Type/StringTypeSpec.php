<?php

// On purpose.
declare(strict_types = 0);

namespace spec\drupol\valuewrapper\Type;

use drupol\valuewrapper\Type\StringType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('string');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(StringType::class);
    }

    public function it_can_use_get()
    {
        $this
            ->value()
            ->shouldReturn('string');
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('9d382b7fb7cbdd7f2b71d1604ab77a35798772fb');
    }

    public function it_can_throw_an_exception_when_unable_to_encode_to_json()
    {
        $this
            ->shouldThrow('\TypeError')
            ->during('__construct', [[7]]);
    }

    public function it_can_get_the_type()
    {
        $this
            ->type()
            ->shouldReturn('string');
    }

    public function it_can_equals()
    {
        $this->beConstructedWith('4');

        $string = new StringType(4);

        $this
            ->equals($string)
            ->shouldReturn(false);
        $this
            ->equals($string, true)
            ->shouldReturn(false);
        $this
            ->equals($string, false)
            ->shouldReturn(true);
    }

    public function it_can_be_invoked()
    {
        $this()->shouldReturn('string');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";s:6:"string";}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";s:6:"string";}');
        $this
            ->value()
            ->shouldReturn('string');
    }

    public function it_can_be_printed()
    {
        $this
            ->__toString()
            ->shouldReturn('string');
    }
}
