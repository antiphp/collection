<?php
/**
 * class file
 */

namespace Antiphp\CollectionTests\Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class IsEmptyTest extends TestCase
{
    /**
     * @test
     */
    public function testIsEmpty()
    {
        $element = new TestElement();

        $collection = new TestCollection();
        $collection->add($element);
        $collection->remove($element);

        $this->assertTrue($collection->isEmpty());
    }

    /**
     * @test
     */
    public function testIsNotEmpty()
    {
        $element = new TestElement();

        $collection = new TestCollection();
        $collection->add($element);

        $this->assertFalse($collection->isEmpty());
    }

    /**
     * @test
     */
    public function testIsEmptyForEmpty()
    {
        $collection = new TestCollection();

        $this->assertTrue($collection->isEmpty());
    }
}