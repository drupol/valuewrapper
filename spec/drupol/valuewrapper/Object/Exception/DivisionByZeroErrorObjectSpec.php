<?php

namespace spec\drupol\valuewrapper\Object\Exception;

use drupol\valuewrapper\Object\Exception\DivisionByZeroErrorObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DivisionByZeroErrorObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $exception = new \DivisionByZeroError('Hello world!', 404);

        $this->beConstructedWith($exception);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DivisionByZeroErrorObject::class);
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('7604d5dec752864249dbe3271badf23cd56d17e0');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:19:"DivisionByZeroError";}}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:19:"DivisionByZeroError";}}');

        $exception = ValueWrapper::create(new \DivisionByZeroError('Hello world!', 404));

        $this
            ->equals($exception)
            ->shouldReturn(true);
    }
}
