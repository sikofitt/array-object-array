<?php

    /*
     * This file is part of ArrayObjectArray.
     *
     * (copyleft) R. Eric Wheeler <sikofitt@gmail.com>
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace Sikofitt\Tests;

    use Sikofitt\Utility\ArrayObjectArray;

    /**
     * Class ArrayObjectArrayTest
     *
     * @covers  \Sikofitt\Utility\ArrayObjectArray
     * @package Sikofitt\Tests
     *
     * @test
     *
     * array_change_key_case    — Changes the case of all keys in an array
     * array_chunk              — Split an array into chunks
     * array_column             — Return the values from a single column in the
     *                            input array
     * array_combine            — Creates an array by using one array for keys
     * and another for its values array_count_values       — Counts all the
     * values of an array array_diff_assoc         — Computes the difference of
     * arrays with additional index check array_diff_key           — Computes
     * the difference of arrays using keys for comparison array_diff_uassoc
     *    — Computes the difference of arrays with additional index check which
     *    is performed by a user supplied callback function. array_diff_ukey
     *          — Computes the difference of arrays using a callback function
     *          on the keys for comparison array_diff               — Computes
     *          the difference of arrays array_fill_keys          — Fill an
     *          array with values, specifying keys array_fill               — Fill an array with values array_filter             — Filters elements of an array using a callback function array_flip               — Exchanges all keys with their associated values in an array array_intersect_assoc    — Computes the intersection of arrays with additional index check array_intersect_key      — Computes the intersection of arrays using keys for comparison array_intersect_uassoc   — Computes the intersection of arrays with additional index check, compares indexes by a callback function array_intersect_ukey     — Computes the intersection of arrays using a callback function on the keys for comparison array_intersect          — Computes the intersection of arrays array_key_exists         — Checks if the given key or index exists in the array array_keys               — Return all the keys or a subset of the keys of an array array_map                — Applies the callback to the elements of the given arrays array_merge_recursive    — Merge two or more arrays recursively array_merge              — Merge one or more arrays array_multisort          — Sort multiple or multi-dimensional arrays array_pad                — Pad array to the specified length with a value array_pop                — Pop the element off the end of array array_product            — Calculate the product of values in an array array_push               — Push one or more elements onto the end of array array_rand               — Pick one or more random entries out of an array array_reduce             — Iteratively reduce the array to a single value using a callback function array_replace_recursive  — Replaces elements from passed arrays into the first array recursively array_replace            — Replaces elements from passed arrays into the first array array_reverse            — Return an array with elements in reverse order array_search             — Searches the array for a given value and returns the corresponding key if successful array_shift              — Shift an element off the beginning of array array_slice              — Extract a slice of the array array_splice             — Remove a portion of the array and replace it with something else array_sum                — Calculate the sum of values in an array array_udiff_assoc        — Computes the difference of arrays with additional index check, compares data by a callback function array_udiff_uassoc       — Computes the difference of arrays with additional index check, compares data and indexes by a callback function array_udiff              — Computes the difference of arrays by using a callback function for data comparison a rray_uintersect_assoc    — Computes the intersection of arrays with additional index check, compares data by a callback function array_uintersect_uassoc  — Computes the intersection of arrays with additional index check, compares data and indexes by separate callback functions array_uintersect         — Computes the intersection of arrays, compares data by a callback function array_unique             — Removes duplicate values from an array array_unshift            — Prepend one or more elements to the beginning of an array array_values             — Return all the values of an array array_walk_recursive     — Apply a user function recursively to every member of an array array_walk               — Apply a user supplied function to every member of an array
     *
     * Non array_* prefixed functions
     *
     * arsort                   — Sort an array in reverse order and maintain
     * index association current                  — Return the current element
     * in an array
     ** each                     — Return the current key and value pair from an array and advance the array cursor
     * end                     — Set the internal pointer of an array to its
     * last element in_array                — Checks if a value exists in an
     * array key_exists              — Alias of array_key_exists key
     *          — Fetch a key from an array krsort                  — Sort an
     *          array by key in reverse order next                    — Advance
     *          the internal array pointer of an array pos
     *          — Alias of current prev                    — Rewind the
     *          internal array pointer reset                   — Set the
     *          internal pointer of an array to its first element rsort
     *                    — Sort an array in reverse order shuffle
     *                       — Shuffle an array sizeof                  — Alias of count sort                    — Sort an array usort                   — Sort an array by values using a user-defined comparison function
     */
    class ArrayObjectArrayTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @var ArrayObjectArray
         *   default ArrayObjectArray class to work with
         */
        private $arrayObjectArray;

        /**
         * @var array
         *   default Array to work with
         */
        private $workingArray;

        /**
         * @var array
         *   multi-dimensional array to work with
         */
        private $workingMultiArray;

        /**
         * @var ArrayObjectArray
         *   multi-dimensional ArrayObjectArray to work with
         */
        private $arrayObjectArrayMulti;

        /**
         * @var array
         *   Single array to work with
         */
        private $singleArrayOne;

        /**
         * @var array
         *   Second single array to work with
         */
        private $singleArrayTwo;

        /**
         * @var ArrayObjectArray
         *   Single ArrayObjectArray class to work with
         */
        private $arrayObjectSingle;

        /**
         * @codeCoverageIgnore
         */
        public function setUp()
        {
            $this->workingArray = array(
                'this'  => 'THAT',
                'that'  => 'this',
                'WHAT'  => 'who',
                'check' => 'out',
            );
            $this->workingMultiArray = array(
                array(
                    'id'         => 2135,
                    'first_name' => 'John',
                    'last_name'  => 'Doe',
                ),
                array(
                    'id'         => 3245,
                    'first_name' => 'Sally',
                    'last_name'  => 'Smith',
                ),
                array(
                    'id'         => 5342,
                    'first_name' => 'Jane',
                    'last_name'  => 'Jones',
                ),
                array(
                    'id'         => 5623,
                    'first_name' => 'Peter',
                    'last_name'  => 'Doe',
                ),
            );
            $this->singleArrayOne = array('green', 'red', 'yellow');
            $this->singleArrayTwo = array('avocado', 'apple', 'banana');

            $this->arrayObjectArray = new ArrayObjectArray($this->workingArray);
            $this->arrayObjectArrayMulti = new ArrayObjectArray($this->workingMultiArray);
            $this->arrayObjectSingle = new ArrayObjectArray($this->singleArrayOne);
        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::__construct
         */
        public function testObjectArrayIsExtended()
        {
            $this->assertInstanceOf('Sikofitt\Utility\ArrayObjectArray', $this->arrayObjectArray);
            $this->assertInstanceOf('\ArrayObject', $this->arrayObjectArray);

            $this->assertSame($this->workingArray, $this->arrayObjectArray->getArrayCopy());
            $this->assertCount(4, $this->arrayObjectArray);

            $this->arrayObjectArray->offsetUnset('this');
            $this->assertCount(3, $this->arrayObjectArray);

            $this->arrayObjectArray->append(array('this' => 'that'));
            $this->assertCount(4, $this->arrayObjectArray);
        }

        /**
         * @codeCoverageIgnore
         */
        public function resetWorkingArray()
        {
            $this->workingArray = array(
                'this'  => 'THAT',
                'that'  => 'this',
                'WHAT'  => 'who',
                'check' => 'out',
            );
            $this->workingMultiArray = array(
                array(
                    'id'         => 2135,
                    'first_name' => 'John',
                    'last_name'  => 'Doe',
                ),
                array(
                    'id'         => 3245,
                    'first_name' => 'Sally',
                    'last_name'  => 'Smith',
                ),
                array(
                    'id'         => 5342,
                    'first_name' => 'Jane',
                    'last_name'  => 'Jones',
                ),
                array(
                    'id'         => 5623,
                    'first_name' => 'Peter',
                    'last_name'  => 'Doe',
                ),
            );
            $this->singleArrayOne = array('green', 'red', 'yellow');

            $this->arrayObjectArray->exchangeArray($this->workingArray);
            $this->arrayObjectArrayMulti->exchangeArray($this->workingMultiArray);
            $this->arrayObjectSingle->exchangeArray($this->singleArrayOne);
        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::__call
         * @covers Sikofitt\Utility\ArrayObjectArray::array_fill
         */
        public function testArrayFunctions()
        {
            $key_comp_function = function ($a, $b)
            {

                if ($a === $b)
                {
                    return 0;
                }

                return ($a > $b) ? 1 : -1;
            };
            $array_filter = function ($a)
            {
                return $a & 1;
            };
            // array_change_key_case
            $this->assertSame(array_change_key_case($this->workingArray, CASE_UPPER), $this->arrayObjectArray->array_change_key_case(CASE_UPPER));
            $this->assertSame(array_change_key_case($this->workingArray, CASE_LOWER), $this->arrayObjectArray->array_change_key_case(CASE_LOWER));
            // array_chunk
            $this->assertSame(array_chunk($this->workingArray, 2), $this->arrayObjectArray->array_chunk(2));
            $this->assertSame(array_chunk($this->workingArray, 2, true), $this->arrayObjectArray->array_chunk(2, true));
            // array_column
            //if (PHP_VERSION_ID >= 50500) {
            $this->assertSame(array_column($this->workingMultiArray, 'first_name'), $this->arrayObjectArrayMulti->array_column('first_name'));
            $this->assertSame(array_column($this->workingMultiArray, 'first_name', 'id'), $this->arrayObjectArrayMulti->array_column('first_name', 'id'));
            //}
            // array_combine
            $this->assertSame(array_combine($this->singleArrayOne, $this->singleArrayTwo), $this->arrayObjectSingle->array_combine($this->singleArrayTwo));
            // array_count_values
            $this->assertSame(array_count_values($this->workingArray), $this->arrayObjectArray->array_count_values());
            // array_diff_assoc
            $this->assertSame(array_diff_assoc($this->workingMultiArray, $this->workingArray), $this->arrayObjectArrayMulti->array_diff_assoc($this->workingArray));
            // array_diff_key
            $this->assertSame(array_diff_key($this->workingArray, array_flip($this->workingArray)), $this->arrayObjectArray->array_diff_key(array_flip($this->workingArray)));
            // array_diff_uassoc
            $this->assertSame(array_diff_uassoc($this->workingMultiArray, $this->workingArray, $key_comp_function), $this->arrayObjectArrayMulti->array_diff_uassoc($this->workingArray, $key_comp_function));
            // array_diff_ukey
            $this->assertSame(array_diff_ukey($this->workingMultiArray, $this->workingArray, $key_comp_function), $this->arrayObjectArrayMulti->array_diff_ukey($this->workingArray, $key_comp_function));
            // array_diff
            $this->assertSame(array_diff($this->singleArrayOne, $this->workingArray), $this->arrayObjectSingle->array_diff($this->workingArray));
            //  array_fill_keys
            $this->assertSame(array_fill_keys($this->singleArrayOne, 'banana'), $this->arrayObjectSingle->array_fill_keys('banana'));
            // array_fill
            $this->assertSame(array_fill(5, 6, 'banana'), $this->arrayObjectArray->array_fill(5, 6, 'banana'));
            // array_filter
            $this->assertSame(array_filter($this->workingMultiArray), $this->arrayObjectArrayMulti->array_filter());
            $this->assertSame(array_filter($this->workingMultiArray, $array_filter), $this->arrayObjectArrayMulti->array_filter($array_filter));

            // The third parameter for array_filter was added in php 5.6 and does
            // not exist in hhvm
            if (PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION'))
            {
                $this->assertSame(array_filter($this->workingMultiArray, $array_filter, ARRAY_FILTER_USE_BOTH), $this->arrayObjectArrayMulti->array_filter($array_filter, ARRAY_FILTER_USE_BOTH));
                $this->assertSame(array_filter($this->workingMultiArray, $array_filter, ARRAY_FILTER_USE_KEY), $this->arrayObjectArrayMulti->array_filter($array_filter, ARRAY_FILTER_USE_KEY));
            }
            // array_flip
            $this->assertSame(array_flip($this->workingArray), $this->arrayObjectArray->array_flip());
            $this->assertSame(array_flip($this->singleArrayOne), $this->arrayObjectSingle->array_flip());
            $this->assertNotSame(array_flip($this->singleArrayTwo), $this->arrayObjectSingle->array_flip());
            // array_intersect_assoc
            $this->assertSame(array_intersect_assoc($this->workingArray, $this->singleArrayOne), $this->arrayObjectArray->array_intersect_assoc($this->singleArrayOne));
            // array_intersect_key
            $this->assertSame(array_intersect_key($this->workingArray, $this->singleArrayOne), $this->arrayObjectArray->array_intersect_key($this->singleArrayOne));
            // array_intersect_uassoc
            $this->assertSame(array_intersect_uassoc($this->workingArray, $this->singleArrayOne, 'strcasecmp'), $this->arrayObjectArray->array_intersect_uassoc($this->singleArrayOne, 'strcasecmp'));
            // array_intersect_ukey
            $this->assertSame(array_intersect_ukey($this->workingArray, $this->singleArrayOne, $key_comp_function), $this->arrayObjectArray->array_intersect_ukey($this->singleArrayOne, $key_comp_function));
            // array_intersect
            $this->assertSame(array_intersect($this->workingArray, $this->singleArrayOne), $this->arrayObjectArray->array_intersect($this->singleArrayOne));
            // array_key_exists
            $this->assertSame(array_key_exists('this', $this->workingArray), $this->arrayObjectArray->array_key_exists('this'));
            $this->assertFalse($this->arrayObjectArray->array_key_exists('banana'));
            // array_keys
            $this->assertSame(array_keys($this->workingArray), $this->arrayObjectArray->array_keys());
            $this->assertSame(array_keys($this->workingArray, 'this'), $this->arrayObjectArray->array_keys('this'));
            $this->assertSame(array_keys($this->workingArray, 'this', true), $this->arrayObjectArray->array_keys('this', true));
            $this->assertSame(array(), $this->arrayObjectArray->array_keys('banana'));

            // array_values
            $this->assertSame(array_values($this->workingArray), $this->arrayObjectArray->array_values());
            // array_merge_recursive
            $this->assertSame(array_merge_recursive($this->workingArray, $this->workingMultiArray), $this->arrayObjectArray->array_merge_recursive($this->workingMultiArray));
            $this->assertSame(array_merge_recursive($this->workingArray, $this->workingMultiArray, $this->singleArrayTwo), $this->arrayObjectArray->array_merge_recursive($this->workingMultiArray, $this->singleArrayTwo));
            // array_merge
            $this->assertSame(array_merge($this->workingArray, $this->workingMultiArray), $this->arrayObjectArray->array_merge($this->workingMultiArray));
            $this->assertSame(array_merge($this->workingArray, $this->workingMultiArray, $this->singleArrayTwo), $this->arrayObjectArray->array_merge($this->workingMultiArray, $this->singleArrayTwo));
            $this->assertSame(array_merge($this->workingArray, (array) 'start'), $this->arrayObjectArray->array_merge((array) 'start'));

            // array_multisort
            $this->assertSame(array_multisort($this->singleArrayOne, $this->singleArrayTwo), $this->arrayObjectSingle->array_multisort($this->singleArrayTwo));
            // array_multisort complex
            /** @NOTE: For custom sorting on the array in ArrayObjectArray, just enter the flags. */
            $this->assertSame(
                array_multisort(
                    $this->singleArrayOne, SORT_ASC, SORT_STRING,
                    $this->singleArrayTwo, SORT_NUMERIC, SORT_DESC
                ),
                $this->arrayObjectSingle->array_multisort(
                    SORT_ASC, SORT_STRING,
                    $this->singleArrayTwo, SORT_NUMERIC, SORT_DESC
                )
            );
            // array_​pad

            $this->assertSame(array_pad($this->workingArray, 6, 'hello'), $this->arrayObjectArray->array_pad(6, 'hello'));
            // array_​pop
            // array_​product
            // array_​push
            // array_​rand
            // array_​reduce
            // array_​replace_​recursive
            // array_​replace
            // array_​reverse
            // array_​search
            // array_​shift
            // array_​slice
            // array_​splice
            // array_​sum
            // array_​udiff_​assoc
            // array_​udiff_​uassoc
            // array_​udiff
            // array_​uintersect_​assoc
            // array_​uintersect_​uassoc
            // array_​uintersect
            // array_​unique
            // array_​unshift
            // array_​values
            // array_​walk_​recursive
            // array_​walk
        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::arsort
         */
        public function testArsort()
        {
            $data = $this->arrayObjectArrayData();

            $arrayObjectArray = new ArrayObjectArray($data['numeric']);
            arsort($data['numeric']);
            $this->assertTrue($arrayObjectArray->arsort());
            $this->assertSame($data['numeric'], $arrayObjectArray->getArrayCopy());
            $data = null;
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray->exchangeArray($data['numeric']);
            arsort($data['numeric'], SORT_STRING);
            $this->assertTrue($arrayObjectArray->arsort(SORT_STRING));
            $this->assertSame($data['numeric'], $arrayObjectArray->getArrayCopy());
            $data = null;
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray->exchangeArray($data['alpha']);
            arsort($data['alpha'], SORT_NUMERIC);
            $this->assertTrue($arrayObjectArray->arsort(SORT_NUMERIC));
            $this->assertSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            $data = null;
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray->exchangeArray($data['multi']);
            arsort($data['multi'], SORT_FLAG_CASE | SORT_NATURAL);
            $this->assertTrue($arrayObjectArray->arsort(SORT_FLAG_CASE | SORT_NATURAL));
            $this->assertSame($data['multi'], $arrayObjectArray->getArrayCopy());
            $arrayObjectArray->exchangeArray(array('string'));
            $this->assertFalse($arrayObjectArray->arsort('string'));
        }

        public function arrayObjectArrayData()
        {
            return array(
                'numeric' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0),
                'alpha'   => array(
                    'one',
                    'two',
                    'three',
                    'four',
                    'five',
                    'six',
                    'seven',
                    'eight',
                    'nine',
                    'zero',
                ),
                'multi'   => array(
                    'one'   => 'two',
                    'two'   => 'three',
                    'three' => 'four',
                    'four'  => 'five',
                    'five'  => 'six',
                    'six'   => 'seven',
                    'seven' => 'eight',
                    'eight' => 'nine',
                    'nine'  => 'zero',
                ),
            );
        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::setIteratorClass
         */
        public function testSetIteratorClass()
        {
            $arrayObjectArray = new ArrayObjectArray(array());
            $this->assertSame($arrayObjectArray->getIteratorClass(), 'ArrayIterator');
            $arrayObjectArray->setIteratorClass('RecursiveArrayIterator');
            $this->assertSame($arrayObjectArray->getIteratorClass(), 'RecursiveArrayIterator');
        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::current
         * @covers Sikofitt\Utility\ArrayObjectArray::reset
         * @covers Sikofitt\Utility\ArrayObjectArray::next
         * @covers Sikofitt\Utility\ArrayObjectArray::valid
         * @covers Sikofitt\Utility\ArrayObjectArray::key
         * @covers Sikofitt\Utility\ArrayObjectArray::prev
         * @covers Sikofitt\Utility\ArrayObjectArray::pos
         */
        public function testArrayIterator()
        {
            $data = null;
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['alpha']);
            $arrayObjectArray->reset();
            $this->assertSame('one', $arrayObjectArray->current());
            $arrayObjectArray->next();
            $this->assertSame('two', $arrayObjectArray->current());
            $this->assertSame('two', $arrayObjectArray->pos());
            $arrayObjectArray->prev();
            $this->assertSame('one', $arrayObjectArray->pos());
            $arrayObjectArray->next();
            $this->assertSame(1, $arrayObjectArray->key());
            $arrayObjectArray->prev();
            $this->assertSame('one', $arrayObjectArray->current());
            $this->assertSame('one', $arrayObjectArray->pos());
            $this->assertSame(0, $arrayObjectArray->key());
            $this->assertTrue($arrayObjectArray->valid());
            $arrayObjectArray->end();
            $this->assertSame('zero', $arrayObjectArray->pos());
        }

        /**
         * @covers \Sikofitt\Utility\ArrayObjectArray::in_array
         */
        public function testInArray()
        {
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['multi']);
            $this->assertFalse($arrayObjectArray->in_array('one'));
            $this->assertTrue($arrayObjectArray->in_array('zero'));
            $this->assertSame(in_array('one', $data['multi'], true), $arrayObjectArray->in_array('one'));
            $arrayObjectArray->exchangeArray($data['numeric']);
            $this->assertFalse($arrayObjectArray->in_array('1', true, true));
            $this->assertTrue($arrayObjectArray->in_array('1'));
            $arrayObjectArray->sizeof();
        }

        /**
         * @covers \Sikofitt\Utility\ArrayObjectArray::shuffle
         */
        public function testShuffle()
        {
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['numeric']);
            $this->assertSame($data['numeric'], $arrayObjectArray->getArrayCopy());
            $arrayObjectArray->shuffle();
            $this->assertNotSame($data['numeric'], $arrayObjectArray->getArrayCopy());
        }

        public function testKrsort()
        {
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['alpha']);
            $this->assertSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            $arrayObjectArray->krsort();
            $this->assertNotSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            krsort($data['alpha']);
            $this->assertSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            $this->assertFalse($arrayObjectArray->krsort('string'));
        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::rsort
         */
        public function testRsort()
        {
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['alpha']);
            $this->assertSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            $arrayObjectArray->rsort();
            $this->assertNotSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            rsort($data['alpha']);
            $this->assertSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            $this->assertFalse($arrayObjectArray->rsort('string'));
        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::sort
         */
        public function testSort()
        {
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['alpha']);
            $this->assertSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            $arrayObjectArray->sort();
            $this->assertNotSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            sort($data['alpha']);
            $this->assertSame($data['alpha'], $arrayObjectArray->getArrayCopy());
            $this->assertFalse($arrayObjectArray->sort('string'));
        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::usort
         */
        public function testUsort()
        {
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['numeric']);
            $this->assertSame($data['numeric'], $arrayObjectArray->getArrayCopy());
            usort($data['numeric'], 'strcasecmp');
            $this->assertTrue($arrayObjectArray->usort('in_array'));
            $this->assertNotSame($data['numeric'], $arrayObjectArray->getArrayCopy());
            $this->assertTrue($arrayObjectArray->usort('strcasecmp'));
            $this->assertSame($data['numeric'], $arrayObjectArray->getArrayCopy());

        }

        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::usort
         * @expectedException \BadFunctionCallException
         */
        public function testUsortTypeError()
        {
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['numeric']);
            $arrayObjectArray->usort('none');
        }


        /**
         * @covers Sikofitt\Utility\ArrayObjectArray::each
         */
        public function testEach()
        {
            $data = $this->arrayObjectArrayData();
            $arrayObjectArray = new ArrayObjectArray($data['alpha']);

            $defaultEach = function() use ($data) {
                $returnArray = array();
                while(list($key, $value) = each($data['alpha']))
                {
                    $returnArray[] = sprintf("%s => %s", $key, $value);

                }
                return $returnArray;
            };
            $arrayObjectEach = function() use($arrayObjectArray) {
                $returnArray = array();
                while(list($key, $value) = $arrayObjectArray->each())
                {
                    $returnArray[] = sprintf("%s => %s", $key, $value);

                }
                return $returnArray;
            };

            $this->assertSame($defaultEach(), $arrayObjectEach());

        }

        /**
         * @covers \Sikofitt\Utility\ArrayObjectArray::__call
         * array_map
         */
        public function testArrayMap()
        {
            // array_map
            $cube = function ($n)
            {
                return ($n * $n * $n);
            };

            $timesTwo = function ($value)
            {
                return $value * 2;
            };
            $showSpanish = function ($digit, $spanishNum)
            {
                return ("The number $digit is called $spanishNum in Spanish");
            };

            $mapSpanish = function ($digit, $spanishNum)
            {
                return (array($digit => $spanishNum));
            };

            $callbackOne = function ($a)
            {
                return array($a);
            };

            $callbackTwo = function ($a, $b)
            {
                return array($a, $b);
            };

            $a = array(1, 2, 3, 4, 5);
            $b = array("uno", "dos", "tres", "cuatro", "cinco");
            $c = array("one", "two", "three", "four", "five");

            $arrayObjectArray = new ArrayObjectArray($a);

            $this->assertSame(array_map($cube, $a), $arrayObjectArray->array_map($cube));
            $arrayObjectArray->exchangeArray(range(1, 5));
            $this->assertSame(array_map($timesTwo, range(1, 5)), $arrayObjectArray->array_map($timesTwo));
            $arrayObjectArray->exchangeArray($a);
            $this->assertSame(array_map($showSpanish, $a, $b), $arrayObjectArray->array_map($showSpanish, $b));
            $this->assertSame(array_map($mapSpanish, $a, $b), $arrayObjectArray->array_map($mapSpanish, $b));
            $this->assertSame(array_map(null, $a, $b, $c), $arrayObjectArray->array_map(null, $b, $c));
            $arrayObjectArray->exchangeArray($this->workingArray);
            $this->assertSame(array_map($callbackOne, $this->workingArray), $arrayObjectArray->array_map($callbackOne));
            $this->assertSame(array_map($callbackTwo, $this->workingArray, $this->workingArray), $arrayObjectArray->array_map($callbackTwo, $this->workingArray));
            $this->assertSame(array_map(null, $this->workingArray), $arrayObjectArray->array_map(null));
            $this->assertSame(array_map(null, $this->workingArray, $this->workingArray), $arrayObjectArray->array_map(null, $this->workingArray));
        }

        /**
         * @expectedException \BadMethodCallException
         */
        public function testException()
        {
            $this->arrayObjectArray->error();
        }
    }
