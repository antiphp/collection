<?php
/**
 * class file
 */

namespace Antiphp\CollectionTests\Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class RetainAllTest extends TestCase
{
    /**
     * @test
     */
    public function testRetainAll()
    {
        $element1 = new TestElement();
        $element2 = new TestElement();
        $element3 = new TestElement();

        $collection1 = new TestCollection();
        $collection1->add($element1);
        $collection1->add($element2);

        $collection2 = new TestCollection();
        $collection2->add($element2);
        $collection2->add($element3);

        $this->assertTrue($collection1->retainAll($collection2));
    }

    /**
     * @test
     */
    public function testRetainAllExtended()
    {
        $element1 = new TestElement();
        $element2 = new TestElement();
        $element3 = new TestElement();

        $collection1 = new TestCollection();
        $collection1->add($element1);
        $collection1->add($element2);

        $collection2 = new TestCollection();
        $collection2->add($element2);
        $collection2->add($element3);

        $collection1->retainAll($collection2);

        $this->assertCount(1, $collection1);
        $this->assertContains($element2, $collection1);
    }
}