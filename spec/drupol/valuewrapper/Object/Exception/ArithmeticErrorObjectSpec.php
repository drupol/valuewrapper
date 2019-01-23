<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Object\Exception;

use drupol\valuewrapper\Object\Exception\ArithmeticErrorObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;

class ArithmeticErrorObjectSpec extends ObjectBehavior
{
    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('85f4f23802453bc213d13d03c34a0cbd2ce82989');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:15:"ArithmeticError";}}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:15:"ArithmeticError";}}');

        $exception = ValueWrapper::create(new \ArithmeticError('Hello world!', 404));

        $this
            ->equals($exception)
            ->shouldReturn(true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ArithmeticErrorObject::class);
    }

    public function let()
    {
        $exception = new \ArithmeticError('Hello world!', 404);

        $this->beConstructedWith($exception);
    }
}
