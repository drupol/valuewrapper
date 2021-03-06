<?php

declare(strict_types=1);

namespace spec\drupol\valuewrapper\Resource;

use drupol\valuewrapper\Resource\StreamResource;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;

class StreamResourceSpec extends ObjectBehavior
{
    public function it_can_apply_a_callable()
    {
        $callable = static function ($value) {
            return 'hello';
        };

        $this
            ->apply($callable)
            ->shouldReturn('hello');
    }

    public function it_can_check_the_type_of_its_parameter()
    {
        $this
            ->shouldThrow('\TypeError')
            ->during('__construct', ['string']);
    }

    public function it_can_equals()
    {
        $res = fopen('build/delete-me.txt', 'wb');

        $resource = ValueWrapper::create($res);

        $this->equals($resource)->shouldReturn(true);
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('bc83fa2f33cd54d1dfd308ed1d64389858033d28');
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

    public function it_is_initializable()
    {
        $this->shouldHaveType(StreamResource::class);
    }

    public function let()
    {
        if (!file_exists('build')) {
            mkdir('build');
        }
        $resource = fopen('build/delete-me.txt', 'wb');

        $this->beConstructedWith($resource);
    }
}
