<?php
/**
 * class file
 */
namespace Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class ContainsAllTest extends TestCase
{
    /**
     * @test
     */
    public function testContainsAll()
    {
        $element1 = new TestElement();
        $element2 = new TestElement();
        $element3 = new TestElement();

        $collection1 = new TestCollection();
        $collection1->add($element1);
        $collection1->add($element2);
        $collection1->add($element3);

        $collection2 = new TestCollection();
        $collection2->add($element1);
        $collection2->add($element3);

        $this->assertTrue($collection1->containsAll($collection2));
    }

    /**
     * @test
     */
    public function testContainsAllForEmpty()
    {
        $element1 = new TestElement();
        $element2 = new TestElement();

        $collection1 = new TestCollection();
        $collection1->add($element1);
        $collection1->add($element2);

        $collection2 = new TestCollection();

        $this->assertTrue($collection1->containsAll($collection2));
    }

    /**
     * @test
     */
    public function testContainsAllOnEmpty()
    {
        $element1 = new TestElement();
        $element2 = new TestElement();

        $collection1 = new TestCollection();

        $collection2 = new TestCollection();
        $collection2->add($element1);
        $collection2->add($element2);

        $this->assertFalse($collection1->containsAll($collection2));
    }

    /**
     * @test
     */
    public function testContainsNotAll()
    {
        $element1 = new TestElement();
        $element2 = new TestElement();
        $element3 = new TestElement();

        $collection1 = new TestCollection();
        $collection1->add($element1);
        $collection1->add($element3);

        $collection2 = new TestCollection();
        $collection2->add($element1);
        $collection2->add($element2);
        $collection2->add($element3);

        $this->assertFalse($collection1->containsAll($collection2));
    }
}