<?php
/**
 * class file
 */
namespace Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class ContainsTest extends TestCase
{
    /**
     * @test
     */
    public function testContains()
    {
        $element = new TestElement();

        $collection = new TestCollection();
        $collection->add($element);

        $this->assertTrue($collection->contains($element));
    }

    /**
     * @test
     */
    public function testContainsNot()
    {
        $collection = new TestCollection();

        $this->assertFalse($collection->contains(new TestElement()));
    }

    /**
     * @test
     */
    public function testContainsNotOnUnemptyCollection()
    {
        $collection = new TestCollection();
        $collection->add(new TestElement());

        $this->assertFalse($collection->contains(new TestElement()));
    }
}