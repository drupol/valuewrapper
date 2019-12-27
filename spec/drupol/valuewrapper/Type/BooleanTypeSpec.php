<?php

declare(strict_types=1);

// On purpose.
declare(strict_types=0);

namespace spec\drupol\valuewrapper\Type;

use drupol\valuewrapper\Type\BooleanType;
use PhpSpec\ObjectBehavior;

class BooleanTypeSpec extends ObjectBehavior
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
            ->shouldReturn([true]);
    }

    public function it_can_get_the_type()
    {
        $this
            ->type()
            ->shouldReturn('boolean');
    }

    public function it_can_hash_a_boolean()
    {
        $this
            ->hash()
            ->shouldReturn('281ba5365fc65c7ea47c3b306a292f9518c1cc70');
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

    public function it_is_initializable()
    {
        $this->shouldHaveType(BooleanType::class);
    }

    public function it_tmp2(BooleanType $bool)
    {
        $this->beConstructedWith(1);
        $bool->beConstructedWith([3]);

        $this
            ->hash()
            ->shouldNotBeEqualTo($bool->hash());
    }

    public function let()
    {
        $this->beConstructedWith(true);
    }
}
