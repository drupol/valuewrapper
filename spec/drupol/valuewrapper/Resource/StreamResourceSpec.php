<?php

namespace spec\drupol\valuewrapper\Resource;

use drupol\valuewrapper\Resource\StreamResource;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StreamResourceSpec extends ObjectBehavior
{
    public function let()
    {
        $resource = fopen('tmp.txt', 'w');

        $this->beConstructedWith($resource);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(StreamResource::class);
    }

    public function it_can_check_the_type_of_its_parameter()
    {
        $this
            ->shouldThrow('\TypeError')
            ->during('__construct', ['string']);
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('9f4aef28f9292c1cda94479b33105cc0a0d57c96');
    }

    public function it_can_equals()
    {
        $res = fopen('tmp.txt', 'w');

        $resource = ValueWrapper::create($res);

        $this->equals($resource)->shouldReturn(true);
    }

    public function it_can_serialize()
    {
        $this
            ->shouldThrow('\ErrorException')
            ->during('serialize');
    }

    public function it_can_unserialize()
    {
        $this
            ->shouldThrow('\ErrorException')
            ->during('unserialize', ['string']);
    }
}
