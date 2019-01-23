<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Object\Exception;

use drupol\valuewrapper\Object\Exception\ErrorObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;

class ErrorObjectSpec extends ObjectBehavior
{
    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('e37fd6235d44e693e85a78a1d90625e3ade83e8d');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:5:"Error";}}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:5:"Error";}}');

        $exception = ValueWrapper::create(new \Error('Hello world!', 404));

        $this
            ->equals($exception)
            ->shouldReturn(true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ErrorObject::class);
    }

    public function let()
    {
        $exception = new \Error('Hello world!', 404);

        $this->beConstructedWith($exception);
    }
}
