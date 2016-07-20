# ArrayObjectArray [![Build Status](https://travis-ci.org/sikofitt/array-object-array.svg?branch=master)](https://travis-ci.org/sikofitt/array-object-array)

This is an incredibly simple class extension of `\ArrayObject` to provide
array functions use the magic `__call` method.  I no longer like writing this
with every project I want to use it in.

Original was from this great bloke.  https://secure.php.net/manual/en/class.arrayobject.php#107079
## Install

`composer require sikofitt/array-object-array`

## Usage
```php
$arrObj = new Sikofitt\Utility\ArrayObjectArray($myarray);
```
then use it with any array_* function.
```php
$arrObj->array_keys();
$arrObj->array_values();
$arrObj->array_map(function($arr) { return array_keys($arr); });
```
use the normal `\ArrayObject` methods
```php
$arrObj->exchangeArray($myNewArray);
```
## License
MIT

## Todo
Finish writing the rest of the tests for array_* functions
