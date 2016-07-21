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
use Guzzle\Common\Exception\BadMethodCallException;

/**
 * Class ArrayObjectArray
 *
 * @package Sikofitt\Utility
 */
class ArrayObjectArray extends \ArrayObject implements \IteratorAggregate
{
    /**
     * @var \ArrayIterator
     */
    private $iterator;

    /**
     * ArrayObjectArray constructor.
     *
     * @param null   $input
     * @param int    $flags
     * @param string $iterator_class
     */
    public function __construct(
        $input = null,
        $flags = 0,
        $iterator_class = 'ArrayIterator'
    ) {
        // SORT_FLAG_CASE and SORT_NATURAL were introduced in php 5.4
        if (!defined('SORT_FLAG_CASE')) { define('SORT_FLAG_CASE', 8); } elseif(!defined('SORT_NATURAL')) { define('SORT_NATURAL', 6); }
        // ARRAY_FILTER_USE_* flags were added in php 5.6
        // along with a 3rd parameter to use them.
        if (!defined('ARRAY_FILTER_USE_BOTH')) { define('ARRAY_FILTER_USE_BOTH', 1); } elseif (!defined('ARRAY_FILTER_USE_KEY')) { define('ARRAY_FILTER_USE_KEY', 2); }
        parent::__construct($input, $flags, $iterator_class);
        $this->iterator = $this->getIterator();
    }

    /**
     * @param string $iterator_class
     */
    public function setIteratorClass($iterator_class)
    {
        parent::setIteratorClass($iterator_class);
        $this->iterator = $this->getIterator();
    }

    /**
     *
     */
    public function pos()
    {
        return pos($this->iterator);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->iterator);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->iterator);
    }

    /**
     *
     */
    public function next()
    {
        next($this->iterator);
    }

    /**
     *
     */
    public function reset()
    {
        reset($this->iterator);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return $this->iterator->valid();
    }

    /**
     *
     */
    public function prev()
    {
        prev($this->iterator);
    }

    /**
     *
     */
    public function end()
    {
        end($this->iterator);
    }
    public function each()
    {
        static $arrayCopy;

        if(!$arrayCopy) {
            $arrayCopy = $this->getArrayCopy();
        }
        return each($arrayCopy);
    }
    /**
     * @param      $needle
     * @param bool $strict
     *
     * @return bool
     */
    public function in_array($needle, $strict = false)
    {
        return in_array($needle, $this->getArrayCopy(), $strict);
    }

    /**
     * @param $function
     * @param $argv
     *
     * @return mixed
     */
    public function __call($function, $argv)
    {
        if (0 !== strcasecmp($function, 'key_exists')) {
            if (!is_callable($function) || substr($function, 0, 6) !== 'array_') {
                throw new \BadMethodCallException(__CLASS__ . '->' . $function);
            }
        }
        switch ($function) {
            case 'array_key_exists':
            case 'key_exists':
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
     * @param int $startIndex
     * @param int $num
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

    /**
     * Alias of count
     *
     * @return int
     */
    public function sizeof()
    {
        return $this->count();
    }

    /**
     * @param null|int $sort_flags
     *
     * @return bool
     */
    public function krsort($sort_flags = null)
    {
        $arrayCopy = $this->getArrayCopy();
        if (@\krsort($arrayCopy, $sort_flags)) {
            $this->exchangeArray($arrayCopy);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param null|int $sort_flags
     *
     * @return bool
     */
    public function rsort($sort_flags = null)
    {
        $arrayCopy = $this->getArrayCopy();
        if(@\rsort($arrayCopy, $sort_flags))
        {
            $this->exchangeArray($arrayCopy);
            return true;
        } else {
            return false;
        }

    }

    /**
     * @param null|int $sort_flags
     *
     * @return bool
     */
    public function sort($sort_flags = null)
    {
        $arrayCopy = $this->getArrayCopy();
        if(@\sort($arrayCopy, $sort_flags))
        {
            $this->exchangeArray($arrayCopy);
            return true;
        } else {
            return false;
        }

    }

    public function usort($callback)
    {
        if(!is_callable($callback))
        {
            throw new \BadFunctionCallException($callback);
        }
        $arrayCopy = $this->getArrayCopy();
        if(true === $returnVal = @\usort($arrayCopy, $callback))
        {
            $this->exchangeArray($arrayCopy);
        }
        return $returnVal;
    }
    /**
     * @param int $sort_flags
     *
     * @return bool
     */
    public function arsort($sort_flags = SORT_REGULAR)
    {
        $arrayCopy = $this->getArrayCopy();
        if (@\arsort($arrayCopy, $sort_flags)) {
            $this->exchangeArray($arrayCopy);

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function shuffle()
    {
        $arrayCopy = $this->getArrayCopy();
        if (true === $returnVal = shuffle($arrayCopy)) {
            $this->exchangeArray($arrayCopy);
        }
        return $returnVal;
    }
}
