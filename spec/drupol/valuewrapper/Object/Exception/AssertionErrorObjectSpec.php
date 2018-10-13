<?php

namespace spec\drupol\valuewrapper\Object\Exception;

use drupol\valuewrapper\Object\Exception\AssertionErrorObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AssertionErrorObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $exception = new \AssertionError('Hello world!', 404);

        $this->beConstructedWith($exception);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AssertionErrorObject::class);
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('f1eac7981fd984aeb26ec608e57cb3f6b57b3c56');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:14:"AssertionError";}}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";a:3:{s:7:"message";s:12:"Hello world!";s:4:"code";i:404;s:5:"class";s:14:"AssertionError";}}');

        $exception = ValueWrapper::create(new \AssertionError('Hello world!', 404));

        $this
            ->equals($exception)
            ->shouldReturn(true);
    }
}
