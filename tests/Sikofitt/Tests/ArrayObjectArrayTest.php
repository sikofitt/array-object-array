<?php
/**
 * This file is part of ArrayObjectArray.
 *
 * @file ArrayObjectArrayTest.php
 *
 * R. Eric Wheeler <reric@ee.stanford.edu>
 *
 * 7/19/16 / 1:58 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sikofitt\Tests;


use Sikofitt\Utility\ArrayObjectArray;

/**
 * Class ArrayObjectArrayTest
 *
 * @package Sikofitt\Tests
 */
class ArrayObjectArrayTest extends \PHPUnit_Framework_TestCase {

  private $arrayObjectArray;
  private $workingArray;

  public function setUp() {
    $this->workingArray = array(
      'this' => 'that',
      'that' => 'this',
      'what' => 'who',
      'check' => 'out',
    );
    $this->arrayObjectArray = new ArrayObjectArray($this->workingArray);

  }

  /**
   * @coversDefaultClass
   */
  public function testArrayObjectArrayInstance() {
    $this->assertInstanceOf(ArrayObjectArray::class, $this->arrayObjectArray);
    $this->assertInstanceOf(\ArrayObject::class, $this->arrayObjectArray);
  }

  public function testArrayKeys()
  {
    $this->assertEquals(array_keys($this->workingArray), $this->arrayObjectArray->array_keys());
    $this->assertEquals(array_values($this->workingArray), $this->arrayObjectArray->array_values());

    $this->assertEquals($this->workingArray, $this->arrayObjectArray->getArrayCopy());
    $this->assertCount(4, $this->arrayObjectArray);

    $this->arrayObjectArray->offsetUnset('this');
    $this->assertCount(3, $this->arrayObjectArray);

    $this->arrayObjectArray->append(['this' => 'that']);
    $this->assertCount(4, $this->arrayObjectArray);
  }
  /**
   * @expectedException \BadMethodCallException
   */
  public function testException()
  {
    $this->arrayObjectArray->error();
  }

}
