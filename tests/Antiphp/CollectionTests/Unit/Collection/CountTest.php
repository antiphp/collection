<?php
/**
 * class file
 */
namespace Antiphp\CollectionTests\Unit\Collection;

use Antiphp\CollectionTests\TestCollection;
use Antiphp\CollectionTests\TestElement;
use PHPUnit\Framework\TestCase;

class CountTest extends TestCase
{
    /**
     * @test
     */
    public function testCountEmpty()
    {
        $collection = new TestCollection();

        $this->assertCount(0, $collection);
    }

    /**
     * @test
     */
    public function testCount1()
    {
        $collection = new TestCollection();
        $collection->add(new TestElement());

        $this->assertCount(1, $collection);
    }

    /**
     * @test
     */
    public function testCount2()
    {
        $collection = new TestCollection();
        $collection->add(new TestElement());
        $collection->add(new TestElement());

        $this->assertCount(2, $collection);
    }
}