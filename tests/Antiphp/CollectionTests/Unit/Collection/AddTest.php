<?php
/**
 * class file
 */
namespace Antiphp\CollectionTests\Unit\Collection;

use Antiphp\Collection\ElementInterface;
use Antiphp\Collection\Exception\InvalidArgumentException;
use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class AddTest extends TestCase
{
    /**
     * @test
     */
    public function testAdd()
    {
        $collection = new TestCollection();
        $added = $collection->add(new TestElement());

        $this->assertTrue($added);
    }

    /**
     * @test
     */
    public function testAddExtended()
    {
        $element = new TestElement();

        $collection = new TestCollection();
        $collection->add($element);

        $elements = $collection->toArray();
        $this->assertCount(1, $elements);
        $this->assertContains($element, $elements);
    }

    /**
     * @test
     */
    public function testAddFails()
    {
        /** @var ElementInterface $element */
        $element = $this->createMock(ElementInterface::class);
        $collection = new TestCollection();

        $this->expectException(InvalidArgumentException::class);
        $collection->add($element);
    }
}