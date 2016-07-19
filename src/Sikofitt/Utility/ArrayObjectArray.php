<?php

/*
 * This file is part of ArrayObjectArray.
 *
 * (copyleft) R. Eric Wheeler <sikofitt@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sikofitt\Utility;

/**
 * Class ArrayObjectArray
 *
 * Adds array functions to the ArrayObject class.
 * https://secure.php.net/manual/en/class.arrayobject.php#107079
 *
 * @package Sikofitt\Utility
 */
class ArrayObjectArray extends \ArrayObject
{
    /**
   * @param $function
   * @param $argv
   *
   * @return mixed
   */
  public function __call($function, $argv)
  {
      if (!is_callable($function) || substr($function, 0, 6) !== 'array_') {
          throw new \BadMethodCallException(__CLASS__ . '->' . $function);
      }

      return call_user_func_array(
          $function,
          array_merge(array($this->getArrayCopy()), $argv)
      );
  }
}
