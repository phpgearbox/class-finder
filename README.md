> Looking for maintainers, I no longer do much if any PHP dev, I have moved on, mostly work in dotnet core, node.js & golang these days. If anyone is keen to take over these projects, get in touch - brad@bjc.id.au

# Class Finder, like Symfony\\Finder but for classes.
[![Build Status](https://travis-ci.org/phpgearbox/class-finder.svg?branch=master)](https://travis-ci.org/phpgearbox/class-finder)
[![Latest Stable Version](https://poser.pugx.org/gears/class-finder/v/stable.svg)](https://packagist.org/packages/gears/class-finder)
[![Total Downloads](https://poser.pugx.org/gears/class-finder/downloads.svg)](https://packagist.org/packages/gears/class-finder)
[![License](https://poser.pugx.org/gears/class-finder/license.svg)](https://packagist.org/packages/gears/class-finder)
[![Coverage Status](https://coveralls.io/repos/github/phpgearbox/class-finder/badge.svg?branch=master)](https://coveralls.io/github/phpgearbox/class-finder?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/phpgearbox/class-finder/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phpgearbox/class-finder/?branch=master)

Utility class to help you discover other classes / namespaces based on the composer auto loader.

## How to Install
Installation via composer is easy:

```
composer require gears/class-finder
```

## Examples

```php
// Make sure you grab the composer ClassLoader instance, the class finder needs it.
$composer = require('vendor/autoload.php');

// Create a new finder. You may reuse this as much as you like.
// Right now caching is not performed but could be in the future.
$finder = new Gears\ClassFinder($composer);

// Find all classes inside a namespace
$classes = $finder->namespace('Foo\\Bar')->search();

// Returns an array like:
$classes =
[
    '/home/user/project/vendor/foo/src/Bar/Baz.php' => 'Foo\\Bar\\Baz',
    '/home/user/project/vendor/foo/src/Bar/Qux.php' => 'Foo\\Bar\\Qux',
    'etc...'
];

// Find all classes inside a namespace that implement an interface.
$classes = $finder->namespace('Foo\\Bar')->implements('SomeInterface')->search();

// OR you can use the PHP 5.5 ::class operator
$classes = $finder->namespace('Foo\\Bar')->implements(SomeInterface::class)->search();

// Or filter by parent classes
$classes = $finder->namespace('Foo\\Bar')->extends(SomeParent::class)->search();

// NOTE: You can't do both out of the box.
$classes = $finder->namespace('Foo\\Bar')

// This is now allowed!
->implements(SomeInterface::class)
->extends(SomeParent::class)

->search();

// Although you could supply your own custom filter that implemented whatever filtering you like.
$classes = $finder->namespace('Foo\\Bar')->filterBy(function($rClass ReflectionClass)
{
    
    /* custom logic goes here, must return true or false */
    
})->search();

// ClassFinder also implements the IteratorAggregate & Countable interfaces.
$number = $finder->namespace('Foo\\Bar')->count();

foreach ($finder->namespace('Foo\\Bar') as $filepath => $fqcn)
{
    
}
```

--------------------------------------------------------------------------------
Developed by Brad Jones - brad@bjc.id.au
