<?php

// On purpose.
declare(strict_types = 0);

namespace spec\drupol\valuewrapper\Type;

use drupol\valuewrapper\Type\BooleanType;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BooleanTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BooleanType::class);
    }

    public function it_can_hash_a_boolean()
    {
        $this
            ->hash()
            ->shouldReturn('cda865d251ad7a4f5b75c268bbe053ea3495fedf');
    }

    public function it_can_get_the_type()
    {
        $this
            ->type()
            ->shouldReturn('boolean');
    }

    public function it_tmp2(BooleanType $bool)
    {
        $this->beConstructedWith(1);
        $bool->beConstructedWith([3]);

        $this
            ->hash()
            ->shouldNotBeEqualTo($bool->hash());
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";b:1;}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";b:1;}');
        $this
            ->value()
            ->shouldReturn(true);
    }

    public function it_can_be_printed()
    {
        $this
            ->shouldThrow('\BadMethodCallException')
            ->during('__toString');
    }
}
