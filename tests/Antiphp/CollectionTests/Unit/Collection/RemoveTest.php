<?php
/**
 * class file
 */
namespace Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class RemoveTest extends TestCase
{
    /**
     * @test
     */
    public function testRemove()
    {
        $element = new TestElement();

        $collection = new TestCollection();
        $collection->add($element);

        $this->assertTrue($collection->remove($element));
    }

    /**
     * @test
     */
    public function testRemoveExtended()
    {
        $element = new TestElement();

        $collection = new TestCollection();
        $collection->add($element);
        $collection->remove($element);

        $this->assertCount(0, $collection);
    }

    /**
     * @test
     */
    public function testRemoveFail()
    {
        $collection = new TestCollection();
        $this->assertFalse($collection->remove(new TestElement()));
    }
}