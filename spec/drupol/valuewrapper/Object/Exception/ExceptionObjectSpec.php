<?php

declare(strict_types = 1);

namespace spec\drupol\valuewrapper\Object\Exception;

use drupol\valuewrapper\Object\Exception\ExceptionObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;

class ExceptionObjectSpec extends ObjectBehavior
{
    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('64db763e0e0c418e20d520122e41283cd5905f64');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:9:"Exception";}}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:9:"Exception";}}');

        $exception = ValueWrapper::create(new \Exception('Hello world!', 404));

        $this
            ->equals($exception)
            ->shouldReturn(true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExceptionObject::class);
    }

    public function let()
    {
        $exception = new \Exception('Hello world!', 404);

        $this->beConstructedWith($exception);
    }
}
