<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Type;

use drupol\valuewrapper\Type\ArrayType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(str_split('hello'));
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ArrayType::class);
    }

    public function it_can_hash_an_array()
    {
        $this
            ->hash()
            ->shouldReturn('a6ebe1b1acaadd9c5f546cee735fd59ad9cc1934');
    }

    public function it_can_throw_an_exception_when_unable_to_encode_to_json()
    {
        $this->beConstructedWith(str_split('Fiesta de cumpleaños'));

        $this
            ->shouldThrow('\Exception')
            ->during('hash');
    }

    public function it_can_get_the_type()
    {
        $this
            ->type()
            ->shouldReturn('array');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";a:5:{i:0;s:1:"h";i:1;s:1:"e";i:2;s:1:"l";i:3;s:1:"l";i:4;s:1:"o";}}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";a:5:{i:0;s:1:"h";i:1;s:1:"e";i:2;s:1:"l";i:3;s:1:"l";i:4;s:1:"o";}}');
        $this
            ->value()
            ->shouldReturn(str_split('hello'));
    }

    public function it_can_be_printed()
    {
        $this
            ->shouldThrow('\BadMethodCallException')
            ->during('__toString');
    }
}
