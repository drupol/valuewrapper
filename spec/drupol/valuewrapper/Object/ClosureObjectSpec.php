<?php

declare(strict_types=1);

namespace spec\drupol\valuewrapper\Object;

use drupol\valuewrapper\Object\ClosureObject;
use drupol\valuewrapper\ValueWrapper;
use PhpSpec\ObjectBehavior;

class ClosureObjectSpec extends ObjectBehavior
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

    public function it_can_be_invoked()
    {
        $this
            ->__call('__invoke', ['world'])
            ->shouldReturn('hello world');
    }

    public function it_can_equals()
    {
        $closure = ValueWrapper::create(static function (string $who) {
            return 'hello ' . $who;
        });

        $this
            ->equals($closure)
            ->shouldReturn(true);

        $closure = ValueWrapper::create(static function (string $foo) {
            return 'hello ' . $foo;
        });

        $this
            ->equals($closure)
            ->shouldReturn(false);
    }

    public function it_can_get_its_class()
    {
        $this
            ->class()
            ->shouldReturn('Closure');
    }

    public function it_can_hash()
    {
        $this
            ->hash()
            ->shouldReturn('320351397f326bfd0ef9b03eabd1ed45425deed5');
    }

    public function it_can_serialize()
    {
        $this
            ->serialize()
            ->shouldReturn('a:1:{s:5:"value";s:344:"QzozMjoiU3VwZXJDbG9zdXJlXFNlcmlhbGl6YWJsZUNsb3N1cmUiOjIxMDp7YTo1OntzOjQ6ImNvZGUiO3M6NjE6InN0YXRpYyBmdW5jdGlvbiAoc3RyaW5nICR3aG8pIHsKICAgIHJldHVybiAnaGVsbG8gJyAuICR3aG87Cn0iO3M6NzoiY29udGV4dCI7YTowOnt9czo3OiJiaW5kaW5nIjtOO3M6NToic2NvcGUiO3M6NDk6InNwZWNcZHJ1cG9sXHZhbHVld3JhcHBlclxPYmplY3RcQ2xvc3VyZU9iamVjdFNwZWMiO3M6ODoiaXNTdGF0aWMiO2I6MTt9fQ==";}');
    }

    public function it_can_unserialize()
    {
        $this
            ->unserialize('a:1:{s:5:"value";s:332:"QzozMjoiU3VwZXJDbG9zdXJlXFNlcmlhbGl6YWJsZUNsb3N1cmUiOjIwMzp7YTo1OntzOjQ6ImNvZGUiO3M6NTQ6ImZ1bmN0aW9uIChzdHJpbmcgJHdobykgewogICAgcmV0dXJuICdoZWxsbyAnIC4gJHdobzsKfSI7czo3OiJjb250ZXh0IjthOjA6e31zOjc6ImJpbmRpbmciO047czo1OiJzY29wZSI7czo0OToic3BlY1xkcnVwb2xcdmFsdWV3cmFwcGVyXE9iamVjdFxDbG9zdXJlT2JqZWN0U3BlYyI7czo4OiJpc1N0YXRpYyI7YjowO319";}');

        $this('closure')
            ->shouldReturn('hello closure');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ClosureObject::class);
    }

    public function let()
    {
        $closure = static function (string $who) {
            return 'hello ' . $who;
        };

        $this->beConstructedWith($closure);
    }
}
