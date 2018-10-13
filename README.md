[![Latest Stable Version](https://poser.pugx.org/drupol/valuewrapper/v/stable)](https://packagist.org/packages/drupol/valuewrapper)
 [![Total Downloads](https://poser.pugx.org/drupol/valuewrapper/downloads)](https://packagist.org/packages/drupol/valuewrapper)
 [![Build Status](https://travis-ci.org/drupol/valuewrapper.svg?branch=master)](https://travis-ci.org/drupol/valuewrapper)
 [![Build status](https://ci.appveyor.com/api/projects/status/grvr1tfq9uoth0rg?svg=true)](https://ci.appveyor.com/project/drupol/valuewrapper)
 [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/drupol/valuewrapper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/drupol/valuewrapper/?branch=master)
 [![Code Coverage](https://scrutinizer-ci.com/g/drupol/valuewrapper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/drupol/valuewrapper/?branch=master)
 [![Codacy Badge](https://api.codacy.com/project/badge/Grade/c6d73735f2c34df5a5dfc30129493337)](https://www.codacy.com/app/drupol/valuewrapper)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/drupol/valuewrapper/master)](https://stryker-mutator.github.io)
 [![License](https://poser.pugx.org/drupol/valuewrapper/license)](https://packagist.org/packages/drupol/valuewrapper)

# ValueWrapper

## Description

This simple library allows you to wrap any kind of PHP variable in a strict typed PHP object.

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

Every time changes are introduced into the library, [Travis CI](https://travis-ci.org/drupol/valuewrapper/builds) run the tests and the benchmarks.

The library has tests written with [PHPSpec](http://www.phpspec.net/).
Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

[PHPInfection](https://github.com/infection/infection) is used to ensure that your code is properly tested, run `composer infection` to test your code.

## Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
