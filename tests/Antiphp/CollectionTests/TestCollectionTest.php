<?php
/**
 * class file
 */

namespace Antiphp\CollectionTests;

use Antiphp\Collection\ElementInterface;
use PHPUnit\Framework\TestCase;

class TestCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function testAccept()
    {
        $collection = new TestCollection();

        $this->assertTrue($collection->accept(new TestElement()));

        /** @var ElementInterface $element */
        $element = $this->createMock(ElementInterface::class);
        $this->assertFalse($collection->accept($element));
    }
}