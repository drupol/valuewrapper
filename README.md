[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/valuewrapper.svg?style=flat-square)](https://packagist.org/packages/drupol/valuewrapper)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/valuewrapper.svg?style=flat-square)](https://packagist.org/packages/drupol/valuewrapper)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/valuewrapper.svg?style=flat-square)](https://packagist.org/packages/drupol/valuewrapper)
 [![GitHub Workflow Status](https://img.shields.io/github/workflow/status/drupol/valuewrapper/Continuous%20Integration?style=flat-square)](https://github.com/drupol/valuewrapper/actions)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/drupol/valuewrapper/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/valuewrapper/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/drupol/valuewrapper/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/valuewrapper/?branch=master)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/drupol/valuewrapper/master)](https://stryker-mutator.github.io)
 [![License](https://img.shields.io/packagist/l/drupol/valuewrapper.svg?style=flat-square)](https://packagist.org/packages/drupol/valuewrapper)
 [![Say Thanks!](https://img.shields.io/badge/Say-thanks-brightgreen.svg?style=flat-square)](https://saythanks.io/to/drupol)
 [![Donate!](https://img.shields.io/badge/Donate-Paypal-brightgreen.svg?style=flat-square)](https://paypal.me/drupol)
 
# ValueWrapper

## Description

This library allows you to wrap PHP variable in a strict typed PHP object.

## Documentation

TODO.

## Requirements

* PHP >= 7.1

## Installation

```composer require drupol/valuewrapper```

## Usage

```php
$string = 'Hello world!';
$value = ValueWrapper::create($string); // This creates a StringType object.

$integer = 123;
$value = ValueWrapper::create($integer); // This creates an IntegerType object.

$closure = function (string $who) {return 'Hello ' . $who;};
$value = ValueWrapper::create($closure); // This creates a ClosureObject object.

$value('world'); // Return 'Hello world'.
$value->hash(); // Return '513c4a7d0c1e07fa75e40c842880c82cffa69c5d'.

$anotherClosure = function () {return 'Hello world';};
$anotherValue = ValueWrapper::create($anotherClosure);
$value->equals($anotherValue); // Return false.

$sameClosure = function (string $who) {return 'Hello ' . $who;};
$sameValue = ValueWrapper::create($sameClosure);
$value->equals($sameValue); // Return true.
```

## Code quality and tests

Every time changes are introduced into the library, [Github](https://github.com/drupol/valuewrapper/actions) run the tests.

The library has tests written with [PHPSpec](http://www.phpspec.net/).

Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

[PHPInfection](https://github.com/infection/infection) is used to ensure that your code is properly tested, run `composer infection` to test your code.

## Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
