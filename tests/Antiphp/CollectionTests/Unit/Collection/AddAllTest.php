<?php
/**
 * class file
 */
namespace Antiphp\CollectionTests\Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class AddAllTest extends TestCase
{
    /**
     * @test
     */
    public function testAddAll()
    {
        $element1 = new TestElement();
        $element2 = new TestElement();

        $collection1 = new TestCollection();
        $collection1->add($element1);

        $collection2 = new TestCollection();
        $collection2->add($element2);

        $this->assertTrue($collection1->addAll($collection2));
    }
    /**
     * @test
     */
    public function testAddAllExtended()
    {
        $element1 = new TestElement();
        $element2 = new TestElement();

        $collection1 = new TestCollection();
        $collection1->add($element1);

        $collection2 = new TestCollection();
        $collection2->add($element2);

        $collection1->addAll($collection2);

        $this->assertCount(2, $collection1);
        $this->assertContains($element1, $collection1);
        $this->assertContains($element2, $collection2);
    }
}