<?php
/**
 * class file
 */

namespace Antiphp\CollectionTests\Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class RemoveAllTest extends TestCase
{
    /**
     * @test
     */
    public function testRemoveAll()
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

        $this->assertTrue($collection1->removeAll($collection2));
    }

    /**
     * @test
     */
    public function testRemoveAllExtended()
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

        $collection1->removeAll($collection2);

        $this->assertCount(1, $collection1);
        $this->assertContains($element2, $collection1);
    }
}