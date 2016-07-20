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
        switch ($function) {
            case 'array_key_exists':
                return call_user_func(
                    $function,
                    $argv[0],
                    $this->getArrayCopy()
                );
            case 'array_map':
                $callback = $argv[0];
                array_shift($argv);

                return call_user_func_array('array_map', array_merge(array($callback), array($this->getArrayCopy()), $argv));
            default:
                return call_user_func_array(
                    $function,
                    array_merge(array($this->getArrayCopy()), $argv)
                );
                break;
        }
    }

    /**
     * Pass through function for array_fill.
     *
     * Fills an array with num entries of the value of the value parameter,
     * keys starting at the startIndex parameter.
     *
     * We don't need to do anything here because this
     * doesn't actually touch our array.  Just returns one.
     *
     * @param int   $startIndex
     * @param int   $num
     * @param mixed $value
     *
     * @return array
     *   Indexed array full of $value, starting at $startIndex
     *   with $num entries.
     */
    public function array_fill($startIndex, $num, $value)
    {
        return \array_fill($startIndex, $num, $value);
    }
}
