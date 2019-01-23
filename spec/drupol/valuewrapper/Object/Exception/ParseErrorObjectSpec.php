<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Object\Exception;

use drupol\valuewrapper\Object\Exception\ParseErrorObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;

class ParseErrorObjectSpec extends ObjectBehavior
{
    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('d37e90788469afdb95342e9f36f90057298b4e43');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:10:"ParseError";}}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:10:"ParseError";}}');

        $exception = ValueWrapper::create(new \ParseError('Hello world!', 404));

        $this
            ->equals($exception)
            ->shouldReturn(true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ParseErrorObject::class);
    }

    public function let()
    {
        $exception = new \ParseError('Hello world!', 404);

        $this->beConstructedWith($exception);
    }
}
